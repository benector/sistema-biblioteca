<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Category::class, 5)->create();
        Category::updateOrCreate([
            'id' => 1,
        ],[
            'name' => 'teste',
        ]);
    }
}
