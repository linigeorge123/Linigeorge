<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $current_date_time = Carbon::now();
        $role= Role::insert([
            [
                'name' => 'manger',
                'created_at'=>$current_date_time,
                'created_at'=>$current_date_time,
                
            ],
            
           
        ]);
        $role1= Role::insert([
            [
                'name' => 'Developer',
                'created_at'=>$current_date_time,
                'created_at'=>$current_date_time,
                
            ],
            
           
        ]);
    }
}
