<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'additional_data',
        'no_of_edits',
        'City_code',
        'airline_provided_unique_id',
        'shiper_name',
        'shiper_address',
        'shiper_city_country',
        'shiper_phone_no',

        'consignee_name',
        'consignee_address',
        'consignee_city_country',
        'consignee_phone_no',

        'airline_id',

        'issung_company_id',

        'accounting_payment_info',
        'accounting_additional_info',

        'account_no',
        
        'departure_airport_id',

        'reference_no',

        'optional_shipping_info',

        'routing_to_1',
        'routing_by_1',

        'routing_to_2',
        'routing_by_2',
        
        'routing_to_3',
        'routing_by_3',

        'currency',

        'chgs_code',

        'wt_val__ppd',
        'wt_val__coll',

        'other__ppd',
        'other__coll',

        'd_value_carraige',
        'd_value_custom',

        'destination_airport_id',

        'request_flight_on',
        'request_flight_date',
        
        'amount_of_insurance',

        'handling_information',

        'sci',


        'no_of_pieces',
        'gross_weight',
        'kg_lb',
        'rate_q',
        'rate_item_no',
        'charge_weight',
        'rate_per_charge',
        'total_of_weight_based_on_charge',

        'nature_quantity_of_good',
        
        'weight_charge_prepaid',
        'weight_charge_collected',

        'valuation_charge_prepaid',
        'valuation_charge_collected',

        'tax_prepaid',
        'tax_collected',

        'other_charge_due_agent_prepaid',
        'other_charge_due_agent_collected',
        
        'other_charge_due_carrier_prepaid',
        'other_charge_due_carrier_collected',
        

        'total_prepaid',
        'total_collected',

        'currency_conversion_rate',
        'cc_charge_dest_currency',


        'other_charges',
        'executed_on_date',
        'executed_at_place',

    ];
}
