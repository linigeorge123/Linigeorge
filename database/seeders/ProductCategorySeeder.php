<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProductCategory;
use Carbon\Carbon;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $current_date_time = Carbon::now();

        $role= ProductCategory::insert([
            [
                'name' => 'Electronic',
                'created_at'=>$current_date_time,
                'created_at'=>$current_date_time,
                'updated_at'=>$current_date_time,

                
            ],
            
           
        ]);
        $role1= ProductCategory::insert([
            [
                'name' => 'Food',
                'created_at'=>$current_date_time,
                'created_at'=>$current_date_time,
                'updated_at'=>$current_date_time,

                
            ],
            
           
        ]);
    }
}
