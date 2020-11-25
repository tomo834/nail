<?php

namespace App\Http\Middleware;

use Closure;
use App\Admin;
use Illuminate\Support\Facades\Auth; 
use App\Node;
use App\NodeClosure;
use Illuminate\Support\Facades\Log;


class CheckParent
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $admin = Auth::guard('admin')->user();
        $nodes = Node::where("shop", $request->id)->first();
        Log::debug($nodes);

        //店舗登録されてたら
        if($nodes){
            $children = Node::ancestorsOf($nodes->id)->where('id', $admin->id)->first();
            Log::debug($children);

            //店舗がログインユーザーの傘下の店舗なら
            if ($children){
                return $next($request);
            }else{
                return redirect('admin');
            }
        } else{
            return redirect('admin');
        }
        return $next($request);
    }
}
