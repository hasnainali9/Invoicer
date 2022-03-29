<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\InvoiceVersion;
use App\Models\InvoicePage;
use Spatie\Browsershot\Browsershot;




class InvoiceController extends Controller
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
        if(CheckRolePermission('airway_view')){
            return view('invoices.index',['Invoices'=>Invoice::latest()->get()]);
        }else{abort(401);}
    }


    
    /**
     * 
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function addIndex()
    {
        if(CheckRolePermission('airway_add')){
            return view('invoices.add');
        }else{abort(401);}
    }

    public function store(Request $request){
        if(CheckRolePermission('airway_add')){
        $Invoice=Invoice::create([
            'City_code'=>$request['city_code'],
            'airline_provided_unique_id'=>$request['airline_provided_unique_id'],
            'shiper_id'=>$request['shiper_id'],
            'consignee_id'=>$request['consignee_id'],
            'airline_id'=>$request['airline_id'],
            'issung_company_id'=>$request['issung_company_id'],
            'accounting_payment_info'=>$request['accounting_payment_info'],
            'accounting_additional_info'=>$request['accounting_additional_info'],
            'account_no'=>$request['account_no'],
            'departure_airport_id'=>$request['departure_airport_id'],
            'reference_no'=>$request['reference_no'],
            'optional_shipping_info'=>$request['optional_shipping_info'],
            'routing_to_1'=>$request['routing_to_1'],
            'routing_by_1'=>$request['routing_by_1'],
            'routing_to_2'=>$request['routing_to_2'],
            'routing_by_2'=>$request['routing_by_2'],
            'routing_to_3'=>$request['routing_to_3'],
            'routing_by_3'=>$request['routing_by_3'],
            'currency'=>$request['currency'],
            'chgs_code'=>$request['chgs_code'],
            'wt_val__ppd'=>$request['wt_val__ppd'],
            'wt_val__coll'=>$request['wt_val__coll'],
            'other__ppd'=>$request['other__ppd'],
            'other__coll'=>$request['other__coll'],
            'd_value_carraige'=>$request['d_value_carraige'],
            'd_value_custom'=>$request['d_value_custom'],
            'destination_airport_id'=>$request['destination_airport_id'],
            'request_flight_on'=>$request['request_flight_on'],
            'request_flight_date'=>$request['request_flight_date'],
            'amount_of_insurance'=>$request['amount_of_insurance'],
            'handling_information'=>$request['handling_information'],
            'sci'=>$request['sci'],
            'no_of_pieces'=>$request['no_of_pieces'],
            'gross_weight'=>$request['gross_weight'],
            'kg_lb'=>$request['kg_lb'],
            'rate_q'=>$request['rate_q'],
            'rate_item_no'=>$request['rate_item_no'],
            'charge_weight'=>$request['charge_weight'],
            'rate_per_charge'=>$request['rate_per_charge'],
            'total_of_weight_based_on_charge'=>$request['total_of_weight_based_on_charge'],
            'nature_quantity_of_good'=>$request['nature_quantity_of_good'],
            'weight_charge_prepaid'=>$request['weight_charge_prepaid'],
            'weight_charge_collected'=>$request['weight_charge_collected'],
            'valuation_charge_prepaid'=>$request['valuation_charge_prepaid'],
            'valuation_charge_collected'=>$request['valuation_charge_collected'],
            'tax_prepaid'=>$request['tax_prepaid'],
            'tax_collected'=>$request['tax_collected'],
            'other_charge_due_agent_prepaid'=>$request['other_charge_due_agent_prepaid'],
            'other_charge_due_agent_collected'=>$request['other_charge_due_agent_collected'],
            'other_charge_due_carrier_prepaid'=>$request['other_charge_due_carrier_prepaid'],
            'other_charge_due_carrier_collected'=>$request['other_charge_due_carrier_collected'],
            'total_prepaid'=>$request['total_prepaid'],
            'total_collected'=>$request['total_collected'],
            'currency_conversion_rate'=>$request['currency_conversion_rate'],
            'cc_charge_dest_currency'=>$request['cc_charge_dest_currency'],
            'other_charges'=>$request['other_charges'],
            'shipper_signature'=>$request['shipper_signature'],
            'executed_on_date'=>$request['executed_on_date'],
            'executed_at_place'=>$request['executed_at_place'],
            'additional_data_1'=>$request['additional_data_1'],
            'additional_data_2'=>$request['additional_data_2'],
            'additional_data_3'=>$request['additional_data_3'],
            'additional_data_4'=>$request['additional_data_4'],
            'additional_data_5'=>$request['additional_data_5'],
            'additional_data_6'=>$request['additional_data_6'],
            'additional_data_7'=>$request['additional_data_7'],
            'additional_data_8'=>$request['additional_data_8'],
            'no_of_edits'=>0,
        ]);
        return redirect('/app/invoices')->with('message', 'Data Added Successfully');
        }else{abort(401);}
    }


    public function update(Request $request){
        if(CheckRolePermission('airway_edit')){
        if(!Invoice::where('id',$request->id)->first()){
            return abort(404);
        }
        $no_of_edits=(int)Invoice::where('id',$request->id)->first()->no_of_edits;
        $no_of_edits+=1;
        InvoiceVersion::create([
            'invoice_id'=>$request->id,
            'City_code'=>$request['city_code'],
            'airline_provided_unique_id'=>$request['airline_provided_unique_id'],
            'shiper_id'=>$request['shiper_id'],
            'consignee_id'=>$request['consignee_id'],
            'airline_id'=>$request['airline_id'],
            'issung_company_id'=>$request['issung_company_id'],
            'accounting_payment_info'=>$request['accounting_payment_info'],
            'accounting_additional_info'=>$request['accounting_additional_info'],
            'account_no'=>$request['account_no'],
            'departure_airport_id'=>$request['departure_airport_id'],
            'reference_no'=>$request['reference_no'],
            'optional_shipping_info'=>$request['optional_shipping_info'],
            'routing_to_1'=>$request['routing_to_1'],
            'routing_by_1'=>$request['routing_by_1'],
            'routing_to_2'=>$request['routing_to_2'],
            'routing_by_2'=>$request['routing_by_2'],
            'routing_to_3'=>$request['routing_to_3'],
            'routing_by_3'=>$request['routing_by_3'],
            'currency'=>$request['currency'],
            'chgs_code'=>$request['chgs_code'],
            'wt_val__ppd'=>$request['wt_val__ppd'],
            'wt_val__coll'=>$request['wt_val__coll'],
            'other__ppd'=>$request['other__ppd'],
            'other__coll'=>$request['other__coll'],
            'd_value_carraige'=>$request['d_value_carraige'],
            'd_value_custom'=>$request['d_value_custom'],
            'destination_airport_id'=>$request['destination_airport_id'],
            'request_flight_on'=>$request['request_flight_on'],
            'request_flight_date'=>$request['request_flight_date'],
            'amount_of_insurance'=>$request['amount_of_insurance'],
            'handling_information'=>$request['handling_information'],
            'sci'=>$request['sci'],
            'no_of_pieces'=>$request['no_of_pieces'],
            'gross_weight'=>$request['gross_weight'],
            'kg_lb'=>$request['kg_lb'],
            'rate_q'=>$request['rate_q'],
            'rate_item_no'=>$request['rate_item_no'],
            'charge_weight'=>$request['charge_weight'],
            'rate_per_charge'=>$request['rate_per_charge'],
            'total_of_weight_based_on_charge'=>$request['total_of_weight_based_on_charge'],
            'nature_quantity_of_good'=>$request['nature_quantity_of_good'],
            'weight_charge_prepaid'=>$request['weight_charge_prepaid'],
            'weight_charge_collected'=>$request['weight_charge_collected'],
            'valuation_charge_prepaid'=>$request['valuation_charge_prepaid'],
            'valuation_charge_collected'=>$request['valuation_charge_collected'],
            'tax_prepaid'=>$request['tax_prepaid'],
            'tax_collected'=>$request['tax_collected'],
            'other_charge_due_agent_prepaid'=>$request['other_charge_due_agent_prepaid'],
            'other_charge_due_agent_collected'=>$request['other_charge_due_agent_collected'],
            'other_charge_due_carrier_prepaid'=>$request['other_charge_due_carrier_prepaid'],
            'other_charge_due_carrier_collected'=>$request['other_charge_due_carrier_collected'],
            'total_prepaid'=>$request['total_prepaid'],
            'total_collected'=>$request['total_collected'],
            'currency_conversion_rate'=>$request['currency_conversion_rate'],
            'cc_charge_dest_currency'=>$request['cc_charge_dest_currency'],
            'other_charges'=>$request['other_charges'],
            'shipper_signature'=>$request['shipper_signature'],
            'executed_on_date'=>$request['executed_on_date'],
            'executed_at_place'=>$request['executed_at_place'],
            'additional_data_1'=>$request['additional_data_1'],
            'additional_data_2'=>$request['additional_data_2'],
            'additional_data_3'=>$request['additional_data_3'],
            'additional_data_4'=>$request['additional_data_4'],
            'additional_data_5'=>$request['additional_data_5'],
            'additional_data_6'=>$request['additional_data_6'],
            'additional_data_7'=>$request['additional_data_7'],
            'additional_data_8'=>$request['additional_data_8'],
        ]);
        Invoice::where('id',$request->id)->update([        
            'City_code'=>$request['city_code'],
            'airline_provided_unique_id'=>$request['airline_provided_unique_id'],
            'shiper_id'=>$request['shiper_id'],
            'consignee_id'=>$request['consignee_id'],
            'airline_id'=>$request['airline_id'],
            'issung_company_id'=>$request['issung_company_id'],
            'accounting_payment_info'=>$request['accounting_payment_info'],
            'accounting_additional_info'=>$request['accounting_additional_info'],
            'account_no'=>$request['account_no'],
            'departure_airport_id'=>$request['departure_airport_id'],
            'reference_no'=>$request['reference_no'],
            'optional_shipping_info'=>$request['optional_shipping_info'],
            'routing_to_1'=>$request['routing_to_1'],
            'routing_by_1'=>$request['routing_by_1'],
            'routing_to_2'=>$request['routing_to_2'],
            'routing_by_2'=>$request['routing_by_2'],
            'routing_to_3'=>$request['routing_to_3'],
            'routing_by_3'=>$request['routing_by_3'],
            'currency'=>$request['currency'],
            'chgs_code'=>$request['chgs_code'],
            'wt_val__ppd'=>$request['wt_val__ppd'],
            'wt_val__coll'=>$request['wt_val__coll'],
            'other__ppd'=>$request['other__ppd'],
            'other__coll'=>$request['other__coll'],
            'd_value_carraige'=>$request['d_value_carraige'],
            'd_value_custom'=>$request['d_value_custom'],
            'destination_airport_id'=>$request['destination_airport_id'],
            'request_flight_on'=>$request['request_flight_on'],
            'request_flight_date'=>$request['request_flight_date'],
            'amount_of_insurance'=>$request['amount_of_insurance'],
            'handling_information'=>$request['handling_information'],
            'sci'=>$request['sci'],
            'no_of_pieces'=>$request['no_of_pieces'],
            'gross_weight'=>$request['gross_weight'],
            'kg_lb'=>$request['kg_lb'],
            'rate_q'=>$request['rate_q'],
            'rate_item_no'=>$request['rate_item_no'],
            'charge_weight'=>$request['charge_weight'],
            'rate_per_charge'=>$request['rate_per_charge'],
            'total_of_weight_based_on_charge'=>$request['total_of_weight_based_on_charge'],
            'nature_quantity_of_good'=>$request['nature_quantity_of_good'],
            'weight_charge_prepaid'=>$request['weight_charge_prepaid'],
            'weight_charge_collected'=>$request['weight_charge_collected'],
            'valuation_charge_prepaid'=>$request['valuation_charge_prepaid'],
            'valuation_charge_collected'=>$request['valuation_charge_collected'],
            'tax_prepaid'=>$request['tax_prepaid'],
            'tax_collected'=>$request['tax_collected'],
            'other_charge_due_agent_prepaid'=>$request['other_charge_due_agent_prepaid'],
            'other_charge_due_agent_collected'=>$request['other_charge_due_agent_collected'],
            'other_charge_due_carrier_prepaid'=>$request['other_charge_due_carrier_prepaid'],
            'other_charge_due_carrier_collected'=>$request['other_charge_due_carrier_collected'],
            'total_prepaid'=>$request['total_prepaid'],
            'total_collected'=>$request['total_collected'],
            'currency_conversion_rate'=>$request['currency_conversion_rate'],
            'cc_charge_dest_currency'=>$request['cc_charge_dest_currency'],
            'other_charges'=>$request['other_charges'],
            'shipper_signature'=>$request['shipper_signature'],
            'executed_on_date'=>$request['executed_on_date'],
            'executed_at_place'=>$request['executed_at_place'],
            'additional_data_1'=>$request['additional_data_1'],
            'additional_data_2'=>$request['additional_data_2'],
            'additional_data_3'=>$request['additional_data_3'],
            'additional_data_4'=>$request['additional_data_4'],
            'additional_data_5'=>$request['additional_data_5'],
            'additional_data_6'=>$request['additional_data_6'],
            'additional_data_7'=>$request['additional_data_7'],
            'additional_data_8'=>$request['additional_data_8'],
            'no_of_edits'=>$no_of_edits,
        ]);
        return redirect('/app/invoices')->with('message', 'Data Updated Successfully');
        }else{abort(401);}
    }


    public function downloadInvoice($id){
        if(CheckRolePermission('airway_view')){
            $id=base64_decode($id);
            if(Invoice::where('id',$id)->first()){
                Browsershot::url('http://147.182.133.230/Invoicer/public/index.php/app/invoices/full/'.base64_encode($id).'/view')->format('A4')->save('temp/invoice-'.base64_encode($id).'.pdf');
                return response()->download(public_path('temp/invoice-'.base64_encode($id).'.pdf'));
            }else{
                return abort(404);
            }
        }else{abort(401);}
    }


    public function downloadSpecificInvoice($id,Request $request){
        if(CheckRolePermission('airway_view')){
            $id=base64_decode($id);
            $page=base64_decode($page);
            $SpecificPager=base64_decode($request->specific_page);
            if(Invoice::where('id',$id)->first()){
                Browsershot::url('http://147.182.133.230/Invoicer/public/index.php/app/invoices/full/'.base64_encode($id).'/view')->format('A4')->save('temp/invoice-'.base64_encode($id).'.pdf');
                return response()->download(public_path('temp/invoice-'.base64_encode($id).'.pdf'));
            }else{
                return abort(404);
            }
        }else{abort(401);}
    }





    public function ViewSingle($id){
        if(CheckRolePermission('airway_view')){
            $id=base64_decode($id);
            if(Invoice::where('id',$id)->first()){
                    return view('invoices.single',['Invoice'=>Invoice::where('id',$id)->first(),'InvoicePages'=>InvoicePage::all()]);
            }else{
                return abort(404);
            }
        }else{abort(401);}
    }




    public function updateIndex($id){
        if(CheckRolePermission('airway_edit')){
            $id=base64_decode($id);
            if(Invoice::where('id',$id)->first()){
                    return view('invoices.edit',['Invoice'=>Invoice::where('id',$id)->first()]);
            }else{
                return abort(404);
            }
        }else{abort(401);}
    }


    public function DuplicateInvoice($id){
        if(CheckRolePermission('airway_view')){
            $id=base64_decode($id);
            if(Invoice::where('id',$id)->first()){
                    return view('invoices.duplicate',['Invoice'=>Invoice::where('id',$id)->first()]);
            }else{
                return abort(404);
            }
        }else{abort(401);}
    }


    public function destroy($id){
        if(CheckRolePermission('airway_delete')){
            $id=base64_decode($id);
            if(Invoice::where('id',$id)->first()){
                Invoice::where('id',$id)->delete();
                return redirect('/app/invoices')->with('message', 'Data Deleted Successfully');
            }else{
                return abort(404);
            }
        }else{abort(401);}
    }














    public function VersionsShowAll($id){
        if(CheckRolePermission('airway_versions_view')){
            $id=base64_decode($id);
            if(Invoice::where('id',$id)->first()){
                    return view('invoices.versions',[
                        'Invoice'=>Invoice::where('id',$id)->first(),
                        'Versions'=>InvoiceVersion::where('invoice_id',$id)->get()
                    ]);
            }else{
                return abort(404);
            }
        }else{abort(401);}
    }

    public function VersionsShow($id){
        if(CheckRolePermission('airway_versions_view_single')){
            $id=base64_decode($id);
            if(InvoiceVersion::where('id',$id)->first()){
                    return view('invoices.single',['Invoice'=>InvoiceVersion::where('id',$id)->first()]);
            }else{
                return abort(404);
            }
        }else{abort(401);}
    }



    public function VersionsRollBack($id){
        if(CheckRolePermission('airway_versions_roll_back')){
            $id=base64_decode($id);
            if(InvoiceVersion::where('id',$id)->first()){
                $staff = InvoiceVersion::where('id',$id)->first()->replicate();
                    $staff = $staff->toArray();
                    unset($staff['invoice_id']);
                    
                    Invoice::where('id',InvoiceVersion::where('id',$id)->first()->invoice_id)->update($staff);
                    return redirect('/app/invoices')->with('message', 'Version Roll Back Successfully Complete');
            }else{
                return abort(404);
            }
        }else{abort(401);}
    }





    
    public function VersionDestroy($id){
        if(CheckRolePermission('airway_versions_delete')){
            $id=base64_decode($id);
            if(InvoiceVersion::where('id',$id)->first()){
                InvoiceVersion::where('id',$id)->delete();
                return redirect('/app/invoices')->with('message', 'Invoice Version Deleted Successfully');
            }else{
                return abort(404);
            }
        }else{abort(401);}
    }













}
