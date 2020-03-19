@extends('layouts.app')

@section('title', 'Trainer')

@section('content2')

    @include('common.success')

    <img class="card-img-top rounded-circle mx-auto d-block" style="width: 200px; height: 200px; background-color: #efefef;" src="../images/{{ $trainer->avatar }}" alt="">
    <div class="text-center mt-5">
        <h5 class="card-title">{{ $trainer->name }}</h5>
        <p>{{ $trainer->description }}</p>
        <a href="/trainers/{{ $trainer->slug }}/edit" class="btn btn-primary">Update trainer</a>
        {!! Form::open(['route'=> ['trainers.destroy', $trainer->slug], 'method'=>'DELETE', 'class'=>'form-group']) !!}
            {!! Form::submit('Delete trainer', ['class'=>'btn btn-danger']) !!}
        {!! Form::close() !!}
    </div>
    
    <add-pokemon-btn></add-pokemon-btn>
    <create-form-pokemons></create-form-pokemons>
    <list-of-pokemons></list-of-pokemons>
    
@endsection
