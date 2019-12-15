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
        // do this
        $get_data = array('results' => Sprint::all());
        return $get_data;
    }

    public function index()
    {
        // $tasks = Sprint::has('tasks')->get();

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

        return view('sprint.show', compact('task', 'sprint'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_sprint' => 'required',
            'desc_sprint' => 'required',
            'tgl_mulai' => 'required',
            'tgl_selesai' => 'required'
        ]);

        $sprint = Sprint::create($request->all());

        return redirect()->route('sprint.index')->with('message', 'Sprint berhasil dibuat!');
    }

    public function store_api()
    {
        $this->json('post', '/api/tasks')
            ->assertStatus(422)
            ->assertJson([
                'nama_sprint' => ['Nama harus diisi'],
                'desc_sprint' => ['Deskripsi harus diisi'],
                'tgl_mulai' => ['Harap diisi'],
                'tgl_selesai' => ['Harap diisi'],
            ]);
        
        return redirect()->route('sprint.index')->with('message', 'Sprint berhasil dibuat!');
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
