<?php

use Illuminate\Database\Seeder;

class ProductTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $prodtypes = array(
            ['type' => 'General'],
        );

        DB::table('producttype')->insert($prodtypes);
    }
}
