<?php

namespace App\Modules\System\Helpers;

use Carbon\Carbon;
use DB;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use Schema;
use PhpOffice\PhpSpreadsheet\Writer\Xls;

class BackendHelper
{
    public $table;
    public $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    ///FILTER
    ///Data = ['col' =>form_type]  ///form_type =>select, input, date
    public function showFilter(array $req_data, $action = null)
    {
        $cols = $req_data['action_cols'] ?? null;
        if ($cols) {
            ///thêm trường from_date, to_date
            $cols['from_date'] = ['date', null];
            $cols['to_date'] = ['date', null];

            $dataForm = [];
            foreach ($cols as $col => $value) {
                $type = $value[0];
                $data = $value[1];
                $default_value = null;
                if(isset($value[2])){
                    $default_value = $value[2];
                }
                $dataForm[] = view('System::filter.' . $type, compact('col', 'data', 'default_value'))->render();
            }
            $filter_view = view('System::filter.filterView', compact('dataForm', 'action'))->render();
            return $filter_view;
        } else {
            return null;
        }
    }
    public function alphabet($count)
    {
        $arr = [];
        $range = range("A", "Z");
        $fin_range = array_slice($range, 0, $count);
        foreach ($fin_range as $letter) {
            $arr[] = $letter;
        }
        return $arr;
    }

    ///$request_data // dữ liệu cột cần lọc
    ///$export_cols // các cột muốn xuất excel
    ///$sum_cols // các cột muốn cộng tổng
    public function FilterData(array $request_data, array $cols, $pages = 20)
    {

        $action = !isset($request_data['submit']) ? 'filter' : $request_data['submit'];
        if (isset($request_data['from_date']) && $request_data['from_date'] !== "" && isset($request_data['to_date']) && $request_data['to_date'] !== "") {
            $from = strip_tags($request_data['from_date']);
            $to = strip_tags($request_data['to_date']);
            $request_data['date_range'] = [$from, $to];
        }
        unset($request_data['from_date']);
        unset($request_data['to_date']);
        unset($request_data['page']);

        foreach ($request_data as $col => $value) {

            if ($col !== 'submit') {

                if ($col == 'date_range') {

                    if ($value[0] == $value[1]) {
                        $date_format = Carbon::parse($value[0])->toDateString();
                        $this->model = $this->model->whereDate('created_at', $date_format);
                    } else {
                        $date_format_from = Carbon::parse($value[0])->startOfDay()->toDateTimeString();
                        $date_format_to = Carbon::parse($value[1])->endOfDay()->toDateTimeString();
                        $this->model = $this->model->whereBetween('created_at', [$date_format_from, $date_format_to]);
                    }
                } else {
                    if (isset($value)) {
                        $this->model = $this->model->where($col, strip_tags($value));
                    }

                }
            }

        }

        if ($action == 'filter') {
            $list_data = $this->model->paginate($pages);
            if (count($cols['sum_cols'])) {
                foreach ($cols['sum_cols'] as $sum_col) {
                    $list_data->$sum_col = $this->model->sum($sum_col);
                }
            }
            return $list_data;
        } elseif ($action == 'excel') {
            if (count($cols['export_cols'])) {

                $data = $this->model->get()->toArray();

                $spreadsheet = new Spreadsheet();
                $sheet = $spreadsheet->getActiveSheet();
                $sheet->setTitle(uniqid());
                if (count($data)) {

                    $alpha = $this->alphabet(count($cols['export_cols']));
                    foreach ($cols['export_cols'] as $key => $column) {
                        $sheet->setCellValue($alpha[$key] . '1', __('order.' . $column));
                    }
                    $numRow = 2;
                    foreach ($data as $rows) {
                        $rows = (array)$rows;
                        foreach ($cols['export_cols'] as $key => $column) {
                            $sheet->setCellValue($alpha[$key] . $numRow, strval($rows[$column]));
                        }
                        $numRow++;
                    }
                    $writer = new Xls($spreadsheet);
                    $filename =  uniqid();
                    header('Content-Type: application/vnd.ms-excel');
                    header('Content-Disposition: attachment;filename="' . $filename . '.xls"');
                    $writer->save("php://output");

                } else {
                    return null;
                }

            } else {
                return null;
            }
        } else {
            return null;
        }

    }

}
