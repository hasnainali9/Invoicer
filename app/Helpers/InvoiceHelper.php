<?php
use App\Models\Invoice;
if (!function_exists('GetInvoiceColumn')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function GetInvoiceColumn($id,$column)
    {
        return Invoice::where('id',$id)->first()->$column;
    }
}
