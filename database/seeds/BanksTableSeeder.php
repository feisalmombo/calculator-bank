<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class BanksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $banks=[
            [
            'bank_name'=>'KCB',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
            ],
        ];
        foreach ($banks as $bank) {
            DB::table('banks')->insert($bank);
        }
    }
}
