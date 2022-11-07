<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use App\Models\Restoran;
use Illuminate\Http\Request;

class MealController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('meals.index',['meals'=>Meal::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('meals.edit', ['restorans'=>Restoran::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Meal::create($request->all());
        return redirect()->route('meals.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function show(Meal $meal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function edit(Meal $meal)
    {
        return view('meals.edit',[
            'meal'=>$meal,
           'restorans'=>Restoran::all()
        ]);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Meal $meal)
    {
        $meal->fill($request->all());
        $meal->save();

        return redirect()->route('meals.index');
//        if($request->file('image')!=null) {
//            $image = $request->file('image');
//            $imageName = $request->mealName . '_' . rand() . '.' . $image->extension();
//            $image->storeAs('storage',$imageName);
//            $meal->image=$imageName;
//        }
//        $meal->mealName=$request->mealName;
//        $meal->restoran_id=$request->restoran_id;
//        $meal->price=$request->price;
//
//        $meal->save();
//        return redirect()->route('hotels.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Meal $meal)
    {
        $meal->delete();
        return redirect()->route('meals.index');
    }

    public function restoranMeals($id)
    {
        return view('meals.index',['meals'=>Meal::where('restoran_id',$id)->get()]);
    }

    public function display($meal, Request $request){
        $file=storage_path('storage/'.$meal);
        return response()->file($file);
    }
}
