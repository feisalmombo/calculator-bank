<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CurrenciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currencies=[
            [
            'currency_name'=>'TZS',
            'accountTypes_id'=>1,
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
            ],
        ];
        foreach ($currencies as $currency) {
            DB::table('currencies')->insert($currency);
        }
    }
}
