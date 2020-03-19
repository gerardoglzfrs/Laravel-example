@extends('layouts.app')

@section('title', 'Trainer edit')

@section('content2')
    {!! Form::model($trainer, ['route'=>['trainers.update', $trainer], 'method'=>'PUT', 'files'=>true]) !!}
        @include('trainers.form')
        {!! Form::submit('Update Trainer', ['class'=>'btn btn-primary btn-block']) !!}
    {!! Form::close() !!}
@endsection
