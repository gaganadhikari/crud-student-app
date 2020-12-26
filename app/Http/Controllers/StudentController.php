<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        return view('list', ['students' => $students]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        //
        $req->validate([
            'txtFirstName' => 'required',
            'txtLastName' => 'required',
            'txtAddress' => 'required'
        ]);
        $student = new Student([
            'first_name' => $req->get('txtFirstName'),
            'last_name' => $req->get('txtLastName'),
            'address' => $req->get('txtAddress')
        ]);
        $student->save();
        $req->session()->flash('status', 'students stored sucessfully');
        return redirect('list');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
        return view('view', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student, $id)
    {
        //
        $student = Student::find($id);
        return view('edit', ['student' => $student]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        //
        $req->validate([
            'txtFirstName' => 'required',
            'txtLastName' => 'required',
            'txtAddress' => 'required'
        ]);
        $student = Student::find($id);
        $student->first_name = $req->get('txtFirstName');
        $student->last_name = $req->get('txtlastName');
        $student->address = $req->get('txtAddress');

        $student->update();
        $req->session()->flash('status', 'students updated');
        return redirect('list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
        $student->delete();
        return redirect('list')->with('success', 'students deleted sucessfully');
    }
}
