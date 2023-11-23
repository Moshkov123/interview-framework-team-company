<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index()
    {
        $reviews = new Task();
        return view('dashboard', ['private' => $reviews->all()]);
    }

    public function delete($id)
    {
        $task = Task::find($id);
        if ($task) {
            $task->delete();
        }
        return redirect()->route('dashboard');
    }
    
    public function dashboard_check(Request $request)
    {
        $valid = $request->validate([
            'task' => 'required|min:2|max:120',
        ]);

        // Get the authenticated user's ID
        $userId = Auth::id();

        // Create a new contact associated with the user's ID
        $task = new Task();
        $task->task = $request->input('task');
        $task->users_id = $userId;
        $task->save();

        // Retrieve all tasks associated with the user's ID
        $tasks = Task::where('users_id', $userId)->get();

        return redirect()->route('dashboard')->with('tasks', $tasks);
    }
}
