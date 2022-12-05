<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listproject;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ListprojectRequest;

class ListprojectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todo = DB::table('listprojects')->orderBy('progres')->paginate(5);
        return view('project.index', ['todo' => $todo]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('project.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ListprojectRequest $request)
    {
        Listproject::create($request->all());
        return redirect()->route('todo.index')->with('message', 'Data Pekerjaan Berhasil Di TAMBAHKAN');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Listproject  $listproject
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $details = Listproject::findOrFail($id);
        return view('project.details', compact('details'));
        // dd($details);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Listproject  $listproject
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('project.edit', [
            'todo' => Listproject::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Listproject  $listproject
     * @return \Illuminate\Http\Response
     */
    public function update(ListprojectRequest $request, $id)
    {
        Listproject::findOrFail($id)->update($request->all());
        return redirect()->route('todo.index')->with('message', 'Data Pekerjaan Berhasil Di EDIT');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Listproject  $listproject
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Listproject::findOrFail($id)->delete();
        return redirect()->route('todo.index')->with('message', 'Data List Projek Berhasil di HAPUS');
    }


    // Class Baru

    // Menampilkan halaman data pekerjaan on progres
    public function onprogres()
    {
        $onprogres = DB::table('listprojects')->where('status', '=', 'on progres')->paginate(5);
        return view('project.onprogres', ['onprogres' => $onprogres]);
    }
    
    
    // Menampilkan Halaman Pekerjaan Selesai
    public function finish()
    {
        $finish = DB::table('listprojects')->where('status', '=', 'finish')->paginate(5);
        return view('project.finish', ['finish' => $finish]);
    }


    // Menampilkan Halaman Pekerjaan Tertunda
    public function delay()
    {
        $delay = DB::table('listprojects')->where('status', '=', 'delay')->paginate(5);
        return view('project.delay', ['delay' => $delay]);
    }

    public function report()
    {
        $data = Db::table('listprojects')->orderBy('progres')->get();
        return view('project.report',['data' => $data]);
    }
}