<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'name' => 'Lasagna',
                'price' => 25000,
                'description' => "Heatable instant lasagna.",
                'image' => 'lasagna.jpg'
            ],
            [
                'name' => 'Spaghetti Bolognaise',
                'price' => 25000,
                'description' => "Heatable spaghetti bolognaise.",
                'image' => 'bolognaise.jpg'
            ],
            [
                'name' => 'Spaghetti Brulee',
                'price' => 25000,
                'description' => "Heatable spaghetti brulee.",
                'image' => 'brulee.jpg'
            ],
            [
                'name' => 'Fettucini Carbonara',
                'price' => 25000,
                'description' => "Heatable fettucini carbonara",
                'image' => 'carbonara.jpg'
            ],
        ]);
    }
}
