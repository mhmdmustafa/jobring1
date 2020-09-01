<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminsTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->delete();
        $adminsRecord=[
            [
                'id'=>1, 'name'=>'admin','email'=>'email@email.com',
                'password'=>bcrypt('123456789'),
            ],

        ];
        foreach ($adminsRecord as $key=> $record){
            \App\Models\Admin::create( $record);
        }
    }

}
