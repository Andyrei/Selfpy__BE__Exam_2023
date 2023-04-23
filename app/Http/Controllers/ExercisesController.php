<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Exercise;

class ExercisesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Exercise::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $ex = new Exercise;
        $ex -> name = $request -> input('name');
        $ex -> save();
        return response()->json([
            'status' => true,
            'message' => 'exercise created',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Exercise $exercise, $id)
    {
        return $exercise->findorfail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Exercise $exercise)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Exercise $exercise, $id )
    {
        $id= Exercise::findOrFail($id);
        $id -> delete();
        return "Exercise DELETED";
    }
}
