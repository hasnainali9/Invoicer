<?php
use App\Models\Permission;
if (!function_exists('CheckRolePermission')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function CheckRolePermission($permission)
    {
        if(Permission::where([['role_id',Auth::User()->role_id],['type',$permission]])->first()){
            return Permission::where([['role_id',Auth::User()->role_id],['type',$permission]])->first()->value;
        }else{
            return false;
        }
    }
}
