<?php

namespace App\Http\Controllers;

use App\Models\{Student, Teacher, Subject};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with('teacher', 'subjects')->get();
        return view('students.index', compact('students'));
    }

    public function create()
    {
        $teachers = Teacher::all();
        $subjects = Subject::all();
        return view('students.create', compact('teachers', 'subjects'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'regnumber' => 'required|unique:students,regnumber|max:50',
            'name' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'gender' => 'required|string',
            'dob' => 'required|date',
            'email' => 'required|email|unique:students,email',
            'phonenumber' => 'nullable|string|max:15',
            'address' => 'required|string|max:255',
            'subjects' => 'required|array',
            'subjects.*' => 'exists:subjects,id',
            'teacher_id' => 'required|exists:teachers,id',
        ]);

        $studentData = $request->all();

        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $imageName = $request->regnumber . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs( $imageName, 'public');
            $studentData['photo'] = $imagePath;
        }

        $student = Student::create($studentData);

        $syncData = [];
        foreach ($request->subjects as $subject_id) {
            $syncData[$subject_id] = ['teacher_id' => $request->teacher_id];
        }
        $student->subjects()->attach($syncData);

        return redirect()->route('students.index')->with('success', 'New student details added successfully!');
    }

    public function show($id)
    {
        $student = Student::with('teacher')->findOrFail($id);
        return view('students.raj', compact('student'));
    }

    public function edit(Student $student)
    {
        $teachers = Teacher::all();
        $subjects = Subject::all();
        return view('students.edit', compact('student', 'teachers', 'subjects'));
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'regnumber' => 'required|unique:students,regnumber,' . $student->id . '|max:50',
            'name' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'gender' => 'required|string',
            'dob' => 'required|date',
            'email' => 'required|email',
            'phonenumber' => 'required|string|max:15',
            'address' => 'required|string|max:255',
            'teacher_id' => 'required|exists:teachers,id',
            'subjects' => 'required|array',
            'subjects.*' => 'exists:subjects,id',
        ]);

        $studentData = $request->all();

        if ($request->hasFile('photo')) {
            if ($student->photo) {
                Storage::delete('public/' . $student->photo);
            }

            $imageName = $request->regnumber . '.' . $request->file('photo')->getClientOriginalExtension();
            $imagePath = $request->file('photo')->storeAs( $imageName);
            $studentData['photo'] = $imagePath;
        }

        $student->update($studentData);

        $syncData = [];
        foreach ($request->subjects as $subject_id) {
            $syncData[$subject_id] = ['teacher_id' => $request->teacher_id];
        }
        $student->subjects()->sync($syncData);

        return redirect()->route('students.index')->with('success', 'Student updated successfully!');
    }

    public function destroy(Student $student)
    {
        if ($student->photo) {
            Storage::delete('public/' . $student->photo);
        }

        $student->subjects()->detach();
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student deleted successfully!');
    }

    public function getTeachers()
    {
        return response()->json(Teacher::all());
    }
}
