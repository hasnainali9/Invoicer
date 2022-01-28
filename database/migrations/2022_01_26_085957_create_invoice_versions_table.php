<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceVersionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_versions', function (Blueprint $table) {
            $table->id();
            $table->integer('invoice_id')->unsigned();
            $table->text('City_code')->nullable();
            $table->text('airline_provided_unique_id')->nullable();
            $table->text('shiper_details')->nullable();

            $table->text('consignee_details')->nullable();

            $table->integer('airline_id')->unsigned();
            
            $table->integer('issung_company_id')->unsigned();
            
            $table->text('accounting_payment_info')->nullable();
            $table->text('accounting_additional_info')->nullable();

            $table->text('account_no')->nullable();
            
            $table->integer('departure_airport_id')->unsigned();
            
            $table->text('reference_no')->nullable();

            $table->text('optional_shipping_info')->nullable();

            $table->text('routing_to_1')->nullable();
            $table->text('routing_by_1')->nullable();

            $table->text('routing_to_2')->nullable();
            $table->text('routing_by_2')->nullable();
            
            $table->text('routing_to_3')->nullable();
            $table->text('routing_by_3')->nullable();

            $table->text('currency')->nullable();

            $table->text('chgs_code')->nullable();

            $table->text('wt_val__ppd')->nullable();
            $table->text('wt_val__coll')->nullable();

            $table->text('other__ppd')->nullable();
            $table->text('other__coll')->nullable();

            $table->text('d_value_carraige')->nullable();
            $table->text('d_value_custom')->nullable();


            $table->integer('destination_airport_id')->unsigned();
            
            $table->text('request_flight_on')->nullable();
            $table->text('request_flight_date')->nullable();
            
            $table->text('amount_of_insurance')->nullable();

            $table->text('handling_information')->nullable();

            $table->text('sci')->nullable();


            $table->text('no_of_pieces')->nullable();
            $table->text('gross_weight')->nullable();
            $table->text('kg_lb')->nullable();
            $table->text('rate_q')->nullable();
            $table->text('rate_item_no')->nullable();
            $table->text('charge_weight')->nullable();
            $table->text('rate_per_charge')->nullable();
            $table->text('total_of_weight_based_on_charge')->nullable();

            $table->text('nature_quantity_of_good')->nullable();


            $table->longtext('additional_data')->nullable();
            
            $table->text('weight_charge_prepaid')->nullable();
            $table->text('weight_charge_collected')->nullable();

            $table->text('valuation_charge_prepaid')->nullable();
            $table->text('valuation_charge_collected')->nullable();

            $table->text('tax_prepaid')->nullable();
            $table->text('tax_collected')->nullable();

            $table->text('other_charge_due_agent_prepaid')->nullable();
            $table->text('other_charge_due_agent_collected')->nullable();
            
            $table->text('other_charge_due_carrier_prepaid')->nullable();
            $table->text('other_charge_due_carrier_collected')->nullable();
            

            $table->text('total_prepaid')->nullable();
            $table->text('total_collected')->nullable();

            $table->text('currency_conversion_rate')->nullable();
            $table->text('cc_charge_dest_currency')->nullable();


            $table->text('other_charges')->nullable();
            $table->text('shipper_signature')->nullable();
            $table->text('executed_on_date')->nullable();
            $table->text('executed_at_place')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoice_versions');
    }
}
