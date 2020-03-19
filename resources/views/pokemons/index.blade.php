@extends('layouts.app')

@section('title', 'Pokemons')

@section('content')
    <add-pokemon-btn></add-pokemon-btn>
    <list-of-pokemons></list-of-pokemons>
    <create-form-pokemons></create-form-pokemons>
@endsection