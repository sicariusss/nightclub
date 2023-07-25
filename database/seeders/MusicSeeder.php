<?php

namespace Database\Seeders;

use App\Models\Music;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MusicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rnb = new Music();
        $rnb->id = 1;
        $rnb->setName('R&b');
        $rnb->save();

        $electro = new Music();
        $electro->id = 2;
        $electro->setName('Electrohouse');
        $electro->save();

        $pop = new Music();
        $pop->id = 3;
        $pop->setName('Pop-music');
        $pop->save();
    }
}
