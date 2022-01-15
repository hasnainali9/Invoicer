@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header d-sm-flex d-block">
            <div class="me-auto mb-sm-0 mb-3">
                <h4 class="card-title mb-2">Create New Invoice</h4>
            </div>
        </div>
        <div class="card-body">
            <form>

                <div class="mb-3 row">
                    <label class="col-3 col-form-label">City Code</label>
                    <div class="col-9">
                       <input type="text" class="form-control" name="city_code">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-3 col-form-label">Airline Provided Unique Id</label>
                    <div class="col-9">
                       <input type="text" class="form-control" name="airline_provided_unique_id">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label class="col-3 col-form-label">Shipper's Name</label>
                    <div class="col-9">
                       <textarea class="form-control"></textarea>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-3 col-form-label">Shipper's Name</label>
                    <div class="col-9">
                       <textarea class="form-control"></textarea>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-3 col-form-label">Shipper's Address</label>
                    <div class="col-9">
                        <textarea class="form-control"></textarea>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-3 col-form-label">Shipper's City & Country</label>
                    <div class="col-9">
                        <textarea class="form-control"></textarea>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-3 col-form-label">Shipper's Phone No</label>
                    <div class="col-9">
                        <textarea class="form-control"></textarea>
                    </div>
                </div>





                <div class="mb-3 row">
                    <label class="col-3 col-form-label">Consignee's Name </label>
                    <div class="col-9">
                        <textarea class="form-control"></textarea>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-3 col-form-label">Consignee's Address</label>
                    <div class="col-9">
                        <textarea class="form-control"></textarea>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-3 col-form-label">Consignee's City & Country</label>
                    <div class="col-9">
                        <textarea class="form-control"></textarea>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-3 col-form-label">Consignee's Phone No</label>
                    <div class="col-9">
                        <textarea class="form-control"></textarea>
                    </div>
                </div>





                <div class="mb-3 row">
                    <label class="col-3 col-form-label">Select Airline </label>
                    <div class="col-7">
                        <select class="form-control">
                            @foreach($Airlines as $Airline)
                            <option value="{{$Airline->id}}">{{$Airline->name}}</option>
                            @endforeach
                        </select>
                        
                    </div>
                    <div class="col-2">
                        <button class="btn btn-primary">
                            Add New Airline
                        </button>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-3 col-form-label">Issuing Carrier's Agent Name and City</label>
                    <div class="col-6">
                        <select class="form-control">
                            @foreach($Companies as $Company)
                                 <option value="{{$Company->id}}">{{$Company->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-3">
                        <button class="btn btn-primary">
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
                                        <input class="form-check-input" type="radio" name="accounting_payment_info" value="FreightPrepaid" checked="">
                                        <label class="form-check-label">
                                            Freight Prepaid
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="accounting_payment_info" value="Invoiced">
                                        <label class="form-check-label">
                                            Invoiced
                                        </label>
                                    </div>
                                    <div class="form-check disabled">
                                        <input class="form-check-input" type="radio" name="accounting_payment_info" value="ChargesCollected">
                                        <label class="form-check-label">
                                            Charges Collected
                                        </label>
                                    </div>
                                </div>
                                <div class="col-8">
                                    <textarea class="form-control"></textarea>
                                </div>
                        </div>
                    </div>
                </div>


                <div class="mb-3 row">
                    <label class="col-3 col-form-label">Account No</label>
                    <div class="col-9">
                        <textarea class="form-control"></textarea>
                    </div>
                </div>


                
                <div class="mb-3 row">
                    <label class="col-3 col-form-label">Airport of Departure(Addr.of First Carrier) and Requested Routing</label>
                    <div class="col-6">
                        <select class="form-control">
                             @foreach($Airports as $Airport)
                                 <option value="{{$Airport->id}}">{{$Airport->name}}</option>
                            @endforeach
                        </select>
                        
                    </div>
                    <div class="col-3">
                        <button class="btn btn-primary">
                            Add New Airport
                        </button>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-3 col-form-label">Reference No</label>
                    <div class="col-9">
                        <textarea class="form-control"></textarea>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-3 col-form-label">Optional Shipping information</label>
                    <div class="col-9">
                        <textarea class="form-control"></textarea>
                    </div>
                </div>
                <div class="mb-3 row">
                    <h3 class="col-12 col-form-label text-center">Routing & Destination</h3>
                    <div class="col-12 col-md-2">
                        <textarea class="form-control" placeholder="To"></textarea>
                    </div>
                    <div class="col-12 col-md-2">
                        <textarea class="form-control" placeholder="By First Carrier"></textarea>
                    </div>
                    <div class="col-12 col-md-2">
                        <textarea class="form-control" placeholder="To"></textarea>
                    </div>
                    <div class="col-12 col-md-2">
                        <textarea class="form-control" placeholder="By"></textarea>
                    </div>
                    <div class="col-12 col-md-2">
                        <textarea class="form-control" placeholder="To"></textarea>
                    </div>
                    <div class="col-12 col-md-2">
                        <textarea class="form-control" placeholder="By"></textarea>
                    </div>
                </div>


                 <div class="mb-3 row">
                   
                    
                    
                    
                    
                    
                    <div class="col-12 col-md-2">
                         <h3 class="col-12 col-form-label text-center">Currency</h3>
                        <textarea class="form-control" placeholder="USD"></textarea>
                    </div>
                    <div class="col-12 col-md-1">
                        <h3 class="col-12 col-form-label text-center">CHG's code</h3>
                        <textarea class="form-control" placeholder="PP"></textarea>
                    </div>
                    <div class="col-12 col-md-2"  style="border: 1px solid gray;">
                        <h3 class="col-12 col-form-label text-center">WT/VAL</h3>
                        <div class="row">
                            <label class="col-6 col-form-label">PPD</label>
                             <label class="col-6 col-form-label">COLL</label>
                            <div class="col-6">
                                <textarea class="form-control" placeholder="p"></textarea>
                            </div>    
                           
                             <div class="col-6">
                                <textarea class="form-control" placeholder="p"></textarea>
                            </div>    
                        </div>
                        
                    </div>
                    <div class="col-12 col-md-2" style="border: 1px solid gray;">
                        <h3 class="col-2 col-form-label text-center">Other</h3>
                        <div class="row">
                            <label class="col-6 col-form-label">PPD</label>
                             <label class="col-6 col-form-label">COLL</label>
                            <div class="col-6">
                                <textarea class="form-control" placeholder="p"></textarea>
                            </div>    
                           
                             <div class="col-6">
                                <textarea class="form-control" placeholder="p"></textarea>
                            </div>    
                        </div>
                    </div>
                    <div class="col-12 col-md-2">
                        <h3 class="col-12 col-form-label text-center">Declared Value for Carraige</h3>
                        <textarea class="form-control" placeholder="NVD"></textarea>
                    </div>
                    <div class="col-12 col-md-3">
                        <h3 class="col-12 col-form-label text-center">Declared Value for Customs</h3>
                        <textarea class="form-control" placeholder=""></textarea>
                    </div>
                </div>


                <div class="mb-3 row">
                    <label class="col-3 col-form-label">Airport of Destination</label>
                    <div class="col-6">
                        <select class="form-control">
                            @foreach($Airports as $Airport)
                                 <option value="{{$Airport->id}}">{{$Airport->name}}</option>
                            @endforeach
                        </select>
                        
                    </div>
                    <div class="col-3">
                        <button class="btn btn-primary">
                            Add New Airport
                        </button>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-12 text-center col-form-label">Requested Flight / Date</label>
                     <div class="col-6">
                        <textarea class="form-control" placeholder=""></textarea>
                    </div>
                     <div class="col-6">
                        <textarea class="form-control" placeholder=""></textarea>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-3 col-form-label">Amount of Insurance</label>
                    <div class="col-9">
                        <textarea class="form-control"></textarea>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label class="col-3 col-form-label">Handling Information</label>
                    <div class="col-9">
                        <textarea class="form-control"></textarea>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-3 col-form-label">SCI</label>
                    <div class="col-9">
                        <textarea class="form-control"></textarea>
                    </div>
                </div>



                <div class="mb-3 row">
                    
                    
                  
                    
                    
                    
                    
                    
                    <div class="col-12 col-md-1">
                        <label class="col-12 col-form-label">No of pieces RCP</label>
                        <textarea class="form-control"></textarea>
                    </div>
                    <div class="col-12 col-md-1">
                        <label class="col-12 col-form-label">Gross Weight</label>
                        <textarea class="form-control"></textarea>
                    </div>
                    <div class="col-12 col-md-1">
                          <label class="col-12 col-form-label">kg lb</label>
                        <textarea class="form-control"></textarea>
                    </div>
                    <div class="col-12 col-md-3" style="border: 1px solid red;">
                        <label class="col-12 col-form-label">Rate Class</label>
                        <div class="row">
                            
                            
                            <div class="col-12 col-md-4">
                                <label class="col-12 col-form-label">Q</label>
                                <textarea class="form-control"></textarea>
                            </div>
                            <div class="col-12 col-md-8">
                                <label class="col-12 col-form-label">Commodity Item No</label>
                                <textarea class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-1">
                        <label class="col-12 col-form-label">Chargeable Weight</label>
                        <input type="number" value="0" class="form-control" id="charge_weight"/>
                    </div>
                    <div class="col-12 col-md-1">
                        <label class="col-12 col-form-label">Rate/Charge</label>
                        <input type="number" value="0" class="form-control" id="rate_per_charge"/>
                    </div>
                    <div class="col-12 col-md-1">
                        <label class="col-12 col-form-label">Total</label>
                        <input type="number" value="0" class="form-control" id="total_of_weight_based_on_charge" readonly />
                    </div>
                    <div class="col-12 col-md-3">
                        <label class="col-12 col-form-label">Nature and Quantity of Goods(Incl. Dimension or Volume)</label>
                        <textarea class="form-control"></textarea>
                    </div>
                </div>


                <div class="mb-3 row">
                    <h3 class="col-12 col-form-label text-center">Weight Charge</h3>
                    <div class="col-6">
                        <label class="col-12 col-form-label">Prepaid</label>
                         <div class="col-12">
                            <textarea class="form-control prepaid" id="weight_charge_prepaid"></textarea>
                        </div>
                    </div>
                    <div class="col-6">
                        <label class="col-12 col-form-label">Collect</label>
                         <div class="col-12">
                            <textarea class="form-control collected" id="weight_charge_collected" disabled></textarea>
                        </div>
                    </div>
                </div>


                <div class="mb-3 row">
                    <h3 class="col-12 col-form-label text-center">Valuation Charge</h3>
                    <div class="col-6">
                        <label class="col-12 col-form-label">Prepaid</label>
                        <div class="col-12">
                            <textarea class="form-control prepaid"></textarea>
                        </div>
                    </div>
                    <div class="col-6">
                        <label class="col-12 col-form-label">Collect</label>
                        <div class="col-12">
                            <textarea class="form-control collected" disabled></textarea>
                        </div>
                    </div>
                </div>


                <div class="mb-3 row">
                    <h3 class="col-12 col-form-label text-center">Tax</h3>
                    <div class="col-6">
                        <label class="col-12 col-form-label">Prepaid</label>
                        <div class="col-12">
                            <textarea class="form-control prepaid"></textarea>
                        </div>
                    </div>
                    <div class="col-6">
                        <label class="col-12 col-form-label">Collect</label>
                        <div class="col-12">
                            <textarea class="form-control collected" disabled></textarea>
                        </div>
                    </div>
                </div>


                <div class="mb-3 row">
                    <h3 class="col-12 col-form-label text-center">Total Other Charges Due Agent</h3>
                    <div class="col-6">
                        <label class="col-12 col-form-label ">Prepaid</label>
                        <div class="col-12">
                            <textarea class="form-control prepaid"></textarea>
                        </div>
                    </div>
                    <div class="col-6">
                        <label class="col-12 col-form-label">Collect</label>
                        <div class="col-12">
                            <textarea class="form-control collected" disabled></textarea>
                        </div>
                    </div>
                </div>


                <div class="mb-3 row">
                    <h3 class="col-12 col-form-label text-center">Total Other Charges Due Carrier</h3>
                    <div class="col-6">
                        <label class="col-12 col-form-label">Prepaid</label>
                        <div class="col-12">
                            <textarea class="form-control prepaid"></textarea>
                        </div>
                    </div>
                    <div class="col-6">
                        <label class="col-12 col-form-label">Collect</label>
                        <div class="col-12">
                            <textarea class="form-control collected" disabled></textarea>
                        </div>
                    </div>
                </div>

                <div class="mb-3 row">
                    <div class="col-6">
                        <label class="col-12 col-form-label">Total Prepaid</label>
                        <div class="col-12">
                            <textarea class="form-control prepaid"></textarea>
                        </div>
                    </div>
                    <div class="col-6">
                        <label class="col-12 col-form-label">Total Collect</label>
                        <div class="col-12">
                            <textarea class="form-control collected" disabled></textarea>
                        </div>
                    </div>
                </div>


                <div class="mb-3 row">
                    <div class="col-6">
                        <label class="col-12 col-form-label">Currency Conversion Rates </label>
                        <div class="col-12">
                            <textarea class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="col-6">
                        <label class="col-12 col-form-label">CC Charges in Dest Currency</label>
                        <div class="col-12">
                            <textarea class="form-control"></textarea>
                        </div>
                    </div>
                </div>



                <div class="mb-3 row">
                        <label class="col-12 col-form-label">Other Charges</label>
                        <div class="col-12">
                            <textarea class="form-control"></textarea>
                        </div>
                </div>






                <div class="mb-3 row">
                        <label class="col-12 col-form-label">Executed on (Date)</label>
                        <div class="col-12">
                            <input type="date" id="executed" name="executedOn" class="form-control">
                        </div>
                </div>


                <div class="mb-3 row">
                        <label class="col-12 col-form-label">at (Place)</label>
                        <div class="col-12">
                            <textarea class="form-control"></textarea>
                        </div>
                </div>
                




               
                <div class="mb-3 row">
                    <div class="col-10">
                        <button type="submit" class="btn btn-primary">Sign in</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
    $(function(){
        $('#charge_weight').on('change',function(){
            var total=parseFloat($(this).val())*parseFloat($("#rate_per_charge").val());
          $("#total_of_weight_based_on_charge").val(total);
          if($('input[type=radio][name=accounting_payment_info]').val()=="ChargesCollected"){
            $("#weight_charge_collected").val(total);
          }else{
            $("#weight_charge_prepaid").val(total);
          }

        }); 

        $('#rate_per_charge').on('change',function(){
            var total=parseFloat($(this).val())*parseFloat($("#charge_weight").val());
          $("#total_of_weight_based_on_charge").val(total);
          if($('input[type=radio][name=accounting_payment_info]').val()=="ChargesCollected"){
            $("#weight_charge_collected").val(total);
          }else{
            $("#weight_charge_prepaid").val(total);
          }
        });

        $('input[type=radio][name=accounting_payment_info]').change(function() {
            var total=parseFloat($("#charge_weight").val())*parseFloat($('#rate_per_charge').val());
            if($(this).val()=="ChargesCollected"){
                $(".collected").removeAttr('disabled');
                $(".prepaid").attr('disabled','disabled');
                $("#weight_charge_collected").val(total);
                $("#weight_charge_prepaid").val("");
            }else{
                $(".collected").attr('disabled','disabled');
                $(".prepaid").removeAttr('disabled');
                $("#weight_charge_collected").val("");
                $("#weight_charge_prepaid").val(total);
            }
        }); 
    });
</script>
@endsection
