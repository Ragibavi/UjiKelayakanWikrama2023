<?php

namespace App\Http\Controllers;

use App\Exports\LateExport;
use App\Models\Late;
use App\Models\User;
use App\Models\Student;
use App\Models\Rayon;
use App\Models\Rombel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class LateController extends Controller
{
    public function export()
    {
        return Excel::download(new LateExport, 'lates.xlsx');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lates = Late::all();
        $students = Student::all();

        return view('pages.datelate', compact('lates', 'students'));
    }


    public function indexUser()
    {
        $users = User::all();
        $students = Student::whereHas('rayon', function ($query) {
            $query->where('user_id', auth()->user()->id);
        })->get();
        $rayon = Rayon::all();
        $rombel = Rombel::all();
        $lates = Late::all();

        $lateStudent = Late::whereHas('student', function ($query) {
            $query->whereHas('rayon', function ($subquery) {
                $subquery->where('user_id', auth()->user()->id);
            });
        })->get();

        return view('pages.user.datelate', compact('lates', 'students', 'lateStudent'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lates = Late::all();
        $students = Student::all();

        return view('pages.dateLateCreate', compact('lates', 'students'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required',
            'date_time_late' => 'required',
            'information' => 'required',
            'bukti' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
        ]);

        $imageName = time() . '.' . $request->bukti->getClientOriginalExtension();
        $request->bukti->move(public_path('images'), $imageName);

        $late = new Late([
            'student_id' => $request->get('student_id'),
            'date_time_late' => $request->{'date_time_late'},
            'information' => $request->get('information'),
            'bukti' => $imageName,
        ]);

        $late->save();

        // Late::create($request->all());

        return redirect()->route('pages.dateLate')->with('success', 'Late record created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Late $late)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Late $lates, $id)
    {
        $lates = Late::find($id);
        $students = Student::all();
        return view('pages.dateLateEdit', compact('lates', 'students'));
    }
    public function detail(Late $lates, $student_id)
    {
        $students = Student::all();
        $rombel = Rombel::all();
        $rayon = Rayon::all();

        $studentLate = Student::find($student_id);

        $lateAll = Late::all()->where('student_id', $student_id);

        return view('pages.dateLateDetail', compact('students', 'rombel', 'rayon', 'studentLate', 'lateAll'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $lates = Late::findOrFail($id);

        $request->validate([
            'student_id' => 'required',
            'date_time_late' => 'required',
            'information' => 'required',
        ]);

        $lates->update($request->all());

        return redirect()->route('pages.dateLate')->with('success', 'Late record updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $lates = Late::findOrFail($id);
        $lates->delete();

        return redirect()->route('pages.dateLate');
    }
}
