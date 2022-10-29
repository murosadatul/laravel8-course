<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Base\AdminBaseController;
use Illuminate\Http\Request;
use PDF;
use App\Models\Sale;

class ReportController extends AdminBaseController
{
    public function __construct()
    {
        // check user login auntetication
        $this->middleware('auth');
    }

    public function sale()
    {
        $params['rs_id'] = Sale::get_lists();
        return parent::display('admin.report.sale')->with($params);
    }

    public function sale_pdf()
    {
        $params['title'] = 'Report Sales';
        $params['date']  = date('Y-m-d');
        $params['rs_id'] = Sale::get_lists();
        $pdf = PDF::loadView('admin.report.sale_pdf', $params);
        return $pdf->download('File_name_unduh.pdf');
    }

    public function sale_excel()
    {
        $params['rs_id'] = Sale::get_lists();
        echo 'Excel';
    }

    public function revenue()
    {
        $params['rs_id'] = Sale::get_lists();
        return parent::display('admin.report.revenue')->with($params);
    }

    public function purchase()
    {
        $params['rs_id'] = Sale::get_lists();
        return parent::display('admin.report.purchase')->with($params);
    }
}
