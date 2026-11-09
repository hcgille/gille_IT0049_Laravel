<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    public function run(): void
    {
        // TFA6: minimum 5 database records, instead of TFA5's static arrays.
        $customers = [
            ['full_name' => 'Andrea Villanueva', 'email' => 'andrea.villanueva@example.com', 'phone' => '0917 234 1001'],
            ['full_name' => 'Miguel Santos', 'email' => 'miguel.santos@example.com', 'phone' => '0918 234 1002'],
            ['full_name' => 'Camille Reyes', 'email' => 'camille.reyes@example.com', 'phone' => '0919 234 1003'],
            ['full_name' => 'Lorenzo Bautista', 'email' => 'lorenzo.bautista@example.com', 'phone' => '0920 234 1004'],
            ['full_name' => 'Isabella Cruz', 'email' => 'isabella.cruz@example.com', 'phone' => '0921 234 1005'],
            ['full_name' => 'Gabriel Navarro', 'email' => 'gabriel.navarro@example.com', 'phone' => '0922 234 1006'],
            ['full_name' => 'Sofia Mendoza', 'email' => 'sofia.mendoza@example.com', 'phone' => null],
        ];

        foreach ($customers as $customer) {
            Customer::query()->updateOrCreate(
                ['email' => $customer['email']],
                $customer
            );
        }
    }
}
