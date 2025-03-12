<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::all();
        return view('teachers.index', compact('teachers'));
        return Teacher::with('students')->get();
        // return response()->json($teachers);
    }
    public function create()
    {
        return view('teachers.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'dob' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'email' => 'required',
            'phonenumber' => 'required',

        ]);
        $input = $request->all();
        Teacher::create($input);
        return redirect()->route('teachers.index')->with('success', 'New Teacher added successfully!');
        return Teacher::create($request->all());
    }

    public function show($id)
    {
        $teachers = Teacher::find($id);
        return view('teachers.show', compact('teachers'));
    }

    public function edit($id)
    {
        $teachers = Teacher::find($id);
        return view('teachers.edit', compact('teachers'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'dob' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'email' => 'required',
            'phonenumber' => 'required',
        ]);
        $teachers = Teacher::find($id);
        $input = $request->all();
        $teachers->update($input);
        return redirect()->route('teachers.index')->with('success', 'Teacher deatails updated successfully!');
    }

    public function destroy($id)
    {
        $teachers = Teacher::find($id);
        $teachers->delete();
        return redirect()->route('teachers.index')->with('success', 'Teacher detail deleted successfully!');
    }
}
