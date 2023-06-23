<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class studentAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(!(Session()->has('adminId')) and (url('/admin/addregister') == $request->url())){
            return back()->with('faild','please It is For Admin..Student Not Allow');
        }elseif(!(Session()->has('adminId')) and (url('/admin/viewregister') == $request->url())){
            return back()->with('faild','please It is For Admin..Student Not Allow');
        }elseif(!(Session()->has('adminId')) and (url('/admin/five') == $request->url())){
            return back()->with('faild','please It is For Admin..Student Not Allow');
        }elseif(!(Session()->has('adminId')) and (url('/admin/six') == $request->url())){
            return back()->with('faild','please It is For Admin..Student Not Allow');
        }elseif(!(Session()->has('adminId')) and (url('/admin/seven') == $request->url())){
            return back()->with('faild','please It is For Admin..Student Not Allow');
        }elseif(!(Session()->has('adminId')) and (url('/admin/eight') == $request->url())){
            return back()->with('faild','please It is For Admin..Student Not Allow');
        }elseif(!(Session()->has('adminId')) and (url('/admin/nine') == $request->url())){
            return back()->with('faild','please It is For Admin..Student Not Allow');
        }elseif(!(Session()->has('adminId')) and (url('/admin/ten') == $request->url())){
            return back()->with('faild','please It is For Admin..Student Not Allow');
        }elseif(!(Session()->has('adminId')) and (url('/admin/ssc') == $request->url())){
            return back()->with('faild','please It is For Admin..Student Not Allow');
        }elseif(!(Session()->has('adminId')) and (url('/admin/collage') == $request->url())){
            return back()->with('faild','please It is For Admin..Student Not Allow');
        }elseif(!(Session()->has('adminId')) and (url('/admin/hsc') == $request->url())){
            return back()->with('faild','please It is For Admin..Student Not Allow');
        }elseif(!(Session()->has('adminId')) and (url('/admin/addClass') == $request->url())){
            return back()->with('faild','please It is For Admin..Student Not Allow');
        }elseif(!(Session()->has('adminId')) and (url('/admin/depertment') == $request->url())){
            return back()->with('faild','please It is For Admin..Student Not Allow');
        }elseif(!(Session()->has('adminId')) and (url('/admin/taka') == $request->url())){
            return back()->with('faild','please It is For Admin..Student Not Allow');
        }elseif(!(Session()->has('adminId')) and (url('/admin/taka') == $request->url())){
            return back()->with('faild','please It is For Admin..Student Not Allow');
        }elseif(!(Session()->has('adminId')) and (url('/getregister') == $request->url())){
            return back()->with('faild','please It is For Admin..Student Not Allow');
        }elseif(!(Session()->has('adminId')) and (url('/getFive') == $request->url())){
            return back()->with('faild','please It is For Admin..Student Not Allow');
        }elseif(!(Session()->has('adminId')) and (url('/getSix') == $request->url())){
            return back()->with('faild','please It is For Admin..Student Not Allow');
        }elseif(!(Session()->has('adminId')) and (url('/getSeven') == $request->url())){
            return back()->with('faild','please It is For Admin..Student Not Allow');
        }elseif(!(Session()->has('adminId')) and (url('/getEight') == $request->url())){
            return back()->with('faild','please It is For Admin..Student Not Allow');
        }elseif(!(Session()->has('adminId')) and (url('/getNine') == $request->url())){
            return back()->with('faild','please It is For Admin..Student Not Allow');
        }elseif(!(Session()->has('adminId')) and (url('/getTen') == $request->url())){
            return back()->with('faild','please It is For Admin..Student Not Allow');
        }elseif(!(Session()->has('adminId')) and (url('/getCollage') == $request->url())){
            return back()->with('faild','please It is For Admin..Student Not Allow');
        }elseif(!(Session()->has('adminId')) and (url('/getHsc') == $request->url())){
            return back()->with('faild','please It is For Admin..Student Not Allow');
        }elseif(!(Session()->has('adminId')) and (url('/getClass') == $request->url())){
            return back()->with('faild','please It is For Admin..Student Not Allow');
        }elseif(!(Session()->has('adminId')) and (url('/showDepart') == $request->url())){
            return back()->with('faild','please It is For Admin..Student Not Allow');
        }elseif(!(Session()->has('adminId')) and (url('/showTaka') == $request->url())){
            return back()->with('faild','please It is For Admin..Student Not Allow');
        }
        return $next($request);
    }
}
