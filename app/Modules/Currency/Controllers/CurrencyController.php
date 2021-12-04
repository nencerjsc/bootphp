<?php
namespace App\Modules\Currency\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modules\Currency\Models\Currencies;
use DB;
class CurrencyController extends Controller
{

    public function __construct()
    {

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title = 'Tiền tệ';
        $currencies = Currencies::orderBy('id','DESC')->paginate(25);
        if($request->input('keyword'))
        {
            $keyword = $request->input('keyword');
            $title  = "Search: ".$keyword;
            $currencies = Currencies::where('name', 'LIKE', '%'.$keyword.'%')->orderBy('id','DESC')->paginate(10);
        }
        return view('Currency::index', compact('currencies', 'title'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $currencyList = DB::table('currencies_code')->get();
        foreach($currencyList as $icurrency)
        {
            $lsCurrency[$icurrency->code]  = $icurrency->code.' - '.$icurrency->name;
        }
        return view('Currency::create', compact('lsCurrency'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'code' => 'required',
            'decimal' => 'required|numeric',
            'value' => 'required|numeric',
            'seperator' => 'required',
            'sort' => 'required',
        ]);

        $input = $request->all();



        ( isset($input['fiat']) ) ? $input['fiat'] = 1 : $input['fiat'] = 0;
        ( isset($input['wallet']) ) ? $input['wallet'] = 1 : $input['wallet'] = 0;
        ///Chống trùng fiat
        if($input['fiat'] == 1){
            $input['checksum'] = md5($input['code'].$input['fiat']);
        }else{
            $input['checksum'] = null;
        }

        ( isset($input['homepage']) ) ? $input['homepage'] = 1 : $input['homepage'] = 0;
        ( isset($input['default']) ) ? $input['default'] = 1 : $input['default'] = 0;
        ( isset($input['status']) ) ? $input['status'] = 1 : $input['status'] = 0;

        try{
            ///Update lại tiền tệ khác default bằng 0
            if($input['default'] == 1){
                $currs = Currencies::all();
                if(count($currs) > 0){
                    foreach ($currs as $curr){
                        $curr->default = 0;
                        $curr->save();
                    }
                }
            }

            Currencies::create($input);
            return redirect()->route('currencies.index')
                ->with('success','Thêm loại tiền tệ thành công!');
        }catch (\Exception $e){
            dd($e->getMessage());
            return redirect()->back()
                ->withErrors(['error' => 'Lỗi có thể là do FIAT của loại tiền tệ này đã có, hãy tắt FIAT rồi lưu lại!']);
        }

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(allow('edit') === true)
        {
            $currency = Currencies::find($id);

            $currencyList = DB::table('currencies_code')->get();
            foreach($currencyList as $icurrency)
            {
                $lsCurrency[$icurrency->code]  = $icurrency->code.' - '.$icurrency->name;
            }
            return view('Currency::edit', compact('currency','lsCurrency'));
        }else{
            return null;
        }
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'code' => 'required',
            'decimal' => 'required|numeric',
            'value' => 'required|numeric'
        ]);
        $input = $request->all();

        $currency = Currencies::findOrFail($id);
        if(isset($input['fiat'])) {
            $currency->fiat = 1;
        }
        if(isset($input['homepage'])) {
            $currency->homepage = 1;
        }

        if(isset($input['status'])) {
            $currency->status = 1;
        }

        if(isset($input['fiat'])) {
            $currency->fiat = 1;
        }else{
            $currency->fiat = 0;
        }

        if(isset($input['wallet'])) {
            $currency->wallet = 1;
        }else{
            $currency->wallet = 0;
        }

        ///Update lại tiền tệ khác default bằng 0
        if(isset($input['default']) && $input['default'] = 1){
            $currency->default = 1;
            $currs = Currencies::where('id', '!=', $id)->get();
            if(count($currs) > 0){
                foreach ($currs as $curr){
                    $curr->default = 0;
                    $curr->save();
                }
            }
        }else{
            $currency->default = 0;
        }

        $currency->name = $input['name'];
        $currency->decimal = $input['decimal'];
        $currency->seperator = $input['seperator'];
        $currency->value = $input['value'];

        $currency->wallet_admin_balance = $input['wallet_admin_balance'];
        $currency->sort = $input['sort'];
        $currency->symbol_left = $input['symbol_left'];
        $currency->symbol_right = $input['symbol_right'];
        $currency->update();

        return redirect()->route('currencies.index')
                        ->with('success','Cập nhật tiền tệ thành công');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if( auth()->user()->hasRole('SUPER_ADMIN|ADMIN') )
        {
            Currencies::find($id)->delete();
            return redirect()->route('currencies.index')
                        ->with('success','Currencies deleted successfully');
        }else{
            return redirect()->route('currencies.index')
                        ->withErrors(['message' =>'Not access.']);
        }
    }

    public function actions(Request $request)
    {
        $val    = $request->check;
        $action = $request->action;
        if(empty($val)){
            return redirect()->route('currencies.index')->withErrors(['message' =>'Không có mục nào được chọn.']);
        }

        foreach ($val as $value) {
            $user = Currencies::find($value);
            $this->_runAction($value, $action);
        }
        return redirect()->route('currencies.index')->with('success','Group  '.$action.' successfully');
    }

    private function _runAction($id, $action)
    {
        switch ($action) {
            case 'delete':
                $this->destroy($id);
                break;

            default:
                break;
        }
        return null;
    }

}
