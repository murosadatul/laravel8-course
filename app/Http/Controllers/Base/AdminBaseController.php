<?php

namespace App\Http\Controllers\Base;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Mockery\Undefined;

class AdminBaseController extends Controller
{

    public function __construct()
    {
    }

    private function base_load_app()
    {

        $session = session::all();
        if (array_key_exists('id',$session) == false)
        {
            $session= array();
            $user = Auth::user();
            if(empty(!$user))
            {
                $session['user'] = array(
                    'id'   => $user->id,
                    'user' => $user->name,
                    'email'=> $user->email,
                    'name' => $user->name,
                );
                session($session);
            }

        }
        //share data with all views
        View::share($session);
    }

    private function base_view_app()
    {
        $detail_user['title'] = 'data 1';
        //share data with all views
        View::share($detail_user);
    }

    protected function display($tmpl_content)
    {
        self::base_load_app();
        self::base_view_app();
        // set template
        return view($tmpl_content);
    }
}

