@extends('layouts.app')

@section('title', 'Trainers create')

@section('content')

    @include('common.errors')

    {!! Form::open(['route'=>'trainers.store', 'method'=>'POST', 'files'=>true, 'class'=>'form-group']) !!}
        @include('trainers.form')
        {!! Form::submit('Save trainer', ['class'=>'btn btn-primary btn-block']) !!}
    {!! Form::close() !!}

@endsection
