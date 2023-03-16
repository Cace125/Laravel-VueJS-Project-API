<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ToDo;

class ApiToDosController extends Controller
{
    public function store(Request $request) {

        $request->validate([
            'title' => 'required|min:5|max:20'
        ]);

        $todo = new ToDo;

        // if ($title == "") {
        //     return response()->json(['message' => 'title is required'], 400);
        // }

        $todo->title = $request->title;
        $todo->save();

        return response()->json(['success' => 'Saved successfully'], 200);
    }

    public function index(){
        $todos = ToDo::all();
        return response()->json(['todos' => $todos], 200);
    }

    public function destroy($id){
        $todo = ToDo::find($id);

        if (!isset($todo)) {
            return response()->json(['message' => 'Item not found'], 400);
        }

        $todo->delete();

        return response()->json(['success' => 'Deleted successfully'], 200);
    }
}