<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;


class Dummydata extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
//add dummy data in database
DB::table('members')->insert([
'name'=>' gautam kant',
'email'=>'aryan@gmail.com',
'Address'=>'bihar'
]);

    }
}
