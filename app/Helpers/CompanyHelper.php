<?php
use App\Models\Company;
if (!function_exists('GetCompanyNameFromId')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function GetCompanyNameFromId($id)
    {
        if(Company::where('id',$id)->first()){
            return Company::where('id',$id)->first()->name;
        }else{
            return  "";
        }
    }
}

if (!function_exists('GetCompanyNameFromId')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function GetCompanyNameFromId($id)
    {
        if(Company::where('id',$id)->first()){
            return Company::where('id',$id)->first()->name;
        }else{
            return  "";
        }
    }
}
if (!function_exists('GetCompanyIATACodeFromId')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function GetCompanyIATACodeFromId($id)
    {
        if(Company::where('id',$id)->first()){
            return Company::where('id',$id)->first()->identification_no;
        }else{
            return  "";
        }
    }
}
if (!function_exists('GetCompanyLocationFromId')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function GetCompanyLocationFromId($id)
    {
        if(Company::where('id',$id)->first()){
            return Company::where('id',$id)->first()->location;
        }else{
            return  "";
        }
    }
}


if (!function_exists('GetCompanyPhoneNoFromId')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function GetCompanyPhoneNoFromId($id)
    {
        if(Company::where('id',$id)->first()){
            return Company::where('id',$id)->first()->phone_no;
        }else{
            return  "";
        }
    }
}


if (!function_exists('GetCompanyEmailFromId')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function GetCompanyEmailFromId($id)
    {
        if(Company::where('id',$id)->first()){
            return Company::where('id',$id)->first()->email;
        }else{
            return  "";
        }
    }
}




if (!function_exists('GetCompanyLogoFromId')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function GetCompanyLogoFromId($id)
    {
        if(Company::where('id',$id)->first()){
            return Company::where('id',$id)->first()->logo;
        }else{
            return  "";
        }
    }
}
