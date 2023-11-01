<?php

namespace App\Http\Controllers;
use App\Models\ToDoList;
use Auth;

use Illuminate\Http\Request;

class ToDoListController extends Controller
{
    public function __construct() {
        // code here..
    }

    public function index() {
        $todos = ToDoList::all();
        // $user_id = Auth::user()->id;
        
        $data = array(
            // 'user_id' => $user_id,
            'active' => 'todolist',
            'title' => 'To-do List',
            'todos' => $todos
        );

        return view('user.todolist.index', $data);
    }

    public function create() {
        $data = array(
            'title' => 'Create To-do List',
            'active' => 'create'
        );

        return view('user.todolist.create', $data);
    }

    public function store(Request $request) {
        ToDoList::create($request->all());

        return redirect('todolist')->with('message','To-do List has been added');
    }

    public function edit() {
        $data = array(
            'title' => 'To-do List', 
            'active' => 'edit'
        );

        return view('user.todolist.edit', $data);
    }

    public function update(Request $request, ToDoList $todo)
    {
        // $todo->update($request->all());

        $data = array(
            'title' => 'Update To-do List',
            'active' => 'update'
        );

        return redirect('user.todolist.index', $data);
    }

    // public function update() {
    //     $data = array(
    //         'title' => 'Update',
    //         'active' => 'update'
    //     );
        
    //     return view('user.todolist.update', $data);
    // }

    public function delete($id)
    {
        // $todo->delete();
        $todo = ToDoList::find($id);
        TodoList::destroy($id);

        return redirect()->route('user.todolist.index')->with('delete', 'Success Deleted To-do list');
    }
}
