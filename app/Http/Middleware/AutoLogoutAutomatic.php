<?php

namespace App\Http\Middleware;

use App\Http\Controllers\AdminController;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Session\Store;
use Illuminate\Support\Facades\View;

class AutoLogoutAutomatic
{
    protected $session;
    protected $timeout = 200000;
    
    public function __construct(Store $session)
    {
        $this->session = $session;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $is_logged_in = $request->path() != 'log-out-user';

        if(!session('last_active')) {
            $this->session->put('last_active', time());
            
        } elseif(time() - $this->session->get('last_active') > $this->timeout) {
            
            $this->session->forget('last_active');
            $this->session->put('locked-screen', "yes");
            $cookie = cookie('intend', $is_logged_in ? url()->current() : 'dashboard');
            // return response()->view('auth.lock_screen');
            
        }
        if($is_logged_in){
            $this->session->put('last_active', time());
            
        }
        else{
            $this->session->forget('last_active');
            // $this->session->forget('locked-screen');
        }
        // $is_logged_in ? $this->session->put('last_active', time()) : $this->session->forget('last_active');
        
        return $next($request);
    }
}
