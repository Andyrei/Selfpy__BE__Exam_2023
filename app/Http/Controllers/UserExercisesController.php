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
        $ex = Auth::user()->exercises;
        return response()->json($ex);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            $data = $request->input('data');
            $ex = Auth::user();
            $ex->exercises()->attach(
                $request->exercise_id,
                ['data'=> $data]
            );

            if($data && $request->exercise_id) {
                return response()->json([
                'data' => $data,
                'status' => true,
                'message' => 'Exercise stored',
                ]);
            }else{
                return response()->json([
                    "message" => "something is missing",
                    "user"=> Auth::user(),
                    "exercise_id"=> $request->exercise_id,
                    'data'=> $request->data
                ], 400);
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
