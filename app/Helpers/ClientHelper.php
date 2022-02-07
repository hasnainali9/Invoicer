<?php
use App\Models\Client;
if (!function_exists('getClientInformation')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function getClientInformation($id)
    {
        if(Client::where('id',$id)->first()){
            return Client::where('id',$id)->first();
        }else{
            return  "";
        }
    }
}
