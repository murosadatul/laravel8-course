<?php

namespace App\Http\Controllers\Admin\IntegrationAPI;

use App\Http\Controllers\Base\AdminBaseController;
use Illuminate\Http\Request;
use App\Libraries\ApiIntegration;

class AnnawawiController extends AdminBaseController
{
    protected $API;

    public function __construct()
    {
        // check user login auntetication
        $this->middleware('auth');
        $this->API = new ApiIntegration();
    }

    public function dashboard()
    {
        $response = $this->API->createSignatureAnnawawiApi('welcome/total_data_ppdb');
        // $response = BaseAPIController::createSignatureAnnawawiApi('welcome/total_data');
        $rs_id = json_decode($response);

        dd($rs_id);
        die();
    }
}
