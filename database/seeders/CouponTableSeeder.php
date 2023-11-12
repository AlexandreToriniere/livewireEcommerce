<?php

namespace Database\Seeders;

use App\Models\Coupon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CouponTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Coupon::create([
            'code' => 'NEW2020',
            'value'=> 15
        ]);

        Coupon::create([
            'code' => 'SUMMER2020',
            'value'=> 20
        ]);

        Coupon::create([
            'code' => 'WINTER2020',
            'value'=> 5
        ]);
    }
}
