<?php


namespace App\Http\Middleware;

use Illuminate\Http\Request;

class TestMiddleWare
{
    public function handle(Request $request, \Closure $closure)
    {
        if($request->isMethod('get') && isset($request->id) && $request->id < 0) {
            throw new \Exception('param undefinded',401);
        }
        return $closure($request);
    }
}
