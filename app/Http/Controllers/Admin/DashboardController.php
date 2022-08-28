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
        // dd(session::all());
        return parent::display('admin.dashboard.index');
    }

    public function about()
    {
        return view('pages.about');
    }

    public function portofolio()
    {
        return view('pages.portofolio');
    }

    public function contact()
    {
        return view('pages.contact');
    }
}
