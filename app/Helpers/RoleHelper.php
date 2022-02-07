<?php
use App\Models\Role;

if (!function_exists('getRoleNameFromId')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function getRoleNameFromId($id)
    {
        if(Role::where('id',$id)->first()){
            return Role::where('id',$id)->first()->name;
        }else{
            return "";
        }
    }
}






