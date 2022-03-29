@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header d-sm-flex d-block">
            <div class="me-auto mb-sm-0 mb-3">
                <h4 class="card-title mb-2">Create New Airway Bill</h4>
            </div>
        </div>
        <div class="card-body">
            <form action="{{route('invoices.store')}}" method="post" id="FormSubmit">
                @csrf
                <div class="mb-3 row">
                    <label class="col-3 col-form-label">Capitalize</label>
                    <div class="col-4">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="auto_capitalize" value="FullCapitalize" {{old('auto_capitalize')=="FullCapitalize"?"checked":""}}>
                            <label class="form-check-label">
                                Full Word Capitalization
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="auto_capitalize" value="FirstWordCapitalize" {{old('auto_capitalize')=="FirstWordCapitalize"?"checked":""}}>
                            <label class="form-check-label">
                                First Character Capitalization
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="auto_capitalize" value="NoCapitalization" {{old('auto_capitalize')=="NoCapitalization"?"checked":"checked"}}>
                            <label class="form-check-label">
                                OFF(default)
                            </label>
                        </div>
                   
                    </div>
                </div>




                <div class="mb-3 row">
                    <label class="col-3 col-form-label">City Code</label>
                    <div class="col-9">
                       <input type="text" required maxlength="4" class="form-control toUpperCase" value="{{old('city_code')}}" name="city_code">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-3 col-form-label">Airline Provided Unique Id</label>
                    <div class="col-9">
                       <input type="text" required class="form-control toUpperCase addDash" maxlength="9"  value="{{old('airline_provided_unique_id')}}" name="airline_provided_unique_id">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label class="col-3 col-form-label">Shipper's Details</label>
                    <div class="col-7">
                        <select class="form-control select-2" name="shiper_id" id="shipper_id">
                            @foreach($Clients as $Client)
                                @if($Client->id==old('shiper_id'))
                                    <option value="{{$Client->id}}" selected>{{$Client->line_1}}</option>
                                @else
                                    <option value="{{$Client->id}}">{{$Client->line_1}}</option>
                                @endif
                            @endforeach
                        </select>

                    </div>
                    <div class="col-2">
                        <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#AddModalClient">
                            Add New Client
                        </button>
                    </div>
                </div>





                <div class="mb-3 row">
                    <label class="col-3 col-form-label">Consignee's Details </label>
                    <div class="col-7">
                        <select class="form-control select-2" name="consignee_id" id="consignee_id">
                            @foreach($Clients as $Client)
                                @if($Client->id==old('consignee_id'))
                                    <option value="{{$Client->id}}" selected>{{$Client->line_1}}</option>
                                @else
                                    <option value="{{$Client->id}}">{{$Client->line_1}}</option>
                                @endif
                            @endforeach
                        </select>

                    </div>
                    <div class="col-2">
                        <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#AddModalClient">
                            Add New Client
                        </button>
                    </div>
                </div>






                <div class="mb-3 row">
                    <label class="col-3 col-form-label">Select Airline </label>
                    <div class="col-7">
                        <select class="form-control select-2" name="airline_id" id="airline_id">
                            @foreach($Airlines as $Airline)
                                @if($Airline->id==old('airline_id'))
                                    <option value="{{$Airline->id}}" selected>{{$Airline->name}}</option>
                                @else
                                    <option value="{{$Airline->id}}">{{$Airline->name}}</option>
                                @endif
                            @endforeach
                        </select>
                        
                    </div>
                    <div class="col-2">
                        <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#AddModalAirline">
                            Add New Airline
                        </button>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-3 col-form-label">Issuing Carrier's Agent Name and City</label>
                    <div class="col-6">
                        <select class="form-control select-2" name="issung_company_id" id="issung_company_id">
                            @foreach($Companies as $Company)
                                @if($Company->id==old('issung_company_id'))
                                    <option value="{{$Company->id}}" selected>{{$Company->name}}</option>
                                @else
                                    <option value="{{$Company->id}}">{{$Company->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="col-3">
                        <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#AddModalCompany">
                            Add New Company
                        </button>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-3 col-form-label">Accounting Information</label>
                    <div class="col-9">
                        <div class="row">
                                <div class="col-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="accounting_payment_info" value="FreightPrepaid" {{old('accounting_payment_info')=="FreightPrepaid"?"checked":"checked"}}>
                                        <label class="form-check-label">
                                            Freight Prepaid
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="accounting_payment_info" value="Invoiced" {{old('accounting_payment_info')=="Invoiced"?"checked":""}}>
                                        <label class="form-check-label">
                                            Invoiced
                                        </label>
                                    </div>
                                    <div class="form-check disabled">
                                        <input class="form-check-input" type="radio" name="accounting_payment_info" value="ChargesCollected" {{old('accounting_payment_info')=="ChargesCollected"?"checked":""}}>
                                        <label class="form-check-label">
                                            Charges Collected
                                        </label>
                                    </div>
                                </div>
                                <div class="col-8">
                                    <textarea placeholder="Additional Information " onkeypress="return ValidateLines(this,225,60)" name="accounting_additional_info" class="form-control toUpperCase">{{old('accounting_additional_info')}}</textarea>
                                </div>
                        </div>
                    </div>
                </div>


                <div class="mb-3 row">
                    <label class="col-3 col-form-label">Account No</label>
                    <div class="col-9">
                        <textarea class="form-control toUpperCase" maxlength="27" name="account_no">{{old('account_no')}}</textarea>
                    </div>
                </div>


                
                <div class="mb-3 row">
                    <label class="col-3 col-form-label">Airport of Departure(Addr.of First Carrier) and Requested Routing</label>
                    <div class="col-6">
                        <select class="form-control select-2" name="departure_airport_id" id="departure_airport_id">
                             @foreach($Airports as $Airport)
                                @if($Airport->id==old('departure_airport_id'))
                                    <option value="{{$Airport->id}}">{{$Airport->name}}</option>
                                @else
                                    <option value="{{$Airport->id}}">{{$Airport->name}}</option>
                                @endif
                            @endforeach
                        </select>
                        
                    </div>
                    <div class="col-3">
                        <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#AddModalAirport">
                            Add New Airport
                        </button>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-3 col-form-label">Reference No</label>
                    <div class="col-9">
                        <textarea class="form-control toUpperCase" maxlength="31" name="reference_no">{{old('reference_no')}}</textarea>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-3 col-form-label">Optional Shipping information</label>
                    <div class="col-9">
                        <textarea class="form-control toUpperCase" maxlength="28" name="optional_shipping_info">{{old('optional_shipping_info')}}</textarea>
                    </div>
                </div>
                <div class="mb-3 row">
                    <h3 class="col-12 col-form-label text-center">Routing & Destination</h3>
                    <div class="col-12 col-md-2">
                        <textarea class="form-control toUpperCase" maxlength="3" name="routing_to_1" placeholder="To">{{old('routing_to_1')}}</textarea>
                    </div>
                    <div class="col-12 col-md-2">
                        <textarea class="form-control toUpperCase" maxlength="5" name="routing_by_1" placeholder="By First Carrier">{{old('routing_by_1')}}</textarea>
                    </div>
                    <div class="col-12 col-md-2">
                        <textarea class="form-control toUpperCase" maxlength="4" name="routing_to_2" placeholder="To">{{old('routing_to_2')}}</textarea>
                    </div>
                    <div class="col-12 col-md-2">
                        <textarea class="form-control toUpperCase" maxlength="4" name="routing_by_2" placeholder="By">{{old('routing_by_2')}}</textarea>
                    </div>
                    <div class="col-12 col-md-2">
                        <textarea class="form-control toUpperCase" maxlength="4" name="routing_to_3" placeholder="To">{{old('routing_to_3')}}</textarea>
                    </div>
                    <div class="col-12 col-md-2">
                        <textarea class="form-control toUpperCase" maxlength="4" name="routing_by_3" placeholder="By">{{old('routing_by_3')}}</textarea>
                    </div>
                </div>


                 <div class="mb-3 row">
                   
                    
                    
                    
                    
                    
                    <div class="col-12 col-md-2">
                         <h3 class="col-12 col-form-label text-center">Currency</h3>
                        <textarea class="form-control toUpperCase" maxlength="5" name="currency" placeholder="USD">{{old('currency')}}</textarea>
                    </div>
                    <div class="col-12 col-md-1">
                        <h3 class="col-12 col-form-label text-center">CHG's code</h3>
                        <textarea class="form-control toUpperCase" maxlength="2" name="chgs_code" placeholder="PP">{{old('chgs_code')}}</textarea>
                    </div>
                    <div class="col-12 col-md-2"  style="border: 1px solid gray;">
                        <h3 class="col-12 col-form-label text-center">WT/VAL</h3>
                        <div class="row">
                            <label class="col-6 col-form-label">PPD</label>
                             <label class="col-6 col-form-label">COLL</label>
                            <div class="col-6">
                                <textarea class="form-control toUpperCase" maxlength="1" name="wt_val__ppd" placeholder="p">{{old('wt_val__ppd')}}</textarea>
                            </div>    
                           
                             <div class="col-6">
                                <textarea class="form-control toUpperCase" maxlength="1" name="wt_val__coll" placeholder="p">{{old('wt_val__coll')}}</textarea>
                            </div>    
                        </div>
                        
                    </div>
                    <div class="col-12 col-md-2" style="border: 1px solid gray;">
                        <h3 class="col-12 col-form-label text-center">Other</h3>
                        <div class="row">
                            <label class="col-6 col-form-label">PPD</label>
                             <label class="col-6 col-form-label">COLL</label>
                            <div class="col-6">
                                <textarea class="form-control toUpperCase" maxlength="1" name="other__ppd" placeholder="p">{{old('other__ppd')}}</textarea>
                            </div>    
                           
                             <div class="col-6">
                                <textarea class="form-control toUpperCase" maxlength="1" name="other__coll" placeholder="p">{{old('other__coll')}}</textarea>
                            </div>    
                        </div>
                    </div>
                    <div class="col-12 col-md-2">
                        <h3 class="col-12 col-form-label text-center">Declared Value for Carraige</h3>
                        <textarea class="form-control toUpperCase" maxlength="15" name="d_value_carraige" placeholder="NVD">{{old('d_value_carraige')}}</textarea>
                    </div>
                    <div class="col-12 col-md-3">
                        <h3 class="col-12 col-form-label text-center">Declared Value for Customs</h3>
                        <textarea class="form-control toUpperCase" maxlength="15" name="d_value_custom" >{{old('d_value_custom')}}</textarea>
                    </div>
                </div>


                <div class="mb-3 row">
                    <label class="col-3 col-form-label">Airport of Destination</label>
                    <div class="col-6">
                        <select class="form-control select-2" name="destination_airport_id" id="destination_airport_id">
                            @foreach($Airports as $Airport)
                                @if($Airport->id==old('destination_airport_id'))
                                    <option value="{{$Airport->id}}" selected>{{$Airport->name}}</option>
                                @else
                                    <option value="{{$Airport->id}}">{{$Airport->name}}</option>
                                @endif
                            @endforeach
                        </select>
                        
                    </div>
                    <div class="col-3">
                        <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#AddModalAirport">
                            Add New Airport
                        </button>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-12 text-center col-form-label">Requested Flight / Date</label>
                     <div class="col-6">
                        <textarea class="form-control toUpperCase" maxlength="10" name="request_flight_on" >{{old('request_flight_on')}}</textarea>
                    </div>
                     <div class="col-6">
                        <textarea class="form-control toUpperCase" maxlength="10" name="request_flight_date" >{{old('request_flight_date')}}</textarea>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-3 col-form-label">Amount of Insurance</label>
                    <div class="col-9">
                        <textarea class="form-control toUpperCase" maxlength="19" name="amount_of_insurance">{{old('amount_of_insurance')}}</textarea>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label class="col-3 col-form-label">Handling Information</label>
                    <div class="col-9">
                        <textarea class="form-control toUpperCase" onkeypress="return ValidateLines(this,300,100)"  name="handling_information">{{old('handling_information')}}</textarea>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-3 col-form-label">SCI</label>
                    <div class="col-9">
                        <textarea class="form-control toUpperCase" maxlength="17" name="sci">{{old('no_of_pieces')}}</textarea>
                    </div>
                </div>



                <div class="mb-3 row">
                    
                    
                  
                    
                    
                    
                    
                    
                    <div class="col-12 col-md-2">
                        <label class="col-12 col-form-label">No of pieces RCP</label>
                        <textarea class="form-control toUpperCase" maxlength="5" name="no_of_pieces">{{old('no_of_pieces')}}</textarea>
                    </div>
                    <div class="col-12 col-md-2">
                        <label class="col-12 col-form-label">Gross Weight</label>
                        <textarea class="form-control toUpperCase" maxlength="8" name="gross_weight">{{old('gross_weight')}}</textarea>
                    </div>
                    <div class="col-12 col-md-2">
                          <label class="col-12 col-form-label">kg lb</label>
                        <textarea class="form-control toUpperCase" maxlength="2" name="kg_lb">{{old('kg_lb')?old('kg_lb'):'kg'}}</textarea>
                    </div>
                    <div class="col-12 col-md-4" style="border: 1px solid red;">
                        <label class="col-12 col-form-label">Rate Class</label>
                        <div class="row">
                            
                            
                            <div class="col-12 col-md-4">
                                <label class="col-12 col-form-label">Q</label>
                                <textarea class="form-control toUpperCase" maxlength="2" name="rate_q">{{old('rate_q')}}</textarea>
                            </div>
                            <div class="col-12 col-md-8">
                                <label class="col-12 col-form-label">Commodity Item No</label>
                                <textarea class="form-control toUpperCase" maxlength="8" name="rate_item_no">{{old('rate_item_no')}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-2">
                        <label class="col-12 col-form-label">Chargeable Weight</label>
                        <input type="number" value="{{old('charge_weight')?old('charge_weight'):0}}" class="form-control" id="charge_weight" name="charge_weight" step="0.01" />
                    </div>
                    <div class="col-12 col-md-2">
                        <label class="col-12 col-form-label">Rate/Charge</label>
                        <input type="number" value="{{old('rate_per_charge')?old('rate_per_charge'):0}}" class="form-control" id="rate_per_charge" name="rate_per_charge" step="0.01" />
                    </div>
                    <div class="col-12 col-md-2">
                        <label class="col-12 col-form-label">Total</label>
                        <input type="number" value="{{old('total_of_weight_based_on_charge')?old('total_of_weight_based_on_charge'):0}}"  class="form-control" id="total_of_weight_based_on_charge" name="total_of_weight_based_on_charge" readonly step="0.01" />
                    </div>
                    <div class="col-12 col-md-12">
                        <label class="col-12 col-form-label">Nature and Quantity of Goods(Incl. Dimension or Volume)</label>
                        <textarea class="form-control toUpperCase" maxlength="350" name="nature_quantity_of_good">{{old('nature_quantity_of_good')}}</textarea>
                    </div>
                </div>


                <div class="mb-3 row">
                    
                        <label class="col-12 col-form-label">Additional Data</label>
                         <div class="col-12">
                            <textarea class="form-control prepaid toUpperCase" maxlength="50" placeholder="MARKS & NOS Line 1" name="additional_data_1">{{old('additional_data_1')}}</textarea>
                        </div>
                        <div class="col-12">
                            <textarea class="form-control prepaid toUpperCase" maxlength="50" placeholder="MARKS & NOS Line 2" name="additional_data_2">{{old('additional_data_2')}}</textarea>
                        </div>
                        <div class="col-12">
                            <textarea class="form-control prepaid toUpperCase" maxlength="50" placeholder="MARKS & NOS Line 3" name="additional_data_3">{{old('additional_data_3')}}</textarea>
                        </div>
                        <div class="col-12">
                            <textarea class="form-control prepaid toUpperCase" maxlength="50" placeholder="MARKS & NOS Line 4" name="additional_data_4">{{old('additional_data_4')}}</textarea>
                        </div>
                        <div class="col-12">
                            <textarea class="form-control prepaid toUpperCase" maxlength="50" placeholder="MARKS & NOS Line 5" name="additional_data_5">{{old('additional_data_5')}}</textarea>
                        </div>
                        <div class="col-12">
                            <textarea class="form-control prepaid toUpperCase" maxlength="50" placeholder="MARKS & NOS Line 6" name="additional_data_6">{{old('additional_data_6')}}</textarea>
                        </div>
                        <div class="col-12">
                            <textarea class="form-control prepaid toUpperCase" maxlength="50" placeholder="MARKS & NOS Line 7" name="additional_data_7">{{old('additional_data_7')}}</textarea>
                        </div>
                        <div class="col-12">
                            <textarea class="form-control prepaid toUpperCase" maxlength="50" placeholder="MARKS & NOS Line 8" name="additional_data_8">{{old('additional_data_8')}}</textarea>
                        </div>
                    </div>


                <div class="mb-3 row">
                    <h3 class="col-12 col-form-label text-center">Weight Charge</h3>
                    <div class="col-6">
                        <label class="col-12 col-form-label">Prepaid</label>
                         <div class="col-12">
                             <input type="number" readonly class="form-control prepaid" maxlength="23" id="weight_charge_prepaid" name="weight_charge_prepaid" min="0" value="{{old('weight_charge_prepaid')?old('weight_charge_prepaid'):0}}">
                        </div>
                    </div>
                    <div class="col-6">
                        <label class="col-12 col-form-label">Collect</label>
                         <div class="col-12">
                            <input type="number" readonly class="form-control collected" maxlength="23" id="weight_charge_collected" name="weight_charge_collected" min="0" value="{{old('weight_charge_collected')?old('weight_charge_collected'):0}}">
                        </div>
                    </div>
                </div>


                <div class="mb-3 row">
                    <h3 class="col-12 col-form-label text-center">Valuation Charge</h3>
                    <div class="col-6">
                        <label class="col-12 col-form-label">Prepaid</label>
                        <div class="col-12">
                            <input type="number"  class="form-control prepaid" maxlength="23" id="valuation_charge_prepaid" name="valuation_charge_prepaid" min="0" value="{{old('valuation_charge_prepaid')?old('valuation_charge_prepaid'):0}}">
                        </div>
                    </div>
                    <div class="col-6">
                        <label class="col-12 col-form-label">Collect</label>
                        <div class="col-12">
                            <input type="number"  class="form-control collected" maxlength="23" id="valuation_charge_collected" name="valuation_charge_collected" min="0" value="{{old('valuation_charge_collected')?old('valuation_charge_collected'):0}}">
                        </div>
                    </div>
                </div>


                <div class="mb-3 row">
                    <h3 class="col-12 col-form-label text-center">Tax</h3>
                    <div class="col-6">
                        <label class="col-12 col-form-label">Prepaid</label>
                        <div class="col-12">
                            <input type="number"  class="form-control prepaid" maxlength="23" id="tax_prepaid" name="tax_prepaid" min="0" value="{{old('tax_prepaid')?old('tax_prepaid'):0}}">
                        </div>
                    </div>
                    <div class="col-6">
                        <label class="col-12 col-form-label">Collect</label>
                        <div class="col-12">
                            <input type="number"  class="form-control collected" maxlength="23" id="tax_collected" name="tax_collected" min="0" value="{{old('tax_collected')?old('tax_collected'):0}}">
                        </div>
                    </div>
                </div>


                <div class="mb-3 row">
                    <h3 class="col-12 col-form-label text-center">Total Other Charges Due Agent</h3>
                    <div class="col-6">
                        <label class="col-12 col-form-label ">Prepaid</label>
                        <div class="col-12">
                            <input type="number"  class="form-control prepaid" maxlength="23" id="other_charge_due_agent_prepaid" name="other_charge_due_agent_prepaid" min="0" value="{{old('other_charge_due_agent_prepaid')?old('other_charge_due_agent_prepaid'):0}}">
                        </div>
                    </div>
                    <div class="col-6">
                        <label class="col-12 col-form-label">Collect</label>
                        <div class="col-12">
                            <input type="number"  class="form-control collected" maxlength="23" id="other_charge_due_agent_collected" name="other_charge_due_agent_collected" min="0" value="{{old('other_charge_due_agent_collected')?old('other_charge_due_agent_collected'):0}}">
                        </div>
                    </div>
                </div>


                <div class="mb-3 row">
                    <h3 class="col-12 col-form-label text-center">Total Other Charges Due Carrier</h3>
                    <div class="col-6">
                        <label class="col-12 col-form-label">Prepaid</label>
                        <div class="col-12">
                            <input type="number"  class="form-control prepaid" maxlength="23" id="other_charge_due_carrier_prepaid" name="other_charge_due_carrier_prepaid" min="0" value="{{old('other_charge_due_carrier_prepaid')?old('other_charge_due_carrier_prepaid'):0}}">
                        </div>
                    </div>
                    <div class="col-6">
                        <label class="col-12 col-form-label">Collect</label>
                        <div class="col-12">
                            <input type="number"  class="form-control collected" maxlength="23" id="other_charge_due_carrier_collected" name="other_charge_due_carrier_collected" min="0" value="{{old('other_charge_due_carrier_collected')?old('other_charge_due_carrier_collected'):0}}">
                            
                        </div>
                    </div>
                </div>

                <div class="mb-3 row">
                    <div class="col-6">
                        <label class="col-12 col-form-label">Total Prepaid</label>
                        <div class="col-12">
                            <input type="number" readonly class="form-control " maxlength="23" id="total_prepaid" name="total_prepaid" min="0" value="{{old('total_prepaid')?old('total_prepaid'):0}}">
                            
                        </div>
                    </div>
                    <div class="col-6">
                        <label class="col-12 col-form-label">Total Collect</label>
                        <div class="col-12">
                            <input type="number" readonly  class="form-control " maxlength="23" id="total_collected" name="total_collected" min="0" value="{{old('total_collected')?old('total_collected'):0}}">
                            
                        </div>
                    </div>
                </div>


                <div class="mb-3 row">
                    <div class="col-6">
                        <label class="col-12 col-form-label">Currency Conversion Rates </label>
                        <div class="col-12">
                            <textarea class="form-control toUpperCase" maxlength="23" name="currency_conversion_rate">{{old('currency_conversion_rate')}}</textarea>
                        </div>
                    </div>
                    <div class="col-6">
                        <label class="col-12 col-form-label">CC Charges in Dest Currency</label>
                        <div class="col-12">
                            <textarea class="form-control toUpperCase" maxlength="23" value="{{old('cc_charge_dest_currency')}}" name="cc_charge_dest_currency">{{old('cc_charge_dest_currency')}}</textarea>
                        </div>
                    </div>
                </div>



                <div class="mb-3 row">
                        <label class="col-12 col-form-label">Other Charges</label>
                        <div class="col-12">
                            <textarea class="form-control toUpperCase" maxlength="500" name="other_charges">{{old('other_charges')}}</textarea>
                        </div>
                </div>





                
                <div class="mb-3 row">
                    <label class="col-12 col-form-label">Shipper Signature</label>
                    <div class="col-12">
                        <input type="text" id="shipper_signature" value="{{old('shipper_signature')}}" name="shipper_signature" class="form-control toUpperCase">
                    </div>
                </div>

                <div class="mb-3 row">
                        <label class="col-12 col-form-label">Executed on (Date)</label>
                        <div class="col-12">
                            <input type="date" id="executed" value="{{old('executed_on_date')}}" name="executed_on_date" class="form-control">
                        </div>
                </div>



                <div class="mb-3 row">
                        <label class="col-12 col-form-label">at (Place)</label>
                        <div class="col-12">
                            <textarea class="form-control toUpperCase" maxlength="150" name="executed_at_place">{{old('executed_at_place')}}</textarea>
                        </div>
                </div>
                




               
                <div class="mb-3 row">
                    <div class="col-10">
                        <button type="submit" class="btn btn-primary">Create Invoice</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>





























<div class="modal fade" id="AddModalClient" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Record</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <form action="{{route('client.store.ajax')}}" id="AddClientModalForm" onsubmit="return false" method="POST" enctype="multipart/form-data"> 
                <div class="modal-body">
                    @csrf
                        <div class="mb-3 row">
                            <div class="col-sm-12">
                                <input type="text" maxlength="42" name="line_1" class="form-control" placeholder="Line 1">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-sm-12">
                                <input type="text" maxlength="42" name="line_2" class="form-control" placeholder="Line 2">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-sm-12">
                                <input type="text" maxlength="42" name="line_3" class="form-control" placeholder="Line 3">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-sm-12">
                                <input type="text" maxlength="42" name="line_4" class="form-control" placeholder="Line 4">
                            </div>
                        </div>
                       
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>







<div class="modal fade" id="AddModalAirline" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Record</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <form action="{{route('airlines.store')}}" id="AddModalAirlineForm"  method="POST" enctype="multipart/form-data"> 
                <div class="modal-body">
                    @csrf
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-9">
                                <input type="text"  name="name" maxlength="50" class="form-control" placeholder="Airline Name">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Unique Id</label>
                            <div class="col-sm-9">
                                <input type="text" maxlength="3" class="form-control" placeholder="Airline Id " name="identification_no">
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <div class="form-file">
                                <input type="file" name="logo" class="form-file-input form-control">
                            </div>
                            <span class="input-group-text">Upload Logo</span>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>









<div class="modal fade" id="AddModalAirport"  tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Record</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <form action="{{route('airports.store')}}" id="AddModalAirportForm" method="POST">
                <div class="modal-body">
                    @csrf
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-9">
                                <input type="text"  name="name" maxlength="50" class="form-control" placeholder="Airport Name">
                            </div>
                        </div>
                       
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>





<div class="modal fade" id="AddModalCompany" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Record</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <form action="{{route('companies.store')}}" id="AddModalCompanyForm" method="POST" enctype="multipart/form-data"> 
                <div class="modal-body">
                    @csrf
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-9">
                                <input type="text"  maxlength="50" name="name" class="form-control" value="{{old('name')}}" placeholder="Company Name">
                            </div>
                        </div>
                        
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Email </label>
                            <div class="col-sm-9">
                                <input type="email"  maxlength="50" class="form-control" placeholder="Email Address" value="{{old('email')}}" name="email">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Phone No </label>
                            <div class="col-sm-9">
                                <input type="text"  maxlength="50" class="form-control" placeholder="Phone No" value="{{old('phone_no')}}" name="phone_no">
                            </div>
                        </div>


                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Location</label>
                            <div class="col-sm-9">
                                <input type="text"  maxlength="50" class="form-control" placeholder="Address of Company" value="{{old('location')}}" name="location">
                            </div>
                        </div>
                        
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">IATA Code</label>
                            <div class="col-sm-9">
                                <input type="text"  maxlength="30" class="form-control" placeholder="IATA Code" value="{{old('identification_no')}}" name="identification_no">
                            </div>
                        </div>

        
                        <div class="input-group mb-3">
                            <div class="form-file">
                                <input type="file"  name="logo" class="form-file-input form-control">
                            </div>
                            <span class="input-group-text">Upload Stamp File</span>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>






@endsection

@section('scripts')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script type="text/javascript">
    function ValidateLines(e, max,chrln){
        var max = max;
        var characterPerLine = chrln;
        if (e.which < 0x20) {
            // e.which < 0x20, then it's not a printable character
            // e.which === 0 - Not a character
            return; // Do nothing
        }
        //calculate length excluding newline character
        var length =  e.value.length - ((e.value.match(/\n/g)||[]).length);
        if (length == max) {
            return false;
        } else if (length > max) {
            // Maximum exceeded
            e.value = e.value.substring(0, max);
        }
        if (length % characterPerLine == 0 && length!=0 && length < max)                           {
            $(e).val($(e).val()+'\n');
        }
    }
    $(function(){

        $(".select-2").select2();
        $("body").delegate('.addDash','keypress',function(){
            if($(this).val().length==4){
                $(this).val($(this).val()+"-");
            }
        });

        $('#charge_weight').on('change',function(){
            var total=parseFloat($(this).val())*parseFloat($("#rate_per_charge").val());
          $("#total_of_weight_based_on_charge").val(total);
          if($('input[type=radio][name=accounting_payment_info]:checked').val()=="ChargesCollected"){
            $("#weight_charge_collected").val(total);
            var Final=total+parseFloat($("#valuation_charge_collected").val())+parseFloat($("#tax_collected").val())+parseFloat($("#other_charge_due_agent_collected").val())+parseFloat($("#other_charge_due_carrier_collected").val());

            $("#total_collected").val(Final);
          }else{
            $("#weight_charge_prepaid").val(total);
            var Final=total+parseFloat($("#valuation_charge_prepaid").val())+parseFloat($("#tax_prepaid").val())+parseFloat($("#other_charge_due_agent_prepaid").val())+parseFloat($("#other_charge_due_carrier_prepaid").val());

            $("#total_prepaid").val(Final);
          }

        }); 

        $('#rate_per_charge').on('change',function(){
            var total=parseFloat($(this).val())*parseFloat($("#charge_weight").val());
            $("#total_of_weight_based_on_charge").val(total);
          if($('input[type=radio][name=accounting_payment_info]:checked').val()=="ChargesCollected"){
            $("#weight_charge_collected").val(total);
            var Final=total+parseFloat($("#valuation_charge_collected").val())+parseFloat($("#tax_collected").val())+parseFloat($("#other_charge_due_agent_collected").val())+parseFloat($("#other_charge_due_carrier_collected").val());

            $("#total_collected").val(Final);
          }else{
            $("#weight_charge_prepaid").val(total);
            var Final=total+parseFloat($("#valuation_charge_prepaid").val())+parseFloat($("#tax_prepaid").val())+parseFloat($("#other_charge_due_agent_prepaid").val())+parseFloat($("#other_charge_due_carrier_prepaid").val());

            $("#total_prepaid").val(Final);
          }
        });

        $('input[type=radio][name=accounting_payment_info]').change(function() {
            var total=parseFloat($("#charge_weight").val())*parseFloat($('#rate_per_charge').val());
            if($(this).val()=="ChargesCollected"){
                $(".collected").removeAttr('disabled');
                $(".prepaid").attr('disabled','disabled');
                $("#weight_charge_collected").val(total);
                $("#weight_charge_prepaid").val("");

                $("#valuation_charge_collected").val($("#valuation_charge_prepaid").val());
                $("#valuation_charge_prepaid").val(0);

                $("#tax_collected").val($("#tax_prepaid").val());
                $("#tax_prepaid").val("");

                $("#other_charge_due_agent_collected").val($("#other_charge_due_agent_prepaid").val());
                $("#other_charge_due_agent_prepaid").val("");

                $("#other_charge_due_carrier_collected").val($("#other_charge_due_carrier_prepaid").val());
                $("#other_charge_due_carrier_prepaid").val("");

                $("#total_collected").val($("#total_prepaid").val());
                $("#total_prepaid").val("");
            }else{
                $(".collected").attr('disabled','disabled');
                $(".prepaid").removeAttr('disabled');
                $("#weight_charge_collected").val("");
                $("#weight_charge_prepaid").val(total);


                $("#valuation_charge_prepaid").val($("#valuation_charge_collected").val());
                $("#valuation_charge_collected").val(0);

                $("#tax_prepaid").val($("#tax_collected").val());
                $("#tax_collected").val("");

                $("#other_charge_due_agent_prepaid").val($("#other_charge_due_agent_collected").val());
                $("#other_charge_due_agent_collected").val("");

                $("#other_charge_due_carrier_prepaid").val($("#other_charge_due_carrier_collected").val());
                $("#other_charge_due_carrier_collected").val("");

                $("#total_prepaid").val($("#total_collected").val());
                $("#total_collected").val("");


            }
        }); 



        $("body").delegate('.collected','change',function(){
            var total = 0;
            $('.collected').each(function(i, obj) {
                console.log(obj.value)//value is printed
                total += Number(obj.value);
            });

                $("#total_collected").val(total);
        });


        $("body").delegate('.prepaid','change',function(){
            var total = 0;
            $('.prepaid').each(function(i, obj) {
                console.log(obj.value)//value is printed
                total += Number(obj.value);
            });

                $("#total_prepaid").val(total);
        });


        $("#FormSubmit").on('submit',function(){
            $(this).find('textarea').removeAttr('disabled');
            $(this).find('input').removeAttr('disabled');
        });

        $("body").delegate('.toUpperCase','keyup',function(){
            if($('input[type=radio][name=auto_capitalize]:checked').val()=="FullCapitalize"){
                $('.toUpperCase').each(function(i, obj) {
                    $(obj).val($(obj).val().toUpperCase( ));
                })
            }else if($('input[type=radio][name=auto_capitalize]:checked').val()=="FirstWordCapitalize"){
                $('.toUpperCase').each(function(i, obj) {
                    var str =$(obj).val();
                    str=str.toLowerCase().replace(/\b[a-z]/g, function(letter) {
                        return letter.toUpperCase();
                    });
                    $(obj).val(str);
                })
            }
        });

        $('input[type=radio][name=auto_capitalize]').change(function() {
            if($(this).val()=="FullCapitalize"){
                $('.toUpperCase').each(function(i, obj) {
                    $(obj).val($(obj).val().toUpperCase( ));
                })
            }else if($(this).val()=="FirstWordCapitalize"){
                $('.toUpperCase').each(function(i, obj) {
                    var str =$(obj).val();
                    str=str.toLowerCase().replace(/\b[a-z]/g, function(letter) {
                        return letter.toUpperCase();
                    });
                    $(obj).val(str);
                })
            }
        });



        $("#AddClientModalForm").on("submit",function(e){
                e.preventDefault();
                e.preventDefault();
                let formData = new FormData(this);
                $.ajax({
                    type:'POST',
                    url: "{{route('client.store.ajax')}}",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: (response) => {
                        if (response) {
                        this.reset();
                            $("#shipper_id").html(response);
                            $("#consignee_id").html(response);
                            $("#shipper_id").select2().trigger("change");
                            $("#consignee_id").select2().trigger("change");
                        toastr.success("Airline Uploaded", {
                            timeOut: 500000000,
                            closeButton: !0,
                            debug: !1,
                            newestOnTop: !0,
                            progressBar: !0,
                            positionClass: "toast-top-right",
                            preventDuplicates: !0,
                            onclick: null,
                            showDuration: "300",
                            hideDuration: "1000",
                            extendedTimeOut: "1000",
                            showEasing: "swing",
                            hideEasing: "linear",
                            showMethod: "fadeIn",
                            hideMethod: "fadeOut",
                            tapToDismiss: !1
                        });
                        }
                    },
                    error: function(response){
                        toastr.error("An error has been occured", {
                            timeOut: 500000000,
                            closeButton: !0,
                            debug: !1,
                            newestOnTop: !0,
                            progressBar: !0,
                            positionClass: "toast-top-right",
                            preventDuplicates: !0,
                            onclick: null,
                            showDuration: "300",
                            hideDuration: "1000",
                            extendedTimeOut: "1000",
                            showEasing: "swing",
                            hideEasing: "linear",
                            showMethod: "fadeIn",
                            hideMethod: "fadeOut",
                            tapToDismiss: !1
                        });
                        console.log(response);
                        
                    }
                });
        });


        $("#AddModalAirlineForm").on("submit",function(e){
                e.preventDefault();
                e.preventDefault();
                let formData = new FormData(this);
                $.ajax({
                    type:'POST',
                    url: "{{route('airlines.store.ajax')}}",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: (response) => {
                        if (response) {
                        this.reset();
                            $("#airline_id").html(response);
                            $("#airline_id").select2().trigger("change");
                        toastr.success("Airline Uploaded", {
                            timeOut: 500000000,
                            closeButton: !0,
                            debug: !1,
                            newestOnTop: !0,
                            progressBar: !0,
                            positionClass: "toast-top-right",
                            preventDuplicates: !0,
                            onclick: null,
                            showDuration: "300",
                            hideDuration: "1000",
                            extendedTimeOut: "1000",
                            showEasing: "swing",
                            hideEasing: "linear",
                            showMethod: "fadeIn",
                            hideMethod: "fadeOut",
                            tapToDismiss: !1
                        });
                        }
                    },
                    error: function(response){
                        toastr.error("An error has been occured", {
                            timeOut: 500000000,
                            closeButton: !0,
                            debug: !1,
                            newestOnTop: !0,
                            progressBar: !0,
                            positionClass: "toast-top-right",
                            preventDuplicates: !0,
                            onclick: null,
                            showDuration: "300",
                            hideDuration: "1000",
                            extendedTimeOut: "1000",
                            showEasing: "swing",
                            hideEasing: "linear",
                            showMethod: "fadeIn",
                            hideMethod: "fadeOut",
                            tapToDismiss: !1
                        });
                        console.log(response);
                        
                    }
                });
        });


        $("#AddModalAirportForm").on("submit",function(e){
                e.preventDefault();
                e.preventDefault();
                let formData = new FormData(this);
                $.ajax({
                    type:'POST',
                    url: "{{route('airports.store.ajax')}}",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: (response) => {
                        if (response) {
                        this.reset();
                            $("#departure_airport_id").html(response);
                            $("#destination_airport_id").html(response);
                            $("#departure_airport_id").select2().trigger("change");
                            $("#destination_airport_id").select2().trigger("change");
                        toastr.success("Airline Uploaded", {
                            timeOut: 500000000,
                            closeButton: !0,
                            debug: !1,
                            newestOnTop: !0,
                            progressBar: !0,
                            positionClass: "toast-top-right",
                            preventDuplicates: !0,
                            onclick: null,
                            showDuration: "300",
                            hideDuration: "1000",
                            extendedTimeOut: "1000",
                            showEasing: "swing",
                            hideEasing: "linear",
                            showMethod: "fadeIn",
                            hideMethod: "fadeOut",
                            tapToDismiss: !1
                        });
                        }
                    },
                    error: function(response){
                        toastr.error("An error has been occured", {
                            timeOut: 500000000,
                            closeButton: !0,
                            debug: !1,
                            newestOnTop: !0,
                            progressBar: !0,
                            positionClass: "toast-top-right",
                            preventDuplicates: !0,
                            onclick: null,
                            showDuration: "300",
                            hideDuration: "1000",
                            extendedTimeOut: "1000",
                            showEasing: "swing",
                            hideEasing: "linear",
                            showMethod: "fadeIn",
                            hideMethod: "fadeOut",
                            tapToDismiss: !1
                        });
                        console.log(response);
                        
                    }
                });
        });



        $("#AddModalCompanyForm").on("submit",function(e){
                e.preventDefault();
                e.preventDefault();
                let formData = new FormData(this);
                $.ajax({
                    type:'POST',
                    url: "{{route('companies.store.ajax')}}",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: (response) => {
                        if (response) {
                        this.reset();
                            $("#issung_company_id").html(response);
                            $("#issung_company_id").select2().trigger("change");
                        toastr.success("Company Uploaded", {
                            timeOut: 500000000,
                            closeButton: !0,
                            debug: !1,
                            newestOnTop: !0,
                            progressBar: !0,
                            positionClass: "toast-top-right",
                            preventDuplicates: !0,
                            onclick: null,
                            showDuration: "300",
                            hideDuration: "1000",
                            extendedTimeOut: "1000",
                            showEasing: "swing",
                            hideEasing: "linear",
                            showMethod: "fadeIn",
                            hideMethod: "fadeOut",
                            tapToDismiss: !1
                        });
                        }
                    },
                    error: function(response){
                        toastr.error("An error has been occured", {
                            timeOut: 500000000,
                            closeButton: !0,
                            debug: !1,
                            newestOnTop: !0,
                            progressBar: !0,
                            positionClass: "toast-top-right",
                            preventDuplicates: !0,
                            onclick: null,
                            showDuration: "300",
                            hideDuration: "1000",
                            extendedTimeOut: "1000",
                            showEasing: "swing",
                            hideEasing: "linear",
                            showMethod: "fadeIn",
                            hideMethod: "fadeOut",
                            tapToDismiss: !1
                        });
                        console.log(response);
                        
                    }
                });
        });


    });
</script>
@endsection
