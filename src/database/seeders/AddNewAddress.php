<?php

namespace Database\Seeders;

use App\Models\Address;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AddNewAddress extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $add = new Address();
            $add->street = "Random";
            $add->number = mt_rand(1, 555555);
            $add->zip = "951" . mt_rand(10, 99);
            $add->city = "Nitra";

            $add->save();
        }
    }
}
