<?php

namespace App\Http\Controllers\Admin;

use App\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.settings',$this->site_settings);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $r,$id = "")
    {
        foreach ($this->site_settings as $k => $v) {
            Setting::where('Name',$k)->update(['Description' => $r->input($k)]);
        }
        $r->session()->flash('setting_updated', '<p>'.__('setting_updated').'</p>');
        return redirect('admin/settings');
    }
}
