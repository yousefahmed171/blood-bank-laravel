<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{


    public function edit($id)
    {
        $settings = Setting::findOrFail($id);
        return view('admin.settings.edit', compact('settings'));
    }

    public function update(Request $request, $id)
    {
        
        $settings = Setting::findOrFail($id);
        $settings->update($request->all());
        flash('Success Update Settings')->success();
        return back();
    }


}
