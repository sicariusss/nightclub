@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center pt-5">
        <div class="col-md-10">
            <div>
                <div class="row justify-content-center text-center">
                    <h2>
                        Ночной клуб
                    </h2>
                    <div class="col-auto pt-5">
                        <a href="{{route('club')}}" class="btn btn-outline-primary pt-3">
                            <h5>Танцевать</h5>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
