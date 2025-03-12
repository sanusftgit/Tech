<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::all();
        return view('subjects.index', compact('subjects'));
    }

    public function create()
    {
        return view('subjects.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|unique:subjects,code',
        ]);
        Subject::create($request->only(['name', 'code']));
        return redirect('/teacher-to-subject')->with('success', 'Subject detail added successfully!');
    }

    public function show($id)
    {
        $subject = Subject::find($id);
        if (!$subject) {
            return redirect()->route('subjects.index')->with('error', 'Subject not found.');
        }
        return view('subjects.show', compact('subject'));
    }

    public function edit($id)
    {
        $subject = Subject::findOrFail($id);
        return view('subjects.edit', compact('subject'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:10|unique:subjects,code,' . $id,
        ]);
        $subject = Subject::findOrFail($id);
        $subject->update($request->only(['name', 'code']));
        return redirect('/teacher-to-subject')->with('success', 'Subject detail updated successfully!');
    }

    public function destroy($id)
    {
        $subject = Subject::find($id);
        if (!$subject) {
            return redirect()->route('subjects.index')->with('error', 'Subject not found.');
        }
        $subject->delete();
        return redirect()->route('subjects.index')->with('success', 'Subject detail deleted successfully!');
    }
}