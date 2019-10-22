<?php

namespace App\Http\Controllers;

use App\Kejar;
use Response;
use Illuminate\Http\Request;

class KejarController extends Controller
{
    public function index_api()
    {
        return Kejar::all();
    }

    public function index()
    {
        $kejars = Kejar::orderBy('id', 'DESC')->paginate(5);
        return view('kejar.index', compact('kejars'));
    }

    public function show(Kejar $kejar)
    {
        return $kejar;
    }

    public function store(Request $request)
    {
        $kejar = Kejar::create($request->all());

        return response()->json($kejar, 201);
    }

    public function update(Request $request, Kejar $kejar)
    {
        $kejar->update($request->all());

        return response()->json($kejar, 200);
    }

    public function delete(Kejar $kejar)
    {
        $kejar->delete();

        return response()->json(null, 204);
    }
}
