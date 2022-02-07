<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use Auth;

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
        return view('home',['Invoices'=>Invoice::latest()->get()]);
    }





    public function editProfile()
    {   
        $user = Auth::user();
        return view('auth.profile', compact('user'));
    }

    public function updateProfile(Request $request)
    { 
        $user=Auth::user();
        if(Auth::user()->email == request('email')) {
            
            $request->validate([
                'name' => 'required',
                
                'password' => 'required|min:6|confirmed'
            ]);

            $user->name = request('name');
            $user->password = bcrypt(request('password'));
            $user->save();
            return back();
            
        }
        else{
            
            $request->validate([
                'name' => 'required',
                'email' => 'email|required|unique:users',
                'password' => 'required|min:6|confirmed'
            ]);

            $user->name = request('name');
            $user->email = request('email');
            $user->password = bcrypt(request('password'));

            $user->save();

            return back();  
            
        }
    }





}
