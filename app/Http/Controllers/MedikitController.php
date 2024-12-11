<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Medikit;
use Illuminate\Http\Request;

class MedikitController extends Controller
{
    public function index()
    {
        $key = $_GET['key'];
        $id = Kategori::where('token_kategori', $key)->first()->id_kategori;

        if($key){
            $data = [
                'medikits' => Medikit::with('kategori')->where('kategori_id', $id)->get()
            ];
        }else {
            $data = [
                'medikits' => Medikit::with('kategori')->get(),
            ];
        }

        return view('admin.medikit.data-medikit', $data);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(medikit $medikit)
    {
        //
    }

    public function edit(medikit $medikit)
    {
        //
    }

    public function update(Request $request, medikit $medikit)
    {
        //
    }

    public function destroy(medikit $medikit)
    {
        //
    }
}
