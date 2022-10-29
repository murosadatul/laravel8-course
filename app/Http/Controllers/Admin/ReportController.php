<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Base\AdminBaseController;
use Illuminate\Http\Request;
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
        $params['rs_id'] = Sale::get_lists();

        echo 'PDF';
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
