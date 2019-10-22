<?php

namespace App\Http\Controllers;

use App\Sprint;
use Response;
use Illuminate\Http\Request;

class SprintController extends Controller
{
    public function index_api()
    {
        $get_data = array('results' => Sprint::all());
        // return Sprint::all();
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
        return view('sprint.show', compact('sprint'));
    }

    public function store(Request $request)
    {
        $sprint = Sprint::create($request->all());

        return redirect()->route('sprint.index')->with('message', 'Sprint berhasil dibuat!');
    }

    public function update(Request $request, Sprint $sprint)
    {
        $sprint->update($request->all());

        return redirect()->route('sprint.index')->with('message', 'Sprint berhasil diubah!');
    }

    public function destroy(Sprint $sprint)
    {
        $sprint->delete();

        return redirect()->route('sprint.index')->with('message'. 'Sprint berhasil dihapus!');
    }
}
