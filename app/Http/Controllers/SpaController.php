<?php

namespace App\Http\Controllers;

use App\Http\Middleware\TestMiddleWare;
use Illuminate\Http\Request;

/**
 * Spa Контроллер
 *
 * Class SpaController
 *
 * @package App\Http\Controllers
 */
class SpaController extends Controller
{
    public function __construct()
    {
        $this->middleware(TestMiddleWare::class)->only('getSpaRequest');
    }

    public function index()
    {
        $params = [
            'id' => 34
        ];
        return view('spa.spa', $params);
    }

    public  function getSpaRequest(Request $request)
    {
        return view('spa.spa', ['id' => $request->id]);
    }
}
