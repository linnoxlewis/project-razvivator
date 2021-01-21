<?php

namespace App\Modules\admin\controllers;

use App\Modules\admin\models\Admins;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/admin';
    protected $redirectAfterLogout = '/admin';

    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    public function register(Request $request)
    {
       $model = new Admins();
       $model->fill($request->all());
       $model->save();
       return redirect()->route('/admin');
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }
}
