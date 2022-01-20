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
        return view('airport.index');
    }
    
    
    public function store(Request $request){
            $request->validate([
                'name'=>'required',
            ]);
            Airport::create([
                'name'=>$request->name,
            ]);
            return redirect()->back()->with('message', 'Data Added Successfully');
    }



       
    public function storeAjax(Request $request){
            $request->validate([
                'name'=>'required',
            ]);
            Airport::create([
                'name'=>$request->name,
            ]);
            $response="";
            foreach(Airport::all() as $Airport){
                $response.="<option value='".$Airport->id."'>".$Airport->name."</option>";
            }
            return $response;
    }


    public function update(Request $request){
        $request->validate([
            'id'=>'required',
            'name'=>'required'
        ]);
        Airport::where('id',$request->id)->update([
            'name'=>$request->name,
        ]);
        return redirect()->back()->with('message', 'Data Added Successfully');
    }



    public function statusUpdate($id,$status){
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
    }



    public function destroy($id){
        if(Airport::where('id',$id)->get()->count()>0){
            Airport::where('id',$id)->delete();
            return redirect()->back()->with('message', 'Data Deleted Successfully');
        }else{
            return redirect()->back()->withErrors(['Unauthorized Access']);   
        }
    }
}
