<?php

use Illuminate\Database\Seeder;
use App\Subject;


class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Subject::class, 5)->create();
        Subject::updateOrCreate([
            'id' => 1,
        ],[
            'name' => 'teste',
        ]);
    }
}
