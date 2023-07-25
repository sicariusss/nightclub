<?php
/**
 * @var Music $music
 * @var Move $move
 */

use App\Models\Music;
use App\Models\Move;

?>

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center pt-5">
            <div class="col-md-10">
                <div>
                    <div class="row pb-3 justify-content-center">
                        <div class="col-auto">
                            <h2>
                                Ночной клуб
                            </h2>
                        </div>
                    </div>
                    <div class="row pb-5 justify-content-center">
                        <div class="col-12">
                            @foreach($club as $music => $item)
                                <b class="text-primary"> В клубе играет: </b> {{$music}} <br>
                                <b> Под него танцуют: </b> {{$item['dances']}} <br>
                                <b> Необходимые навыки: </b> {{$item['moves']}} <br>
                                @if($item['chars']['dancers'])
                                    <b> {{count($item['chars']['dance']). ' ' .
                                trans_choice('человек танцует|человека танцуют|людей танцуют', $item['chars']['dancers']) . ', а именно: '}} </b>
                                    <br>
                                    <ul>
                                        @foreach($item['chars']['dance'] as $dancer)
                                            <li> Персонаж {{$dancer}} </li>
                                        @endforeach
                                    </ul>
                                @else
                                    <b> Никто не танцует под эту музыку :( </b> <br>
                                @endif
                                @if($item['chars']['drinkers'])
                                    <b> {{trans_choice('Пьет|Пьют|Пьют', $item['chars']['drinkers'])}}
                                        водку: </b> <br>
                                    <ul>
                                        @foreach($item['chars']['drink'] as $drinker)
                                            <li> Персонаж {{$drinker}} </li>
                                        @endforeach
                                    </ul>
                                @endif

                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
