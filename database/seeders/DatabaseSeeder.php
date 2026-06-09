<?php

namespace Database\Seeders;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        User::create([
            'name' => 'admin',
            'realname' => 'Nguyễn Quản Trị',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678'),
            'role' => 'admin',
            'email_verified_at' => now(), 
        ]);
        User::create([
            'name' => 'khachhang',
            'realname' => 'Lê Khách Hàng',
            'email' => 'customer@gmail.com',
            'password' => bcrypt('12345678'),
            'role' => 'customer',
            'email_verified_at' => now(),
        ]);

        Category::factory()->count(3)->create();
        Brand::factory()->count(5)->create();
        Product::factory()->count(50)->create();
    }
}
