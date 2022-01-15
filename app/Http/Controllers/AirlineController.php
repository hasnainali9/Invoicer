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
        return view('airline.index');
    }


     public function store(Request $request){
            $request->validate([
                'name'=>'required',
                'identification_no'=>'required',
                'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            ]);
            Airline::create([
                'name'=>$request->name,
                'identification_no'=>$request->identification_no,
                'logo'=>"data:image/png;base64,".base64_encode(file_get_contents($request->file('logo')))
            ]);
            return redirect()->back()->with('message', 'Data Added Successfully');
    }


    public function update(Request $request){
        $request->validate([
            'id'=>'required',
            'name'=>'required',
            'identification_no'=>'required',
        ]);
        if($request->hasFile('logo')){
            $request->validate([
                'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            ]);

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
        if(Airline::where('id',$id)->get()->count()>0){
            Airline::where('id',$id)->update([
                'status'=>$status
            ]);
            return redirect()->back()->with('message', 'Status Updated Successfully');
        }else{
            return redirect()->back()->withErrors(['Unauthorized Access']);   
        }
    }



    public function destroy($id){
        if(Airline::where('id',$id)->get()->count()>0){
            Airline::where('id',$id)->delete();
            return redirect()->back()->with('message', 'Data Deleted Successfully');
        }else{
            return redirect()->back()->withErrors(['Unauthorized Access']);   
        }
    }
}
