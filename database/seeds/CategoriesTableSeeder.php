<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Category::create([
            "name"=>$name='World',
            "slug"=>\Illuminate\Support\Str::slug($name)
        ]);

        \App\Category::create([
            "name"=>$name='U.S',
            "slug"=>\Illuminate\Support\Str::slug($name),
        ]);
        \App\Category::create([
            "name"=>$name='Technology',
            "slug"=>\Illuminate\Support\Str::slug($name)
        ]);
    }
}
