<?php

namespace App\Http\Controllers;

use App\Category;
use App\Place;
use Illuminate\Http\Request;

use App\Http\Requests;

class PlaceController extends Controller
{
    public function index(){
        $places = Place::all();
        $categories = Category::all();
        return view('place/index',compact('places','categories'));
    }
    public function create(){
        $categories = Category::all();
        return view('place/create',compact('categories'));
    }
    public function store(Request $request){
        $destinationPath = 'files'; // upload path
//        $name = $request->file('photo')->getClientOriginalName();
        $extension = $request->file('photo')->getClientOriginalExtension(); // getting image extension
        $fileName = rand(11111, 99999) . '.' . $extension; // renameing image
        $request->file('photo')->move($destinationPath, $fileName); // uploading file to given path'
        $category = Category::find($request['category']);
        $place = Place::create([
            'title' => $request['title'],
            'categories_id' => $request['category'],
            'description' => $request['description'],
            'photo' => $fileName,
        ]);
        $place->save();
        return redirect(route('place.index'));
    }
    public function show($id){
        $place = Place::find($id);

        $place->reviews = $place->reviews+1;
        $place->save();

        return view('place/show',compact('place'));
    }
    public function edit($id){
        $place = Place::find($id);
        $categories = Category::all();
        return view('place/edit',compact('place','categories'));
    }

    public function update(Request $request,$id){
        $place = Place::find($id);
        if ($request->hasFile('photo')){
            $destinationPath = 'files'; // upload path
    //        $name = $request->file('photo')->getClientOriginalName();
            $extension = $request->file('photo')->getClientOriginalExtension(); // getting image extension
            $fileName = rand(11111, 99999) . '.' . $extension; // renameing image
            $request->file('photo')->move($destinationPath, $fileName); // uploading file to given path'
            $place->update([
                'title' => $request['title'],
                'categories_id' => $request['categories_id'],
                'description' => $request['description'],
                'photo' => $fileName
            ]);
        }
        else
            $place->update([
                'title' => $request['title'],
                'categories_id' => $request['categories_id'],
                'description' => $request['description'],
            ]);

        return redirect(route('place.index'));
    }
    public function delete($id){
        Place::destroy($id);
        return redirect(route('place.index'));
    }
}