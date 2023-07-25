<?php

namespace Database\Seeders;

use App\Models\Dance;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DancesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dance = new Dance();
        $dance->id = 1;
        $dance->setName('Хип-хоп');
        $dance->setMusicId(1);
        $dance->save();

        $dance = new Dance();
        $dance->id = 2;
        $dance->setName('R&b');
        $dance->setMusicId(1);
        $dance->save();

        $dance = new Dance();
        $dance->id = 3;
        $dance->setName('Electrodance');
        $dance->setMusicId(2);
        $dance->save();

        $dance = new Dance();
        $dance->id = 4;
        $dance->setName('House');
        $dance->setMusicId(2);
        $dance->save();

        $dance = new Dance();
        $dance->id = 5;
        $dance->setName('Pop');
        $dance->setMusicId(3);
        $dance->save();
    }
}
