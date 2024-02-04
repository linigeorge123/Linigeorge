<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $current_date_time = Carbon::now();
        $user1= User::insert([
            [
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'password' =>  Hash::make('password'),
                'usertype'=>'super_admin',
                'email_verified_at' =>$current_date_time,
                'created_at'=>$current_date_time,
                'created_at'=>$current_date_time,
                
            ],
            
           
        ]);
    }
}
