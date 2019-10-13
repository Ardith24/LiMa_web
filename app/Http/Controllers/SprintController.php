<?php

namespace App\Http\Controllers;

use App\Sprint;
use Illuminate\Http\Request;

class SprintController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sprints = Sprint::orderBy('id', 'DESC')->paginate(5);
        return view('sprint.index', compact('sprints'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sprint.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sprint = Sprint::findOrFail($id);
        return view('sprint.show', compact('sprint'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sprint = Sprint::findOrFail($id);
        return view('sprint.edit', compact('sprint'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama_sprint' => 'required',
            'desc_sprint' => 'required',
            'tgl_mulai' => 'required',
            'tgl_selesai' => 'required'
        ]);

        $sprint = Sprint::findOrFail($id)->update($request->all());

        return redirect()->route('sprint.index')->with('message', 'Sprint berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sprint = Sprint::findOrFail($id)->delete();
        return redirect()->route('sprint.index')->with('message'. 'Sprint berhasil dihapus!');
    }
}
