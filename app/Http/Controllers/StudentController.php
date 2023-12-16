<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Rayon;
use App\Models\Rombel;
use App\Models\User;
use App\Models\Late;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class StudentController extends Controller
{   
    /**
     * Display a listing of the resource.
     */
    public function indexDashboard()
    {
        $students = Student::all();
        return view('pages.dashboardAdmin', compact('students'));
    }

    public function index()
    {
        $students = Student::all();
        $rayon = Rayon::all();
        $rombel = Rombel::all();
        return view('pages.student', compact('students', 'rayon', 'rombel'));
    }

    public function indexUser()
    {
        $users = User::all();
        $students = Student::all();
        $rayon = Rayon::all();
        $rombel =Rombel::all();
        $lates = Late::all();
        $totalStudents = Student::where('rayon_id', function ($query) {
            $query->select('id')
                ->from('rayons')
                ->where('user_id', Auth::user()->id);
        })->count();

        $lateStudent = Late::whereHas('student', function ($query) {
            $query->where('rayon_id', function ($subquery) {
                $subquery->select('id')
                    ->from('rayons')
                    ->where('user_id', Auth::user()->id);
            });
        })->whereDate('created_at', Carbon::today())->count();
        
        return view('pages.user.dashboard', compact('students', 'rayon', 'rombel', 'users', 'lates', 'totalStudents', 'lateStudent'));
    }
    public function studentUser()
    {
        $users = User::all();
        $students = Student::all();
        $rayon = Rayon::all();
        $rombel =Rombel::all();

        $total = Student::where('rayon_id', function ($query) {
            $query->select('id')
                ->from('rayons')
                ->where('user_id', Auth::user()->id);
        })->get();
      
        return view('pages.user.student', compact('students', 'rayon', 'rombel', 'users', 'total'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = Student::all();
        $rayon = Rayon::all();
        $rombel = Rombel::all();
        return view('pages.studentCreate', compact('students', 'rayon', 'rombel'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nis' => 'required',
            'name' => 'required',
            'rayon_id' => 'required',
            'rombel_id' => 'required',
        ]);

        Student::create($request->all());

        return redirect()->route('pages.student')->with('Success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student, $id)
    {
        $students = Student::find($id);
        $rayon = Rayon::all();
        $rombel = Rombel::all();
        return view('pages.studentEdit', compact('students', 'rayon', 'rombel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $student = Student::find($id);

        $request->validate([
            'nis' => 'required',
            'name' => 'required',
            'rayon_id' => 'required',
            'rombel_id' => 'required',
        ]);

        $student->update($request->all());

        return redirect('/student')->with('Success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $student = Student::find($id);
        $student->delete();

        return redirect('/student');
    }
}
