<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserExercise;

class UserExercisesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return UserExercise::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(UserExercises $userExercises)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UserExercises $userExercises)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserExercises $userExercises)
    {
        //
    }
}
