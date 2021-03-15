<?php

use Illuminate\Database\Seeder;
use App\Exemplary;


class ExemplarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Exemplary::class, 5)->create();
       
        Category::updateOrCreate([
            'id' => 1,
        ],[
            'name' => 'Livro',
        ]);
        Subject::updateOrCreate([
            'id' => 1,
        ],[
            'name' => 'Fantasia',
        ]);
        Work::updateOrCreate([
            'id' => 1,
   
        ],[            'title' => 'Perecy Jackson e o Ladrão de Raios',
                        'category_id'=>1,
                        'subject_id'=>1,
                        'authors' =>'Rick Riordan',
                        'edition' => "1ª edição",
                        'resume' => "Primeiro volume da saga Percy Jackson e os olimpianos, 'O Ladrão de Raios' esteve entre os primeiros lugares na lista das séries mais vendidas do The New York Times. O autor conjuga lendas da mitologia grega com aventuras no século XXI. Nelas, os deuses do Olimpo continuam vivos, ainda se apaixonam por mortais e geram filhos metade deuses, metade humanos, como os heróis da Grécia antiga. Marcados pelo destino, eles dificilmente passam da adolescência. Poucos conseguem descobrir sua identidade. O garoto-problema Percy Jackson é um deles. Tem experiências estranhas em que deuses e monstros mitológicos parecem saltar das páginas dos livros direto para a sua vida. Pior que isso: algumas dessas criaturas estão bastante irritadas. Um artefato precioso foi roubado do Monte Olimpo e Percy é o principal suspeito. Para restaurar a paz, ele e seus amigos - jovens heróis modernos - terão de fazer mais do que capturar o verdadeiro ladrão: precisam elucidar uma traição mais ameaçadora que a fúria dos deuses.",
                        'img' => "https://i.pinimg.com/originals/f4/20/45/f42045015c6de057bfaf51f16ae3ff4e.jpg" ,
                        'pages' => 100,
        ]);
        Exemplary::updateOrCreate([
            'id' => 1,
        ],[
            'code' => '19217827182',
            'work_id'=> 1,
        ]);
    }
    
}
