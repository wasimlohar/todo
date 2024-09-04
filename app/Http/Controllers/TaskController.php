<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return response()->json(['tasks' => $tasks]);
    }

    public function show()
    {
        return view('tasks'); // Replace 'tasks.index' with your actual Blade view name
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:tasks,name'
        ],[
            'name.required' => 'The task name is required.', 
            'name.unique' => 'This task name has already been taken.',
        ]);

        $task = Task::create([
            'name' => $request->name,
            'is_completed' => 0
        ]);

        return response()->json($task);
    }

    public function update(Request $request, Task $task)
    {
        $task->is_completed = $request->is_completed ? 1 : 0;
        $task->save();

        return response()->json($task);
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return response()->json(['success' => true]);
    }

}
