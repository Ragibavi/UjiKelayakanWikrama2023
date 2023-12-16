<?php

namespace App\Http\Controllers;


use App\Models\Rayon;
use App\Models\User;
use Illuminate\Http\Request;

class RayonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rayon = Rayon::all();
        $user = User::all();
        return view('pages.rayon', compact('rayon', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $user = User::all();
        $rayon = Rayon::all();
        return view('pages.rayonCreate', compact('rayon', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'rayon' => 'required',
            'user_id' => 'required',
        ]);

        Rayon::create($request->all());

        return redirect()->route('pages.rayon')->with('success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Rayon $rayon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rayon $rayon, $id)
    {
        $rayon = Rayon::find($id);
        $user = User::all();
        return view('pages.rayonEdit', compact('rayon', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $rayons = Rayon::find($id);

        $request->validate([
            'rayon' => 'required',
            'user_id' => 'required',
        ]);

        $rayons->update($request->all());

        return redirect('/rayon')->with('Success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $rayon = Rayon::find($id);
        $rayon->delete();
        return redirect('/rayon');
    }
}
