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
                    <div class="row pb-5">
                        <div class="col-auto">
                            <a href="{{route('home')}}" class="h6 text-decoration-none">
                                ← Ночной клуб
                            </a>
                        </div>
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger text-center mb-5">
                            @foreach ($errors->all() as $error)
                                ● {{$error}} <br>
                            @endforeach
                        </div>
                    @endif
                    {{Form::open(['url'=>route('dance'),'method'=>'POST'])}}
                    <div class="row justify-content-center">
                        <div class="col-6 ps-5">
                            <h5 class="fw-bold pb-3">Персонажи</h5>
                            @foreach($chars as $char)
                                    <?php
                                    $tooldesc = '<b> Навыки </b> <br> Голова: ' . $char['head'] . '<br>' .
                                        'Тело: ' . $char['body'] . '<br>' .
                                        'Руки: ' . $char['arms'] . '<br>' .
                                        'Ноги: ' . $char['legs'] . '<br>'; ?>
                                @include('forms._checkbox', [
                                    'name' => 'chars[]',
                                    'label' => '<div data-bs-toggle="tooltip" data-bs-html="true" data-bs-placement="right" title="'. $tooldesc .'"> Персонаж ' . $char['id'] . ' </div>',
                                    'checked' => true,
                                    'value' => $char['id']
                                ])
                            @endforeach
                        </div>
                        <div class="col-6 ps-5">
                            <h5 class="fw-bold pb-3">Музыка</h5>
                            @foreach($music as $item)
                                @include('forms._checkbox', [
                                    'name' => 'music[]',
                                    'label' => $item->getName(),
                                    'checked' => true,
                                    'value' => $item->getKey()
                                ])
                            @endforeach
                        </div>
                    </div>
                    <div class="row justify-content-center text-center pt-5">
                        <div class="col-auto">
                            <button class="btn btn-outline-primary">Начать танцы</button>
                        </div>
                    </div>
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
@endsection
