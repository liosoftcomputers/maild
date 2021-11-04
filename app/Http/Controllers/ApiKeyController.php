<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ApiKey;
use Auth;
use Alert;

class ApiKeyController extends Controller
{
    public function index()
    {
        return view('appkey.index');
    }


    public function store(Request $request)
    {

        $api = new ApiKey;
        $api->app_key = user_app_key();
        $api->app_secret_key = user_app_secret_key();
        $api->owner_id = Auth::user()->id;
        $api->save();
        Alert::success(translate('Great'), translate('Api Created'));
        return back();
    }

    //END
}
