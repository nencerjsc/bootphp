<?php

namespace App\Modules\System\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modules\System\Models\Currencies;
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
        $title = 'Currency';
        $currencies = Currencies::orderBy('id', 'DESC')->paginate(25);
        if ($request->input('keyword')) {
            $keyword = $request->input('keyword');
            $title = "Search: " . $keyword;
            $currencies = Currencies::where('name', 'LIKE', '%' . $keyword . '%')->orderBy('id', 'DESC')->paginate(10);
        }
        return view('System::currency.index', compact('currencies', 'title'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $currencyList = DB::table('currencies_code')->get();
        foreach ($currencyList as $icurrency) {
            $lsCurrency[$icurrency->code] = $icurrency->code . ' - ' . $icurrency->name;
        }
        return view('System::currency.create', compact('lsCurrency'));
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
        ///Chống trùng fiat
        $input['checksum'] = md5($input['code']);
        $input['status'] = 1;
        try {
            Currencies::create($input);
            return redirect()->route('currencies.index')
                ->with('success', 'Thêm loại tiền tệ thành công!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withErrors(['error' => 'Lỗi có thể là do FIAT của loại tiền tệ này đã có, hãy tắt FIAT rồi lưu lại!']);
        }

    }


    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (allow('edit') === true) {
            $currency = Currencies::find($id);

            $currencyList = DB::table('currencies_code')->get();
            foreach ($currencyList as $icurrency) {
                $lsCurrency[$icurrency->code] = $icurrency->code . ' - ' . $icurrency->name;
            }
            return view('System::currency.edit', compact('currency', 'lsCurrency'));
        } else {
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
        if (isset($input['status'])) {
            $currency->status = 1;
        }

        $currency->name = $input['name'];
        $currency->decimal = $input['decimal'];
        $currency->seperator = $input['seperator'];
        $currency->value = $input['value'];

        $currency->sort = $input['sort'];
        $currency->symbol_left = $input['symbol_left'];
        $currency->symbol_right = $input['symbol_right'];
        $currency->update();

        return redirect()->route('currencies.index')
            ->with('success', 'Cập nhật tiền tệ thành công');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Currencies::find($id)->delete();
        return redirect()->route('currencies.index')
            ->with('success', 'Currencies deleted successfully');
    }

    public function actions(Request $request)
    {
        $val = $request->check;
        $action = $request->action;
        if (empty($val)) {
            return redirect()->route('currencies.index')->withErrors(['message' => 'Không có mục nào được chọn.']);
        }
        foreach ($val as $value) {
            $user = Currencies::find($value);
            $this->_runAction($value, $action);
        }
        return redirect()->route('currencies.index')->with('success', 'Group  ' . $action . ' successfully');
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
