<?php

namespace App\Http\Controllers\AdminAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UpdatePasswordRequest;
use Illuminate\Support\Facades\Auth;

class UpdatePasswordController extends Controller
{
    public function editPassword(){
        return view('admin/auth/passwords/change');
    }

    public function updatePassword(UpdatePasswordRequest $request){
        $admin = Auth::guard('admin')->user();
        $admin->password = bcrypt($request->get('new-password'));
        $admin->save();

        return redirect()->back()->with('update_password_success', 'パスワードを変更しました。');
    }
}
