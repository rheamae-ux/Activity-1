<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    // GET /api/teachers
    public function index()
    {
        return response()->json(Teacher::all(), 200);
    }

    // POST /api/teachers
    public function store(Request $request)
    {
       $request->validate([
    'name' => 'required|string|max:255',
    'email' => 'required|email|unique:teachers,email',
    'subject' => 'required|string|max:255',
    'age' => 'required|integer',
]);

    $teacher = Teacher::create([
    'name' => $request->name,
    'email' => $request->email,
    'subject' => $request->subject,
    'age' => $request->age,
]);
        return response()->json([
            'message' => 'Teacher created successfully.',
            'data' => $teacher
        ], 201);
    }

    // GET /api/teachers/{id}
    public function show(Teacher $teacher)
    {
        return response()->json($teacher, 200);
    }

    // PUT /api/teachers/{id}
    public function update(Request $request, Teacher $teacher)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:teachers,email,' . $teacher->id,
            'subject' => 'required|string|max:255',
        ]);

        $teacher->update([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
        ]);

        return response()->json([
            'message' => 'Teacher updated successfully.',
            'data' => $teacher
        ], 200);
    }

    // DELETE /api/teachers/{id}
    public function destroy(Teacher $teacher)
    {
        $teacher->delete();

        return response()->json([
            'message' => 'Teacher deleted successfully.'
        ], 200);
    }
}
