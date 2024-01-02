<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Program;



class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $students = $request->search ? Student::whereRAW("CONCAT(givenNames,' ', surName) REGEXP ?", $request->search)->paginate(5) : Student::join('programs', 'students.program_id','=','programs.id')
                        ->select('students.*', 'programs.name as program_name')
                        ->latest('id')->paginate(10);
        // $students=[];
        // $students = $request->search ? Student::where('givenNames', '=',$request->search)
        //$students = $request->search ? Student::whereRAW("CONCAT(givenNames,'+',surName) = ?", [$request->search])->paginate(5)
        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $programs = Program::all();
        return view('students.create', compact('programs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $errors = $request->validate([
            'givenNames' => 'required|string|max:255',
            'surName' => 'required|string|max:255',
            'yearEnrolled' => 'required|string|max:4'
        ]);
        $student = new Student;
        $student->givenNames = $request['givenNames'];
        $student->surName = $request['surName'];
        $student->dob = $request['dob'];
        $student->program_id = $request['program_id'];
        $student->yearEnrolled = $request['yearEnrolled'];
        $student->save();
        return redirect()->route('students.index')->with('Notify','Add student Success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student = Student::find($id);
        $programs = Program::all();
        return view('students.edit', compact('student','programs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $errors = $request->validate([
            'givenNames' => 'required|string|max:255',
            'surName' => 'required|string|max:255',
            'yearEnrolled' => 'required|string|max:4'
        ]);
        $student = Student::find($id);
        $student->givenNames = $request['givenNames'];
        $student->surName = $request['surName'];
        $student->dob = $request['dob'];
        $student->program_id = $request['program_id'];
        $student->yearEnrolled = $request['yearEnrolled'];
        $student->update();
        return redirect()->route('students.index')->with('Notify','Update student Success');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Student::find($id)->delete();
        return redirect()->route('students.index')->with('Notify','Delete student Success');
    }
}
