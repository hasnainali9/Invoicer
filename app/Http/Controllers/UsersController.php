<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
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
        if(CheckRolePermission('user_view')){
            return view('users.index',['Users'=>User::where('id', '!=', \Auth::user()->id)->get()]);
        }else{abort(401);}
    }
    
    
    public function store(Request $request){
        if(CheckRolePermission('user_add')){
            $request->validate([
                'name' => 'required',
                'email' => 'email|required|unique:users',
                'password' => 'required|min:6',
                'role_id'=>'required',
            ]);
      
            User::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>$request->password,
                'role_id'=>$request->role_id,
            ]);
            return redirect()->back()->with('message', 'Data Added Successfully');
        }else{abort(401);}
    }



       


    public function update(Request $request){
        if(CheckRolePermission('user_edit')){
            $request->validate([
                'name' => 'required',
                'email' => 'email|required|unique:users',
                'password' => 'required|min:6|confirmed',
                'role_id'=>'required',
            ]);

            User::where('id',$request->id)->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>$request->password,
                'role_id'=>$request->role_id,
            ]);
            return redirect()->back()->with('message', 'Data Added Successfully');
        }else{abort(401);}
    }






    public function destroy($id){
        if(CheckRolePermission('user_delete')){
            if(User::where('id',$id)->get()->count()>0){
                User::where('id',$id)->delete();
                return redirect()->back()->with('message', 'Data Deleted Successfully');
            }else{
                return redirect()->back()->withErrors(['Unauthorized Access']);   
            }
        }else{abort(401);}
    }
}
