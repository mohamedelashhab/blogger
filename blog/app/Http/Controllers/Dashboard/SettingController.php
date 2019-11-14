<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\Setting;

class SettingController extends Controller
{
    public function postSetting(Request $request)
    {
        foreach($request->except('_token') as $key => $value)
        {
            Setting::setOption($key, $value);
        }
        return redirect()->route("dashboard.index");
    }

    public function site()
    {
        return view("dashboard.settings.site", ["site_name" => Setting::getOption("site_name")]);
    }
}
