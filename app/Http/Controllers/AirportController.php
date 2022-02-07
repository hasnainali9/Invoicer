<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Airport;

class AirportController extends Controller
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
        if(CheckRolePermission('airport_view')){
            return view('airport.index');
        }else{abort(401);}
    }
    
    
    public function store(Request $request){
        if(CheckRolePermission('airport_add')){
            Airport::create([
                'name'=>$request->name,
            ]);
            return redirect()->back()->with('message', 'Data Added Successfully');
        }else{abort(401);}
    }



       
    public function storeAjax(Request $request){
        if(CheckRolePermission('airport_add')){
            Airport::create([
                'name'=>$request->name,
            ]);
            $response="";
            foreach(Airport::all() as $Airport){
                $response.="<option value='".$Airport->id."'>".$Airport->name."</option>";
            }
            return $response;
        }else{abort(401);}
    }


    public function update(Request $request){
        if(CheckRolePermission('airport_edit')){
            Airport::where('id',$request->id)->update([
                'name'=>$request->name,
            ]);
            return redirect()->back()->with('message', 'Data Added Successfully');
        }else{abort(401);}
    }



    public function statusUpdate($id,$status){
        if(CheckRolePermission('airport_edit')){
            $id=base64_decode($id);
            $status=base64_decode($status);
            if($status=="true"){
                $status=true;
            }else if($status=="false"){
                $status=false;
            }else{
                return redirect()->back()->withErrors(['Unauthorized Access']);   
            }
            if(Airport::where('id',$id)->get()->count()>0){
                Airport::where('id',$id)->update([
                    'status'=>$status
                ]);
                return redirect()->back()->with('message', 'Status Updated Successfully');
            }else{
                return redirect()->back()->withErrors(['Unauthorized Access']);   
            }
        }else{abort(401);}
    }



    public function destroy($id){
        if(CheckRolePermission('airport_delete')){
            if(Airport::where('id',$id)->get()->count()>0){
                Airport::where('id',$id)->delete();
                return redirect()->back()->with('message', 'Data Deleted Successfully');
            }else{
                return redirect()->back()->withErrors(['Unauthorized Access']);   
            }
        }else{abort(401);}
    }
}
