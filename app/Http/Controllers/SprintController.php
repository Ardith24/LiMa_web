<?php

namespace App\Http\Controllers;

use App\Sprint;
use App\Task;
use Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SprintController extends Controller
{
    public function index_api()
    {
        $get_data = array('results' => Sprint::all());
        return $get_data;
    }

    public function index()
    {
        $sprints = Sprint::orderBy('id', 'ASC')->paginate(5);
        return view('sprint.index', compact('sprints'));
    }

    public function create()
    {
        return view('sprint.create');
    }

    public function edit($id)
    {
        $sprint = Sprint::findOrFail($id);
        return view('sprint.edit', compact('sprint'));
    }

    public function show_id(Sprint $sprint)
    {
        return $sprint;
    }

    public function show($id)
    {
        $sprint = Sprint::findOrFail($id);
        $task = Task::with('sprint')->orderBy('status')->where('sprint_id',$id)->get();
        
        $wl = Task::with('sprint')->orderBy('status')->where('sprint_id',$id)->whereIn('status', ['1'])->count();
        $total = Task::with('sprint')->orderBy('status')->where('sprint_id',$id)->count();
        if ($total != 0) {
            $percent = round($wl / $total * 100);
        } else {
            $percent = 0;
        }

        return view('sprint.show', compact('task', 'sprint', 'percent'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_sprint' => 'required',
            'desc_sprint' => 'required',
            'tgl_mulai' => 'required',
            'tgl_selesai' => 'required'
        ]);

        Sprint::create($request->all());

        return redirect()->route('sprint.index')->with('message', 'Sprint berhasil dibuat!');
    }

    public function store_api(Request $request)
    {
        $this->validate($request, [
            'nama_sprint' => 'required',
            'desc_sprint' => 'required',
            'tgl_mulai' => 'required',
            'tgl_selesai' => 'required'
        ]);

        Sprint::create($request->all());

        $get_data = $request->all();
        return $get_data;
    }

    public function update(Request $request, Sprint $sprint)
    {
        $this->validate($request, [
            'nama_sprint' => 'required',
            'desc_sprint' => 'required',
            'tgl_mulai' => 'required',
            'tgl_selesai' => 'required'
        ]);

        $sprint->update($request->all());

        return redirect()->route('sprint.index')->with('message', 'Sprint berhasil diubah!');
    }

    public function destroy($id)
    {
        DB::table('sprints')->where('id', $id)->delete();
        DB::table('tasks')->where('sprint_id', $id)->delete();

        return redirect()->route('sprint.index')->with('message'. 'Sprint berhasil dihapus!');
    }
}
