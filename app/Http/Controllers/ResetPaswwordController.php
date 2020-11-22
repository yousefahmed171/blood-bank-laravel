<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ResetPaswwordController extends Controller
{

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.password.edit', compact('user'));
    }
 

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'password'              => 'required|confirmed'
        ]);
        $user = User::findOrFail($id);
        $request->merge(['password' => bcrypt($request->password)]);
        $user->update($request->all());
        flash('Success Update Password')->success();
        return back();
    }

}
