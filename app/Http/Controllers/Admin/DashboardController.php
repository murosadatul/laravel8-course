<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Base\AdminBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Category;
use App\Models\About;
use App\Models\Post;
use App\Models\Tag;

class DashboardController extends AdminBaseController
{

    public function __construct()
    {
        // check user login auntetication
        $this->middleware('auth');
    }

    public function index( Request $request)
    {
        $session = Session()->forget('annawawi_token');
        $params['potential_growth'] = 12.34;
        $params['revenue_current']  = 17.34;
        $params['daily_income']     = 12.34;
        $params['expense_current']  = 31.53;

        $params['revenue']  = 32123;
        $params['sales']    = 45850;
        $params['purchase'] = 2039;

        $params['chartdata'] = [55, 25, 20];

        $params['transfer_paypal'] = array(
            'time' => '2019-01-07 09:12:00',
            'nominal' => 236
        );

        $params['transfer_stripe'] = array(
            'time' => '2019-01-07 19:12:00',
            'nominal' => 593
        );
        return parent::display('admin.dashboard.index')->with($params);
    }
}
