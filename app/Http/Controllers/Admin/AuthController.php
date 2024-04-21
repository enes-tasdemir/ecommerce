<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $data = $request->all();

        if(Auth::guard('admin')->attempt(['email' => $data['email'],'password' => $data['password']],$data['remember_me'] ?? false))
        {
            $request->session()->regenerate();
            return ['redirect' => route('admin.index')];
        }
        throw \Illuminate\Validation\ValidationException::withMessages([
            'error' => [__('admin_login.wrong')],
        ]);
    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        return ['redirect' => route('admin.login')];
    }
}
