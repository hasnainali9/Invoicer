<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
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
        if(CheckRolePermission('client_view')){
            return view('client.index');
        }else{abort(401);}
    }


    public function store(Request $request){
        if(CheckRolePermission('client_add')){
            Client::create([
                'line_1'=>$request->line_1,
                'line_2'=>$request->line_2,
                'line_3'=>$request->line_3,
                'line_4'=>$request->line_4
           ]);
           return redirect()->back()->with('message', 'Data Added Successfully');
        }else{abort(401);}
   }




   public function storeAjax(Request $request){
    if(CheckRolePermission('client_add')){
        Client::create([
            'line_1'=>$request->line_1,
            'line_2'=>$request->line_2,
            'line_3'=>$request->line_3,
            'line_4'=>$request->line_4
       ]);
       $response="";
       foreach(Client::all() as $Company){
           $response.="<option value='".$Company->id."'>".$Company->line_1."</option>";
       }
       return $response;
    }else{abort(401);}
}


   public function update(Request $request){
    if(CheckRolePermission('client_edit')){
        Client::where('id',$request->id)->update([
            'line_1'=>$request->line_1,
            'line_2'=>$request->line_2,
            'line_3'=>$request->line_3,
            'line_4'=>$request->line_4
        ]);       
       return redirect()->back()->with('message', 'Data Added Successfully');
    }else{abort(401);}
   }







   public function destroy($id){
    if(CheckRolePermission('client_delete')){
       if(Client::where('id',$id)->get()->count()>0){
            Client::where('id',$id)->delete();
           return redirect()->back()->with('message', 'Data Deleted Successfully');
       }else{
           return redirect()->back()->withErrors(['Unauthorized Access']);   
       }
    }else{abort(401);}
   }
}
