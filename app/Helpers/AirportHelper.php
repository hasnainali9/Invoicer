<?php
use App\Models\Airport;

if (!function_exists('GetAirportNameFromId')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function GetAirportNameFromId($id)
    {
        if(Airport::where('id',$id)->first()){
            return Airport::where('id',$id)->first()->name;
        }else{return "";}
    }
}
