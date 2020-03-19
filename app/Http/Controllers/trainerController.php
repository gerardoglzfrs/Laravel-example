<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Trainer;
use App\Http\Requests\StoreTranierRequest;
use App\Http\Controllers\File;

class trainerController extends Controller
{

    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['admin','user']); 
        $trainers = Trainer::all();
        return view('trainers.index', compact('trainers'));
    }

    public function create()
    {
       return view('trainers.create');
    }

    public function store(StoreTranierRequest $request)
    {
        if($request->hasFile('avatar')){
            $file = $request->file('avatar');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/images/', $name);
        }
        $trainer = new Trainer();
        $trainer->name = $request->input('name');
        $trainer->avatar = $name;
        $trainer->slug = $request->input('slug');
        $trainer->description = $request->input('description');
        $trainer->save();

        return redirect()->route('trainers.index');
    }

    public function show(Trainer $trainer)
    {
      return view('trainers.show',compact('trainer'));
    }

    public function edit(Trainer $trainer)
    {
        return view('trainers.edit',compact('trainer'));
    }

    public function update(Request $request, Trainer $trainer)
    {
        $trainer->fill($request->except('avatar'));
        if($request->hasFile('avatar')){
          $file = $request->file('avatar');
          $name = time().$file->getClientOriginalName();
          $trainer->avatar = $name;
          $file->move(public_path().'/images/', $name);
        }
        $trainer->save();
        return redirect()->route('trainers.show', [$trainer])->with('status','Trainer updated');
    }

    public function destroy(Trainer $trainer)
    {
        $file_path = public_path().'/images/'.$trainer->avatar;
        \File::delete($file_path);
        $trainer->delete();
        return redirect()->route('trainers.index');
    }
}
