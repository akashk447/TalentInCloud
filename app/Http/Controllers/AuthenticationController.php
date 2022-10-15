<?php

namespace App\Http\Controllers;

use App\Mail\ResetEmailTemplates;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class AuthenticationController extends Controller
{
    public function login()
    {
        if (Session::has('locked-screen')) {
            return redirect()->to(route('lock_screen'));
        } elseif (Auth::check()) {
            return view('admin.dashboard');
        } else {
            return view('auth.auth_login');
        }
    }
    
    public function switch_mode()
    {
        Session::put('dark-mode', "ON");
    }
    public function switch_mode_to_light()
    {
        Session::flush();
    }
    public function authenticate_process_login(Request $tic)
    {
        $tic->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $tic->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('admin-dashboard')->withSuccess('Signed in');
        }
        return redirect("login")->with('login_error','Login details are not valid');
    }
    public function reset_password($email = "")
    {
        return view('auth.reset_password')->with(compact('email'));
    }
    public function send_reset_mail($email)
    {
        $user = User::where('email', $email)->first();
        if ($user) {
            $details = [
                'name' => $user->name,
                'browser' => get_client_browser(),
                'ip' => get_client_ip(),
                'date' => today_date(),
                'time' => today_time()
            ];
            Mail::to($email)->send(new ResetEmailTemplates($details));
            return "sent";
        } else {
            return "unsent";
        }
    }
    public function change_reset_password()
    {
        return view('auth.change_reset_password');
    }
    public function log_out()
    {
        Session::flush();
        Auth::logout();
        return Redirect('login');
    }
}
