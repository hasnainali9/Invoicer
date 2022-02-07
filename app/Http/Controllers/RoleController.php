<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Permission;

class RoleController extends Controller
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
        if(CheckRolePermission('role_view')){
            return view('role.index',['Roles'=>Role::all()]);
        }else{abort(401);}
    }
    
    
    public function store(Request $request){
        if(CheckRolePermission('role_add')){
            $request->validate([
                'name' => 'required',
            ]);
      
            Role::create([
                'name'=>$request->name,
            ]);
            return redirect()->back()->with('message', 'Data Added Successfully');
        }else{abort(401);}
    }



       


    public function update(Request $request){
        if(CheckRolePermission('role_edit')){
            $request->validate([
                'name' => 'required',
            ]);

            Role::where('id',$request->id)->update([
                'name'=>$request->name,
            ]);
            return redirect()->back()->with('message', 'Data Added Successfully');
        }else{abort(401);}
    }






    public function destroy($id){
        if(CheckRolePermission('role_delete')){
            if(Role::where('id',$id)->get()->count()>0){
                Role::where('id',$id)->delete();
                Permission::where('role_id',$id)->delete();
                return redirect()->back()->with('message', 'Data Deleted Successfully');
            }else{
                return redirect()->back()->withErrors(['Unauthorized Access']);   
            }
        }else{abort(401);}
    }
}
