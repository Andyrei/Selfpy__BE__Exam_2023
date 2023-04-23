<?php

namespace App\Http\Controllers;

use App\Models\UserExercise;
use App\Models\Exercise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserExercisesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ex = UserExercise::all();
        return response()->json($ex);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $ex = new UserExercise;
            $ex->user_id = Auth::id();
            $ex->exercise_id = $request->exercise_id;
            $ex-> data = json_encode($request->only('data'));
            $ex->save();
            return "EXERCISE SAVED";
        }
        catch (\Throwable $th) {
            return response()->json($th, 405);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(UserExercise $userExercise, $id)
    {
            return $userExercise->findorfail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UserExercise $userExercise, $id)
    {
        try{
            $ex = UserExercise::findOrFail($id);
            $ex->user_id = Auth::id();
            $ex->exercise_id = $request->exercise_id;
            $ex-> data = $request->input('data');
            $ex->update();
        }catch (\Throwable $th) {
            return response()->json($th, 405);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserExercise $userExercise)
    {
        $ex = $userExercise->findorfail($id);
        $ex -> delete();
        return "Was deleted succesfully";
    }
}
