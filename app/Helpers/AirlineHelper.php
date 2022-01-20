<?php
use App\Models\Airline;

if (!function_exists('GetAirlineIdentificationNo')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function GetAirlineIdentificationNo($id)
    {
        if(Airline::where('id',$id)->first()){
            return Airline::where('id',$id)->first()->identification_no;
        }else{
            return  "";
        }
    }
}


if (!function_exists('GetAirlineName')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function GetAirlineName($id)
    {
        if(Airline::where('id',$id)->first()){
            return Airline::where('id',$id)->first()->name;
        }else{
            return  "";
        }
    }
}


if (!function_exists('GetAirlineLogo')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function GetAirlineLogo($id)
    {
        if(Airline::where('id',$id)->first()){
            return Airline::where('id',$id)->first()->logo;
        }else{
            return  "";
        }
    }
}
