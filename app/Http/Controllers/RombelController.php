<?php

namespace App\Http\Controllers;

use App\Models\Rombel;
use Illuminate\Http\Request;

class RombelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rombels = Rombel::all();
        return view('pages.rombel', compact('rombels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.rombelCreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    try {
        $request->validate([
            'rombel' => 'required|string|max:255',
        ]);

        Rombel::create($request->all());

        return redirect('/rombel')->with('success', 'Data Berhasil Ditambahkan');
    } catch (\Exception $e) {
        return redirect('/dashboard')->with('error', 'Error: ' . $e->getMessage());
    }
}


    /**
     * Display the specified resource.
     */
    public function show(Rombel $rombel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rombel $rombels, $id)
    {
        $rombels = Rombel::find($id);

        return view('pages.rombelEdit', compact('rombels'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $rombels = Rombel::findOrFail($id);

    $request->validate([
        'rombel' => 'required|string|max:255',
    ]);

    $rombels->update($request->all());

    return redirect('/rombel')->with('success', 'Data Berhasil Diubah');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $rombels = Rombel::find($id);
    $rombels->delete();
    return redirect('/rombel')->with('success', 'Data Berhasil Dihapus');
}

}
