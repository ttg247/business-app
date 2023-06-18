<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function menu()
    {
        return view('tasks.menu');
    }

    public function index()
    {
        $taskss = Task::all();

        return view('taskss.index', compact('taskss'));
    }

    public function create()
    {
        return view('taskss.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);

        $tasks = Task::create($validatedData);

        return redirect()->route('taskss.show', $tasks->id)->with('success', 'tasks created successfully.');
    }

    public function show($id)
    {
        $tasks = Task::findOrFail($id);

        return view('taskss.show', compact('tasks'));
    }

    public function edit($id)
    {
        $tasks = Task::findOrFail($id);

        return view('taskss.edit', compact('tasks'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);

        $tasks = Task::findOrFail($id);
        $tasks->update($validatedData);

        return redirect()->route('taskss.show', $tasks->id)->with('success', 'tasks updated successfully.');
    }

    public function destroy($id)
    {
        $tasks = Task::findOrFail($id);
        $tasks->delete();

        return redirect()->route('taskss.index')->with('success', 'tasks deleted successfully.');
    }
}

