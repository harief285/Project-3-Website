<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\User;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('pasien');
    }

    public function adminHome(): View
    {
        $countuser = user::count();
        $users = user::all();
        return view('dashboard', compact('countuser', 'users'));
    }

    public function registerForm()
    {
        return view('auth.register');
    }

    public function riwayat()
    {
        $countuser = user::count();
        $users = user::all();
        return view('riwayat.index', compact('countuser', 'users'));
    }

    public function profile()
    {
        $countuser = user::count();
        $users = user::all();


        return view('akun.index', compact('countuser', 'users'));
    }
}
