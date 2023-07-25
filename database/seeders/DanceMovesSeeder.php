<?php

namespace Database\Seeders;

use App\Models\Dance;
use App\Models\DanceMove;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DanceMovesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dance = new DanceMove();
        $dance->setDanceId(1);
        $dance->setMoveId(1);
        $dance->save();

        $dance = new DanceMove();
        $dance->setDanceId(1);
        $dance->setMoveId(2);
        $dance->save();

        $dance = new DanceMove();
        $dance->setDanceId(1);
        $dance->setMoveId(3);
        $dance->save();

        $dance = new DanceMove();
        $dance->setDanceId(1);
        $dance->setMoveId(4);
        $dance->save();

        $dance = new DanceMove();
        $dance->setDanceId(3);
        $dance->setMoveId(1);
        $dance->save();

        $dance = new DanceMove();
        $dance->setDanceId(3);
        $dance->setMoveId(5);
        $dance->save();

        $dance = new DanceMove();
        $dance->setDanceId(3);
        $dance->setMoveId(6);
        $dance->save();

        $dance = new DanceMove();
        $dance->setDanceId(5);
        $dance->setMoveId(7);
        $dance->save();

        $dance = new DanceMove();
        $dance->setDanceId(5);
        $dance->setMoveId(8);
        $dance->save();

        $dance = new DanceMove();
        $dance->setDanceId(5);
        $dance->setMoveId(9);
        $dance->save();

        $dance = new DanceMove();
        $dance->setDanceId(5);
        $dance->setMoveId(10);
        $dance->save();
    }
}
