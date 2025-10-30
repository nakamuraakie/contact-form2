<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::insert([
            ['content' => '商品について'],
            ['content' => 'サービスについて'],
            ['content' => 'サポートについて'],
            ['content' => 'その他'],
        ]);
    }
}
