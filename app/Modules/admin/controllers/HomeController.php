<?php
namespace App\Modules\admin\controllers;

use App\Http\Controllers\Controller;


class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('isAdmin');

    }
    public function index()
    {
        return view('admin::home.index');
    }
}
