@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xl-3 col-sm-6 m-t35">
            <div class="card card-coin">
                <div class="card-body text-center">
                    <h2 class="text-black mb-2 font-w600">{{$Invoices->count()}}</h2>
                    <p class="mb-0 fs-14">
                        Total Invoices
                    </p>	
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-sm-6 m-t35">
            <div class="card card-coin">
                <div class="card-body text-center">
                    
                    <h2 class="text-black mb-2 font-w600">{{$Companies->count()}}</h2>
                    <p class="mb-0 fs-14">
                        Total Companies
                    </p>	
                </div>
            </div>
        </div>
        


        <div class="col-xl-3 col-sm-6 m-t35">
            <div class="card card-coin">
                <div class="card-body text-center">
                    
                    <h2 class="text-black mb-2 font-w600">{{$Airlines->count()}}</h2>
                    <p class="mb-0 fs-14">
                        Total Airlines
                    </p>	
                </div>
            </div>
        </div>




        <div class="col-xl-3 col-sm-6 m-t35">
            <div class="card card-coin">
                <div class="card-body text-center">
                    
                    <h2 class="text-black mb-2 font-w600">{{$Airports->count()}}</h2>
                    <p class="mb-0 fs-14">
                        Total Airports
                    </p>	
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
