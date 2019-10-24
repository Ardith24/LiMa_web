<?php

namespace App\Http\Controllers;

use App\Task;
use App\Sprint;
use Response;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index_api()
    {
        // do this
        $get_data = array('results' => Task::all());
        return $get_data;
    }

    public function index()
    {
        $tasks = Task::orderBy('id', 'ASC')->paginate(5);
        return view('task.index', compact('tasks'));
    }

    public function create()
    {
        return view('task.create');
    }

    public function edit($id)
    {
        $task = Task::findOrFail($id);
        return view('task.edit', compact('task'));
    }

    public function show_id(Task $task)
    {
        return $task;
    }

    public function show($id)
    {
        // $sprint = Sprint::findOrFail($id);
        $task = Task::findOrFail($id);

        // return view('task.show', compact('sprint', 'task'));
        return view('task.show', compact('task'));
    }

    public function store(Request $request)
    {
        $task = Task::create($request->all());
        // DB::table('tasks')->insert([
        //     'sprint_id' => $request->sprint_id,
        //     'nama_task' => $request->nama_task,
        //     'kesulitan_id' => $request->kesulitan_id,
        //     'status' => $request->status
        //   ]);

        return redirect()->route('task.index')->with('message', 'Task berhasil dibuat!');
    }

    public function update(Request $request, Task $task)
    {
        $task->update($request->all());

        return redirect()->route('task.index')->with('message', 'Task berhasil diubah!');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('task.index')->with('message'. 'Task berhasil dihapus!');
    }
}
