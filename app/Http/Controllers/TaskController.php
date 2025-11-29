<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    // retrieve all the tasks : current user
    public function index()
    {
        $tasks = Auth::user()->tasks()->get(); 
        return response()->json($tasks);
    }

    // POST c ; new task
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'is_completed' => 'boolean',
        ]);

        $task = Auth::user()->tasks()->create($request->only('title', 'description', 'is_completed'));

        return response()->json($task, 201);
    }

    // GET retrieve ; specific task
    public function show(Task $task)
    {
        
        if ($task->user_id !== Auth::id()) {
            return response()->json(['message' => 'Unauthorized or Not Found'], 403);
        }
        
        return response()->json($task);
    }

    // PUT update specific 
    public function update(Request $request, Task $task)
    {
        
        if ($task->user_id !== Auth::id()) {
            return response()->json(['message' => 'Unauthorized or Not Found'], 403);
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'is_completed' => 'boolean',
        ]);

        $task->update($request->only('title', 'description', 'is_completed'));

        return response()->json($task);
    }

    // DELETE delete ; specific
    public function destroy(Task $task)
    {
        
        if ($task->user_id !== Auth::id()) {
            return response()->json(['message' => 'Unauthorized or Not Found'], 403);
        }
        
        $task->delete();
        
        return response()->json(['message' => 'Task deleted successfully'], 204);
    }
}