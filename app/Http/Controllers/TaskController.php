<?php

namespace App\Http\Controllers;

use App\Kesulitan;
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
        // $tasks = Task::orderBy('id', 'ASC')->paginate(5);
        $tasks = Task::with('sprint')->orderBy('status')->paginate(5);
        $kesulitans = Task::with('kesulitan')->paginate(5);
        return view('task.index', compact('tasks', 'kesulitans'));
    }

    public function create()
    {
        $tasks = Sprint::pluck('nama_sprint','id')->toArray();
        $kesulitans = Kesulitan::pluck('nama_tingkat', 'id')->toArray();
        return view('task.create', compact('tasks', 'kesulitans'));
    }

    public function edit($id)
    {
        $tasks = Sprint::pluck('nama_sprint','id')->toArray();
        $kesulitans = Kesulitan::pluck('nama_tingkat', 'id')->toArray();
        $task = Task::findOrFail($id);
        return view('task.edit', compact('task', 'tasks', 'kesulitans'));
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
        $this->validate($request, [
            'nama_task' => 'required',
            'status' => 'required'
        ]);

        Task::create([
                'sprint_id' => $request->sprint_id,
                'nama_task' => $request->nama_task,
                'kesulitan_id' => $request->kesulitan_id,
                'status' => false,
        ]);

        // DB::table('tasks')->insert([
        //     'sprint_id' => $request->sprint_id,
        //     'nama_task' => $request->nama_task,
        //     'kesulitan_id' => $request->kesulitan_id,
        //     'status' => false
        //   ]);

        return redirect()->route('task.index')->with('message', 'Task berhasil dibuat!');
    }

    public function update(Request $request, Task $task)
    {
        $this->validate($request, [
            'nama_task' => 'required',
            'status' => 'required'
        ]);

        $task->update($request->all());
        // $task->status = true;
        // $task->save();


        return redirect()->route('task.index')->with('message', 'Task berhasil diubah!');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('task.index')->with('message'. 'Task berhasil dihapus!');
    }
}
