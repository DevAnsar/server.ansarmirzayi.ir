<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::all();
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $inputs = $request->except(['_token']);

        foreach ($inputs as $key => $value) {
            $value='';
            if ($key) {
                $setting = Setting::where('key', $key)->first();

                if ($setting) {
                     $new_key = $inputs[$key];
                    if ($setting->type != 'file') {
                        $value = $inputs[$key . '_value'];

                    } else {
                        if ($request->file($key. '_value')) {
                            $value = $this->uploadImage($request->file($key . '_value'), 'settings');
                        }
                    }

                    if ($value) {
                        $setting->update(['value' => $value]);
                    }


                    //after update setting field
                    if (trim($key) != $new_key) {
                        $setting->update(['key' => $new_key]);
                    }
                }
            }
        }
        return redirect(route('admin.settings.index'));
//        $settings = Setting::all();
//        return view('admin.settings.index', compact('settings'));
    }
}
