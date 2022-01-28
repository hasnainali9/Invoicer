<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class InvoicePageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('invoice_pages')->insert([
            [
                'title'=>"Original 3 (for Shipper)"
            ],
            [
                'title'=>"Copy 8 (for Agent)"
            ],
            [
                'title'=>"Original 1 (for Issuing Carrier)"
            ],
            [
                'title'=>"Original 2 (for Consignee)"
            ],
            [
                'title'=>"Copy 4 (for Delivery Receipt)"
            ],
            [
                'title'=>"Copy 5 (Extra Copy)"
            ],
            [
                'title'=>"Copy 6 (Extra Copy)"
            ],
            [
                'title'=>"Copy 7 (Extra Copy)"
            ],
            [
                'title'=>"Copy 9 (Extra Copy for Carr)"
            ],
            [
                'title'=>"Copy 10 (Extra Copy for Carr)"
            ],
            [
                'title'=>"Copy 11 (Extra Copy for Carr)"
            ],
        ]);
    }
}
