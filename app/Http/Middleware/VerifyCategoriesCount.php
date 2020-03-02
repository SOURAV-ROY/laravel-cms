<?php

namespace App\Http\Middleware;

use App\Category;
use Closure;

class VerifyCategoriesCount
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Category::all()->count() === 0) {

            session()->flash('warning', 'You Need To Create Category First To Able Create Post !!');

            return redirect(route('categories.create'));

//            return redirect()->back();
//            return redirect('/home');
        }
        return $next($request);
    }
}
