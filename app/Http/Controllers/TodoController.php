<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Http\Resources\TodoResource;
use App\Models\Todo;
use App\Http\Requests\TodoRequest;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    public function __construct()
{
    //   $this->middleware('jwt.auth');
}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todos = TodoResource::collection(Todo::all());
        return response()->json([
        "status_code"=> 200,
        "status" => "success",
        "data" => $todos
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TodoRequest $request)
    {
        // $user = auth()->user();
        // if (!$user) {
        //     return response()->json(["message" =>"Unauthorised"], 401);
        // }
        $todo  = new Todo;
        $todo->userId = $user->id;
        $todo->title = $request->title;
        $todo = $todo->save();
        return response()->json([
        "status_code"=> 201,
        "status" => "success",
        "data" => new TodoResource($todo)
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        if (is_null($todo)) {
            return $this->response()->json([
                "status" => "failure",
                "status_code"=> 404,
                "message" =>"Todo not found."
            ], 404);
        }
        return response()->json([
        "status_code"=> 200,
        "status" => "success",
        "data" => new TodoResource($todo)
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todo $todo)
    {
        $todo->update($request->all());
        return response()->json([
        "status_code"=> 200,
        "status" => "success",
        "message" => "The Todo was updated successfully.",
        "data" => new TodoResource($todo)
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo)
    {
        $todo->delete();
        return response()->json([
        "status" => "success",
        "status_code"=> 204,
        "message" => "The Todo was deleted successfully.",
        "data" => []
        ]);
    }
}
