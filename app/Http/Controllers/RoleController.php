<?php

namespace App\Http\Controllers;

use Auth;
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
            if(Auth::User()->role_id=="1"){
                return view('role.index',['Roles'=>Role::where('name', '!=', "SuperAdmin")->get()]);
            }else{
                return view('role.index',['Roles'=>Role::where([['name', '!=', "SuperAdmin"],['name', '!=', "Admin"],['id',Auth::User()->role_id]])->get()]);
            }
        }else{abort(401);}
    }
    
    
    public function store(Request $request){
        if(CheckRolePermission('role_add')){
            $request->validate([
                'name' => 'required',
            ]);
            $role = Role::create([
                'name'=>$request->name,
            ]);
            $client_view=false;
            if($request->client_view=="on"){$client_view=true;}
            $client_add=false;
            if($request->client_add=="on"){$client_add=true;}
            $client_edit=false;
            if($request->client_edit=="on"){$client_edit=true;}
            $client_delete=false;
            if($request->client_delete=="on"){$client_delete=true;}

            $company_view=false;
            if($request->company_view=="on"){$company_view=true;}
            $company_add=false;
            if($request->company_add=="on"){$company_add=true;}
            $company_edit=false;
            if($request->company_edit=="on"){$company_edit=true;}
            $company_delete=false;
            if($request->company_delete=="on"){$company_delete=true;}


            $airline_view=false;
            if($request->airline_view=="on"){$airline_view=true;}
            $airline_add=false;
            if($request->airline_add=="on"){$airline_add=true;}
            $airline_edit=false;
            if($request->airline_edit=="on"){$airline_edit=true;}
            $airline_delete=false;
            if($request->airline_delete=="on"){$airline_delete=true;}


            $airport_view=false;
            if($request->airport_view=="on"){$airport_view=true;}
            $airport_add=false;
            if($request->airport_add=="on"){$airport_add=true;}
            $airport_edit=false;
            if($request->airport_edit=="on"){$airport_edit=true;}
            $airport_delete=false;
            if($request->airport_delete=="on"){$airport_delete=true;}


            $airway_view=false;
            if($request->airway_view=="on"){$airway_view=true;}
            $airway_add=false;
            if($request->airway_add=="on"){$airway_add=true;}
            $airway_edit=false;
            if($request->airway_edit=="on"){$airway_edit=true;}
            $airway_delete=false;
            if($request->airway_delete=="on"){$airway_delete=true;}


            $airway_versions_view=false;
            if($request->airway_versions_view=="on"){$airway_versions_view=true;}
            $airway_versions_view_single=false;
            if($request->airway_versions_view_single=="on"){$airway_versions_view_single=true;}
            $airway_versions_roll_back=false;
            if($request->airway_versions_roll_back=="on"){$airway_versions_roll_back=true;}
            $airway_versions_delete=false;
            if($request->airway_versions_delete=="on"){$airway_versions_delete=true;}


            $user_view=false;
            if($request->user_view=="on"){$user_view=true;}
            $user_add=false;
            if($request->user_add=="on"){$user_add=true;}
            $user_edit=false;
            if($request->user_edit=="on"){$user_edit=true;}
            $user_delete=false;
            if($request->user_delete=="on"){$user_delete=true;}


            $role_view=false;
            if($request->role_view=="on"){$role_view=true;}
            $role_add=false;
            if($request->role_add=="on"){$role_add=true;}
            $role_edit=false;
            if($request->role_edit=="on"){$role_edit=true;}
            $role_delete=false;
            if($request->role_delete=="on"){$role_delete=true;}


            Permission::insert([
                


                [
                    'role_id'=>$role->id,
                    'type'=>'client_view',
                    'value'=>$client_view
                ],
                [
                    'role_id'=>$role->id,
                    'type'=>'client_add',
                    'value'=>$client_add
                ],
                [
                    'role_id'=>$role->id,
                    'type'=>'client_edit',
                    'value'=>$client_edit
                ],
                [
                    'role_id'=>$role->id,
                    'type'=>'client_delete',
                    'value'=>$client_delete
                ],
    
    
                [
                    'role_id'=>$role->id,
                    'type'=>'company_view',
                    'value'=>$company_view
                ],
                [
                    'role_id'=>$role->id,
                    'type'=>'company_add',
                    'value'=>$company_add
                ],
                [
                    'role_id'=>$role->id,
                    'type'=>'company_edit',
                    'value'=>$company_edit
                ],
                [
                    'role_id'=>$role->id,
                    'type'=>'company_delete',
                    'value'=>$company_delete
                ],
    
    
    
                [
                    'role_id'=>$role->id,
                    'type'=>'airline_view',
                    'value'=>$airline_view
                ],
                [
                    'role_id'=>$role->id,
                    'type'=>'airline_add',
                    'value'=>$airline_add
                ],
                [
                    'role_id'=>$role->id,
                    'type'=>'airline_edit',
                    'value'=>$airline_edit
                ],
                [
                    'role_id'=>$role->id,
                    'type'=>'airline_delete',
                    'value'=>$airline_delete
                ],
    
    
    
    
                [
                    'role_id'=>$role->id,
                    'type'=>'airport_view',
                    'value'=>$airport_view
                ],
                [
                    'role_id'=>$role->id,
                    'type'=>'airport_add',
                    'value'=>$airport_add
                ],
                [
                    'role_id'=>$role->id,
                    'type'=>'airport_edit',
                    'value'=>$airport_edit
                ],
                [
                    'role_id'=>$role->id,
                    'type'=>'airport_delete',
                    'value'=>$airport_delete
                ],
    
    
    
                [
                    'role_id'=>$role->id,
                    'type'=>'airway_view',
                    'value'=>$airway_view
                ],
                [
                    'role_id'=>$role->id,
                    'type'=>'airway_add',
                    'value'=>$airway_add
                ],
                [
                    'role_id'=>$role->id,
                    'type'=>'airway_edit',
                    'value'=>$airway_edit
                ],
                [
                    'role_id'=>$role->id,
                    'type'=>'airway_delete',
                    'value'=>$airway_delete
                ],
    
    
    
    
    
    
                [
                    'role_id'=>$role->id,
                    'type'=>'airway_versions_view',
                    'value'=>$airway_versions_view
                ],
                [
                    'role_id'=>$role->id,
                    'type'=>'airway_versions_view_single',
                    'value'=>$airway_versions_view_single
                ],
                [
                    'role_id'=>$role->id,
                    'type'=>'airway_versions_roll_back',
                    'value'=>$airway_versions_roll_back
                ],
                [
                    'role_id'=>$role->id,
                    'type'=>'airway_versions_delete',
                    'value'=>$airway_versions_delete
                ],
    
    
    
    
                [
                    'role_id'=>$role->id,
                    'type'=>'user_view',
                    'value'=>$user_view
                ],
                [
                    'role_id'=>$role->id,
                    'type'=>'user_add',
                    'value'=>$user_add
                ],
                [
                    'role_id'=>$role->id,
                    'type'=>'user_edit',
                    'value'=>$user_edit
                ],
                [
                    'role_id'=>$role->id,
                    'type'=>'user_delete',
                    'value'=>$user_delete
                ],
    
    
    
                [
                    'role_id'=>$role->id,
                    'type'=>'role_view',
                    'value'=>$role_view
                ],
                [
                    'role_id'=>$role->id,
                    'type'=>'role_add',
                    'value'=>$role_add
                ],
                [
                    'role_id'=>$role->id,
                    'type'=>'role_edit',
                    'value'=>$role_edit
                ],
                [
                    'role_id'=>$role->id,
                    'type'=>'role_delete',
                    'value'=>$role_delete
                ],












            ]);
            

            return redirect()->back()->with('message', 'Data Added Successfully');
        }else{abort(401);}
    }



    public function getAjax(Request $request){
        if(CheckRolePermission('role_edit')){
            $request->validate([
                'id' => 'required',
            ]);
            $body="";

            foreach(Permission::where('role_id',$request->id)->get() as $key=>$permission){
                $type=str_replace('_',' ',  $permission->type);
                $type=ucwords($type);
                $checked="";
                if($permission->value){
                    $checked="checked";
                }
                $body.='<div class="form-check">
                    <input class="form-check-input" type="checkbox" value="on" id="e_'.$permission->type.'" name="'.$permission->type.'" '.$checked.'>
                    <label class="form-check-label" for="e_'.$permission->type.'">
                        '.$type.'
                    </label>
                </div>';
            }
            return $body;

        }else{abort(401);}
    }


       


    public function update(Request $request){
        if(CheckRolePermission('role_edit')){
            $request->validate([
                'id' => 'required',
                'name' => 'required',
            ]);

            Role::where('id',$request->id)->update([
                'name'=>$request->name,
            ]);
            $role=Role::where('id',$request->id)->first();
            
            $client_view=false;
            if($request->client_view=="on"){$client_view=true;}
            $client_add=false;
            if($request->client_add=="on"){$client_add=true;}
            $client_edit=false;
            if($request->client_edit=="on"){$client_edit=true;}
            $client_delete=false;
            if($request->client_delete=="on"){$client_delete=true;}

            $company_view=false;
            if($request->company_view=="on"){$company_view=true;}
            $company_add=false;
            if($request->company_add=="on"){$company_add=true;}
            $company_edit=false;
            if($request->company_edit=="on"){$company_edit=true;}
            $company_delete=false;
            if($request->company_delete=="on"){$company_delete=true;}


            $airline_view=false;
            if($request->airline_view=="on"){$airline_view=true;}
            $airline_add=false;
            if($request->airline_add=="on"){$airline_add=true;}
            $airline_edit=false;
            if($request->airline_edit=="on"){$airline_edit=true;}
            $airline_delete=false;
            if($request->airline_delete=="on"){$airline_delete=true;}


            $airport_view=false;
            if($request->airport_view=="on"){$airport_view=true;}
            $airport_add=false;
            if($request->airport_add=="on"){$airport_add=true;}
            $airport_edit=false;
            if($request->airport_edit=="on"){$airport_edit=true;}
            $airport_delete=false;
            if($request->airport_delete=="on"){$airport_delete=true;}


            $airway_view=false;
            if($request->airway_view=="on"){$airway_view=true;}
            $airway_add=false;
            if($request->airway_add=="on"){$airway_add=true;}
            $airway_edit=false;
            if($request->airway_edit=="on"){$airway_edit=true;}
            $airway_delete=false;
            if($request->airway_delete=="on"){$airway_delete=true;}


            $airway_versions_view=false;
            if($request->airway_versions_view=="on"){$airway_versions_view=true;}
            $airway_versions_view_single=false;
            if($request->airway_versions_view_single=="on"){$airway_versions_view_single=true;}
            $airway_versions_roll_back=false;
            if($request->airway_versions_roll_back=="on"){$airway_versions_roll_back=true;}
            $airway_versions_delete=false;
            if($request->airway_versions_delete=="on"){$airway_versions_delete=true;}


            $user_view=false;
            if($request->user_view=="on"){$user_view=true;}
            $user_add=false;
            if($request->user_add=="on"){$user_add=true;}
            $user_edit=false;
            if($request->user_edit=="on"){$user_edit=true;}
            $user_delete=false;
            if($request->user_delete=="on"){$user_delete=true;}


            $role_view=false;
            if($request->role_view=="on"){$role_view=true;}
            $role_add=false;
            if($request->role_add=="on"){$role_add=true;}
            $role_edit=false;
            if($request->role_edit=="on"){$role_edit=true;}
            $role_delete=false;
            if($request->role_delete=="on"){$role_delete=true;}


            
                


            Permission::where([['type','client_view'],['role_id',$role->id]])->update([
                  
                    'value'=>$client_view
            ]);
            Permission::where([['type','client_add'],['role_id',$role->id]])->update([
                 
                    'value'=>$client_add
            ]);
            Permission::where([['type','client_edit'],['role_id',$role->id]])->update([
                  
                    'value'=>$client_edit
            ]);
            Permission::where([['type','client_delete'],['role_id',$role->id]])->update([
                    
                    'value'=>$client_delete
            ]);
    
    
            Permission::where([['type','company_view'],['role_id',$role->id]])->update([
                  
                    'value'=>$company_view
            ]);
            Permission::where([['type','company_add'],['role_id',$role->id]])->update([
                  
                    'value'=>$company_add
            ]);
            Permission::where([['type','company_edit'],['role_id',$role->id]])->update([
                 
                    'value'=>$company_edit
            ]);
            Permission::where([['type','company_delete'],['role_id',$role->id]])->update([
                
                    'value'=>$company_delete
            ]);
    
    
    
            Permission::where([['type','airline_view'],['role_id',$role->id]])->update([
                
                    'value'=>$airline_view
            ]);
            Permission::where([['type','airline_add'],['role_id',$role->id]])->update([
                 
                    'value'=>$airline_add
            ]);
            Permission::where([['type','airline_edit'],['role_id',$role->id]])->update([
                   
                    'value'=>$airline_edit
            ]);
            Permission::where([['type','airline_delete'],['role_id',$role->id]])->update([
                    
                    'value'=>$airline_delete
            ]);
    
    
    
    
            Permission::where([['type','airport_view'],['role_id',$role->id]])->update([
                
                    'value'=>$airport_view
            ]);
            Permission::where([['type','airport_add'],['role_id',$role->id]])->update([
                    
                    'value'=>$airport_add
            ]);
            Permission::where([['type','airport_edit'],['role_id',$role->id]])->update([
                 
                    'value'=>$airport_edit
            ]);
            Permission::where([['type','airport_delete'],['role_id',$role->id]])->update([
                  
                    'value'=>$airport_delete
            ]);
    
    
    
            Permission::where([['type','airway_view'],['role_id',$role->id]])->update([
                 
                    'value'=>$airway_view
            ]);
            Permission::where([['type','airway_add'],['role_id',$role->id]])->update([
                   
                    'value'=>$airway_add
            ]);
            Permission::where([['type','airway_edit'],['role_id',$role->id]])->update([
                
                    'value'=>$airway_edit
            ]);
            Permission::where([['type','airway_delete'],['role_id',$role->id]])->update([
                   
                    'value'=>$airway_delete
            ]);
    
    
    
    
    
    
            Permission::where([['type','airway_versions_view'],['role_id',$role->id]])->update([
                   
                    'value'=>$airway_versions_view
            ]);
            Permission::where([['type','airway_versions_view_single'],['role_id',$role->id]])->update([
                  
                    'value'=>$airway_versions_view_single
            ]);
            Permission::where([['type','airway_versions_roll_back'],['role_id',$role->id]])->update([
                   
                    'value'=>$airway_versions_roll_back
            ]);
            Permission::where([['type','airway_versions_delete'],['role_id',$role->id]])->update([
         
                    'value'=>$airway_versions_delete
            ]);
    
    
    
    
            Permission::where([['type','user_view'],['role_id',$role->id]])->update([
                   
                    'value'=>$user_view
            ]);
            Permission::where([['type','user_add'],['role_id',$role->id]])->update([
                    
                    'value'=>$user_add
            ]);
            Permission::where([['type','user_edit'],['role_id',$role->id]])->update([
                    
                    'value'=>$user_edit
            ]);
            Permission::where([['type','user_delete'],['role_id',$role->id]])->update([
                   
                    'value'=>$user_delete
            ]);
    
    
    
            Permission::where([['type','role_view'],['role_id',$role->id]])->update([
                    
                    'value'=>$role_view
            ]);
            Permission::where([['type','role_add'],['role_id',$role->id]])->update([
                    
                    'value'=>$role_add
            ]);
            Permission::where([['type','role_edit'],['role_id',$role->id]])->update([
                    
                    'value'=>$role_edit
            ]);
            Permission::where([['type','role_delete'],['role_id',$role->id]])->update([
                    
                    'value'=>$role_delete
            ]);










            return redirect()->back()->with('message', 'Data Updated Successfully');
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
