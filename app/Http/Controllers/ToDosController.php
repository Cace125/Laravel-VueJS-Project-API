<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ToDo;

class ToDosController extends Controller
{
    public function store(Request $request){

        $request->validate([
            'title' => 'required|min:5|max:20'
        ]);

        $todo = new ToDo;
        $todo->title = $request->title;
        $todo->save();

        return redirect()->route('form')->with('success', 'Task created successfully');
    }

    public function index(){
        $todos = ToDo::all();
        return view('/list', ['todos' => $todos]);
    }

    public function destroy($id){
        $todo = ToDo::find($id);
        $todo->delete();

        return redirect()->route('list')->with('success', 'Task deleted successfully');
    }
}
