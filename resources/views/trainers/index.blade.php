@extends('layouts.app')

@section('title', 'All trainers')

@section('content')
    <h5>Listado de trainers</h5>
    <div class="row">
        @foreach ($trainers as $trainer)
            <div class="col-sm">
                <div class="card mt-3" style="width: 18rem;">
                    <div class="card-body">
                    <img class="card-img-top rounded-circle mx-auto d-block" style="width: 100px; height: 100px; background-color: #efefef;" src="images/{{ $trainer->avatar }}" alt="">
                    <h5 class="card-title text-center mt-3">{{ $trainer->name }}</h5>
                    <p class="card-text text-justify">{{ $trainer->description }}</p>
                    </div>
                    <a href="trainers/{{ $trainer->slug }}" class="btn btn-primary">See more...</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
