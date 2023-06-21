<?php

namespace App\Http\Controllers;

use App\Models\Acara;
use Illuminate\Http\Request;

class AcaraController extends Controller
{
    public function autocomplete(Request $request)
    {
        $data = Acara::select("acara as value", "id")
                    ->where('acara', 'LIKE', '%'. $request->get('search'). '%')
                    ->get();
    
        return response()->json($data);
    }

    public function show(Acara $acara)
    {
        return response()->json($acara);
    }
    

    public function index()
    {   
        $title = "Data acara";
        $acaras = acara::orderBy('id','asc')->get();
        return view('acaras.index', compact(['acaras' , 'title']));
    }

    public function create()
    {
        $title = "Tambah Data acara";
        return view('acaras.create', compact('title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_tamu' => 'required'
        ]);

        var_dump($request);
        die;

        Acara::create($request->post());

        return redirect()->route('acaras.index')->with('success','acara has been created successfully.');
    }

    public function edit(Acara $acara)
    {
        $title = "Edit Data acara";
        return view('acaras.edit',compact('acara' , 'title'));
    }

    public function update(Request $request, Acara $acara)
    {
        $request->validate([
            'acara' => 'required',
            'tempat' => 'required',
            'panitia' => 'required',
        ]);

        $acara->fill($request->post())->save();

        return redirect()->route('acaras.index')->with('success','Position Has Been updated successfully');
    }

    public function destroy(Acara $acara)
    {
        $acara->delete();
        return redirect()->route('acaras.index')->with('success','Position has been deleted successfully');
    }

}
