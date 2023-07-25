<?php

namespace Database\Seeders;

use App\Models\Char;
use App\Models\CharMoveSet;
use App\Models\Move;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CharsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 5; $i++) {
            $moveSet = new CharMoveSet();
            $moveSet->setArmId(self::getMoveId(2));
            $moveSet->setBodyId(self::getMoveId(1));
            $moveSet->setLegId(self::getMoveId(3));
            $moveSet->setHeadId(self::getMoveId(4));
            $moveSet->save();

            $char = new Char();
            $char->setGender(rand(0, 1));
            $char->setMoveSetId($moveSet->getKey());
            $char->save();
        }

        $moveSet = new CharMoveSet();
        $moveSet->setArmId(2);
        $moveSet->setBodyId(1);
        $moveSet->setLegId(3);
        $moveSet->setHeadId(4);
        $moveSet->save();

        $char = new Char();
        $char->setGender(rand(0, 1));
        $char->setMoveSetId($moveSet->getKey());
        $char->save();

        $moveSet = new CharMoveSet();
        $moveSet->setArmId(5);
        $moveSet->setBodyId(1);
        $moveSet->setLegId(6);
        $moveSet->setHeadId(null);
        $moveSet->save();

        $char = new Char();
        $char->setGender(rand(0, 1));
        $char->setMoveSetId($moveSet->getKey());
        $char->save();

        $moveSet = new CharMoveSet();
        $moveSet->setArmId(9);
        $moveSet->setBodyId(7);
        $moveSet->setLegId(8);
        $moveSet->setHeadId(10);
        $moveSet->save();

        $char = new Char();
        $char->setGender(rand(0, 1));
        $char->setMoveSetId($moveSet->getKey());
        $char->save();
    }

    public function getMoveId(int $bodyPartId): ?int
    {
        $moves      = Move::whereBodyPartId($bodyPartId)->get();
        $movesArray = [];
        foreach ($moves as $key => $move) {
            $movesArray[$key + 1] = $move->getKey();
        }
        $movesAmount = count($movesArray);
        $randMove    = rand(0, $movesAmount);
        return $movesArray[$randMove] ?? null;
    }
}
