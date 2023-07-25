<?php

namespace Database\Seeders;

use App\Models\BodyPart;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BodyPartsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $body = new BodyPart();
        $body->id = 1;
        $body->setName('Тело');
        $body->save();

        $arms = new BodyPart();
        $arms->id = 2;
        $arms->setName('Руки');
        $arms->save();

        $legs = new BodyPart();
        $legs->id = 3;
        $legs->setName('Ноги');
        $legs->save();

        $head = new BodyPart();
        $head->id = 4;
        $head->setName('Голова');
        $head->save();
    }
}
