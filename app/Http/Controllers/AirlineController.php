<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Airline;

class AirlineController extends Controller
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
        if(CheckRolePermission('airline_view')){
            return view('airline.index');
        }else{abort(401);}
    }


     public function store(Request $request){
        if(CheckRolePermission('airline_add')){
            $logo="";
            if($request->hasFile('logo')){
                $logo="data:image/png;base64,".base64_encode(file_get_contents($request->file('logo')));
            }
            Airline::create([
                'name'=>$request->name,
                'identification_no'=>$request->identification_no,
                'logo'=>$logo
            ]);
            return redirect()->back()->with('message', 'Data Added Successfully');
        }else{abort(401);}
    }


    public function storeAjax(Request $request){
        if(CheckRolePermission('airline_add')){
            Airline::create([
                'name'=>$request->name,
                'identification_no'=>$request->identification_no,
                'logo'=>"data:image/png;base64,".base64_encode(file_get_contents($request->file('logo')))
            ]);
            $response="";
            foreach(Airline::all() as $airline){
                $response.="<option value='".$airline->id."'>".$airline->name."</option>";
            }
            return $response;
        }else{abort(401);}
    }


    public function update(Request $request){
        if(CheckRolePermission('airline_edit')){
            if($request->hasFile('logo')){
                Airline::where('id',$request->id)->update([
                    'name'=>$request->name,
                    'identification_no'=>$request->identification_no,
                    'logo'=>"data:image/png;base64,".base64_encode(file_get_contents($request->file('logo')))
                ]);
            }else{
                Airline::where('id',$request->id)->update([
                    'name'=>$request->name,
                    'identification_no'=>$request->identification_no,
                ]);
            }
            
            return redirect()->back()->with('message', 'Data Added Successfully');
        }else{abort(401);}
    }



    public function statusUpdate($id,$status){
        if(CheckRolePermission('airline_edit')){
            $id=base64_decode($id);
            $status=base64_decode($status);
            if($status=="true"){
                $status=true;
            }else if($status=="false"){
                $status=false;
            }else{
                return redirect()->back()->withErrors(['Unauthorized Access']);   
            }
            if(Airline::where('id',$id)->get()->count()>0){
                Airline::where('id',$id)->update([
                    'status'=>$status
                ]);
                return redirect()->back()->with('message', 'Status Updated Successfully');
            }else{
                return redirect()->back()->withErrors(['Unauthorized Access']);   
            }
        }else{abort(401);}
    }



    public function destroy($id){
        if(CheckRolePermission('airline_delete')){
            if(Airline::where('id',$id)->get()->count()>0){
                Airline::where('id',$id)->delete();
                return redirect()->back()->with('message', 'Data Deleted Successfully');
            }else{
                return redirect()->back()->withErrors(['Unauthorized Access']);   
            }
        }else{abort(401);}
    }
}
