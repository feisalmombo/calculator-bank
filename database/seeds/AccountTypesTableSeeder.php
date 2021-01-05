<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class AccountTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $accountTypes=[
            [
            'accountType_name'=>'Personal',
            'bank_id'=>1,
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
            ],
        ];
        foreach ($accountTypes as $accountType) {
            DB::table('account_types')->insert($accountType);
        }
    }
}
