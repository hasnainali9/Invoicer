<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
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
        return view('company.index');
    }
    


     public function store(Request $request){
            $request->validate([
                'name'=>'required',
                'identification_no'=>'required',
                'location'=>'required',
                'logo'=>'required',
                'phone_no'=>"required",
                'email'=>"required|email",
            ]);
            Company::create([
                'name'=>$request->name,
                'identification_no'=>$request->identification_no,
                'location'=>$request->location,
                'logo'=>"data:image/png;base64,".base64_encode(file_get_contents($request->file('logo'))),
                'phone_no'=>$request->phone_no,
                'email'=>$request->email,
            ]);
            return redirect()->back()->with('message', 'Data Added Successfully');
    }




    public function storeAjax(Request $request){
        $request->validate([
            'name'=>'required',
            'identification_no'=>'required',
            'location'=>'required',
            'logo'=>'required',
            'phone_no'=>"required",
            'email'=>"required|email",
        ]);
        Company::create([
            'name'=>$request->name,
            'identification_no'=>$request->identification_no,
            'location'=>$request->location,
            'logo'=>"data:image/png;base64,".base64_encode(file_get_contents($request->file('logo'))),
            'phone_no'=>$request->phone_no,
            'email'=>$request->email,
        ]);
        $response="";
        foreach(Company::all() as $Company){
            $response.="<option value='".$Company->id."'>".$Company->name."</option>";
        }
        return $response;
}


    public function update(Request $request){
        $request->validate([
            'id'=>'required',
            'name'=>'required',
            'identification_no'=>'required',
            'location'=>'required',
            'phone_no'=>"required",
            'email'=>"required|email",
        ]);
        if($request->hasFile('logo')){
            $request->validate([
                'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            ]);

            Company::where('id',$request->id)->update([
                'name'=>$request->name,
                'identification_no'=>$request->identification_no,
                'location'=>$request->location,
                'logo'=>"data:image/png;base64,".base64_encode(file_get_contents($request->file('logo'))),
                'phone_no'=>$request->phone_no,
                'email'=>$request->email,
            ]);
        }else{
            Company::where('id',$request->id)->update([
                'name'=>$request->name,
                'location'=>$request->location,
                'identification_no'=>$request->identification_no,
                'phone_no'=>$request->phone_no,
                'email'=>$request->email,
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
        if(Company::where('id',$id)->get()->count()>0){
            Company::where('id',$id)->update([
                'status'=>$status
            ]);
            return redirect()->back()->with('message', 'Status Updated Successfully');
        }else{
            return redirect()->back()->withErrors(['Unauthorized Access']);   
        }
    }



    public function destroy($id){
        if(Company::where('id',$id)->get()->count()>0){
            Company::where('id',$id)->delete();
            return redirect()->back()->with('message', 'Data Deleted Successfully');
        }else{
            return redirect()->back()->withErrors(['Unauthorized Access']);   
        }
    }
}
