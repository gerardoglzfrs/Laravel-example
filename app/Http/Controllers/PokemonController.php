<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pokemon;
use App\Trainer;
class PokemonController extends Controller
{
   
    public function index(Trainer $trainer, Request $request)
    {
        if ($request->ajax()) {
            return response()->json( $trainer->pokemons, 200);
        }
        return view('pokemons.index');
    }

    public function store(Trainer $trainer, Request $request)
    {
        if($request->ajax()){
            $pokemon = new Pokemon();
            $pokemon->name = $request->input('name');
            $pokemon->picture = $request->input('picture'); 
            $pokemon->trainer()->associate($trainer)->save();
       
            return response()->json([
                'menssage' => 'Data saved.',
                'trainer' => $trainer,
                'pokemon' => $pokemon
            ],200);
        }
    }
}
