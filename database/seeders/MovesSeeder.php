<?php

namespace Database\Seeders;

use App\Models\Move;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MovesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $move = new Move();
        $move->id = 1;
        $move->setName('Покачивание вперед-назад');
        $move->setBodyPartId(1);
        $move->save();

        $move = new Move();
        $move->id = 2;
        $move->setName('Согнуты в локтях');
        $move->setBodyPartId(2);
        $move->save();

        $move = new Move();
        $move->id = 3;
        $move->setName('В полуприседе');
        $move->setBodyPartId(3);
        $move->save();

        $move = new Move();
        $move->id = 4;
        $move->setName('Вперед-назад');
        $move->setBodyPartId(4);
        $move->save();

        $move = new Move();
        $move->id = 5;
        $move->setName('Круговые движения-вращения');
        $move->setBodyPartId(2);
        $move->save();

        $move = new Move();
        $move->id = 6;
        $move->setName('Двигаются в ритме');
        $move->setBodyPartId(3);
        $move->save();

        $move = new Move();
        $move->id = 7;
        $move->setName('Плавные движения');
        $move->setBodyPartId(1);
        $move->save();

        $move = new Move();
        $move->id = 8;
        $move->setName('Плавные движения');
        $move->setBodyPartId(3);
        $move->save();

        $move = new Move();
        $move->id = 9;
        $move->setName('Плавные движения');
        $move->setBodyPartId(2);
        $move->save();

        $move = new Move();
        $move->id = 10;
        $move->setName('Плавные движения');
        $move->setBodyPartId(4);
        $move->save();
    }
}
