<?php

namespace App\Http\Controllers;

use App\Models\Char;
use App\Models\Music;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class ClubController extends Controller
{

    public function club()
    {
        $characters = Char::get();
        $music      = Music::get();
        $chars      = [];
        foreach ($characters as $char) {
            $moveSet                = $char->getMoveSet();
            $chars[$char->getKey()] = [
                'id' => $char->getKey(),
                'head' => $moveSet->getHead()?->getName() ?? 'Нет',
                'body' => $moveSet->getBody()?->getName() ?? 'Нет',
                'legs' => $moveSet->getLegs()?->getName() ?? 'Нет',
                'arms' => $moveSet->getArms()?->getName() ?? 'Нет'
            ];
        }
        return view('club', compact('chars', 'music'));
    }

    public function dance(Request $request)
    {
        $frd = $request->all();

        $this->validate($request, [
            'chars' => 'required',
            'music' => 'required',
        ], [
            'chars' => 'Без людей никаких танцев!',
            'music' => 'Без музыки никаких танцев!',
        ]);

        $chars = $frd['chars'];
        $music = $frd['music'];
        $club  = [];
        /** @var Char $char */
        /** @var Music $composition */
        foreach ($music as $musicId) {
            $composition            = Music::find($musicId);
            $compositionName        = $composition->getName();
            $club[$compositionName] = [
                'dances' => $composition->getDancesName(),
                'moves' => $composition->getMovesName()
            ];
            foreach ($chars as $charId) {
                $char = Char::find($charId);
                if ($char->canDance($musicId)) {
                    $club[$compositionName]['chars']['dance'][] = $char->getKey();
                } else {
                    $club[$compositionName]['chars']['drink'][] = $char->getKey();
                }
            }
            $club[$compositionName]['chars']['dancers']  = isset($club[$compositionName]['chars']['dance']) ? count($club[$compositionName]['chars']['dance']) : 0;
            $club[$compositionName]['chars']['drinkers'] = isset($club[$compositionName]['chars']['drink']) ? count($club[$compositionName]['chars']['drink']) : 0;
        }

        return view('dance', compact('club'));
    }
}
