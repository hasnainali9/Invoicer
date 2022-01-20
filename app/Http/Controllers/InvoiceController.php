<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use PDF;



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
        return view('invoices.index',['Invoices'=>Invoice::orderBy('id', 'DESC')->get()]);
    }


    
    /**
     * 
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function addIndex()
    {
        return view('invoices.add');
    }

    public function store(Request $request){
        Invoice::create([
            'City_code'=>$request['city_code'],
            'airline_provided_unique_id'=>$request['airline_provided_unique_id'],
            'shiper_name'=>$request['shiper_name'],
            'shiper_address'=>$request['shiper_address'],
            'shiper_city_country'=>$request['shiper_city_country'],
            'shiper_phone_no'=>$request['shiper_phone_no'],
            'consignee_name'=>$request['consignee_name'],
            'consignee_address'=>$request['consignee_address'],
            'consignee_city_country'=>$request['consignee_city_country'],
            'consignee_phone_no'=>$request['consignee_phone_no'],
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
            'executed_on_date'=>$request['executed_on_date'],
            'executed_at_place'=>$request['executed_at_place'],

            'additional_data'=>$request['additional_data'],
            'no_of_edits'=>0,
        ]);
        return redirect('/app/invoices')->with('message', 'Data Added Successfully');
    }


    public function update(Request $request){
        if(!Invoice::where('id',$request->id)->first()){
            return abort(404);
        }
        $no_of_edits=(int)Invoice::where('id',$request->id)->first()->no_of_edits;
        $no_of_edits+=1;
        Invoice::where('id',$request->id)->update([
            
            'City_code'=>$request['city_code'],
            'airline_provided_unique_id'=>$request['airline_provided_unique_id'],
            'shiper_name'=>$request['shiper_name'],
            'shiper_address'=>$request['shiper_address'],
            'shiper_city_country'=>$request['shiper_city_country'],
            'shiper_phone_no'=>$request['shiper_phone_no'],
            'consignee_name'=>$request['consignee_name'],
            'consignee_address'=>$request['consignee_address'],
            'consignee_city_country'=>$request['consignee_city_country'],
            'consignee_phone_no'=>$request['consignee_phone_no'],
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
            'executed_on_date'=>$request['executed_on_date'],
            'executed_at_place'=>$request['executed_at_place'],

            'additional_data'=>$request['additional_data'],
            'no_of_edits'=>$no_of_edits,
        ]);
        return redirect('/app/invoices')->with('message', 'Data Updated Successfully');
    }


    public function downloadInvoice($id){
         $id=base64_decode($id);
        if(Invoice::where('id',$id)->first()){
            
            $data = [
                'Invoice'=>Invoice::where('id',$id)->first()
              ];
            $pdf = PDF::loadView('pdfview',$data);
            return $pdf->download('document.pdf');;
            ;
                //return view('invoices.single',['Invoice'=>Invoice::where('id',$id)->first()]);
        }else{
            return abort(404);
        }
    }


    public function ViewSingle($id){
        $id=base64_decode($id);
        if(Invoice::where('id',$id)->first()){
                return view('invoices.single',['Invoice'=>Invoice::where('id',$id)->first()]);
        }else{
            return abort(404);
        }
    }


    public function updateIndex($id){
        $id=base64_decode($id);
        if(Invoice::where('id',$id)->first()){
                return view('invoices.edit',['Invoice'=>Invoice::where('id',$id)->first()]);
        }else{
            return abort(404);
        }
    }
}
