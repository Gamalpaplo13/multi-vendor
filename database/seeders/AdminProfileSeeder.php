<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Vendor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::where('email','admin@gmail.com')->first();
        $vendor = new Vendor();
        $vendor->banner = 'uploads/1234.jpg';
        $vendor->phone = '0112698';
        $vendor->email = 'admin@gmail.com';
        $vendor->address = 'usa';
        $vendor->description = 'shop desc';
        $vendor->instagram_link = 'https://www.instagram.com/gpablo911/?hl=en';
        $vendor->user_id = $user->id;
        $vendor->save();
    }
}
