<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserToDo;
use Illuminate\Support\Facades\Auth;

class UserToDosController extends Controller
{
    // public function __construct()
    // {
    //     $this.middleware('auth');
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todos = UserToDo::where('user_id',Auth::user()->id)->get();
        return response()->json(['todos' => $todos], 200);
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
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:5|max:20'
        ]);

        $todo = new UserToDo;

        $todo->title = $request->title;
        $todo->user_id = Auth::user()->id;

        $todo->save();

        return response()->json(['success' => 'Saved successfully'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $todo = UserToDo::find($id);

        if (!isset($todo)) {
            return response()->json(['message' => 'Item not found'], 400);
        }

        $todo->delete();

        return response()->json(['success' => 'Deleted successfully'], 200);
    }
}
