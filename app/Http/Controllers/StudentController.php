<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use Illuminate\Http\Request;
use App\Models\Role;

class StudentController extends Controller
{
    /**
     * Display a listing of the students with search and filter options.
     */
    public function index(Request $request)
    {
        $query = Student::query();

        if ($request->filled('search')) {
            $query->where('rollno', 'like', '%' . $request->search . '%')
                ->orWhere('class', 'like', '%' . $request->search . '%')
                ->orWhere('name', 'like', '%' . $request->search . '%')
                ->orWhere('father_name', 'like', '%' . $request->search . '%')
                ->orWhere('address', 'like', '%' . $request->search . '%')
                ->orWhere('phone_numbers', 'like', '%' . $request->search . '%');
        }

        $students = $query->orderBy('id', 'asc')->paginate(5);

        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new student.
     */
    public function create()
    {
        $roles = Role::getAllRoles(); 
        return view('students.create', compact('roles')); 
    }

    /**
     * Store a newly created student in storage.
     */
    public function store(StoreStudentRequest $request)
    {
        $validatedData = $request->validated();

        $validatedData['phone_numbers'] = json_encode(array_map('trim', explode(',', $request->phone_numbers)));

        $student = Student::create($validatedData);

        return redirect()->route('students.index')->with('success', 'Student created successfully.');
    }

    /**
     * Display the specified student.
     */
    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified student.
     */
    public function edit(Student $student)
    {
        $roles = Role::getAllRoles(); 

        return view('students.edit', compact('student', 'roles'));
    }

    /**
     * Update the specified student in storage.
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        $student->update($request->validated());

        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }

    /**
     * Remove the specified student from storage.
     */
    public function destroy(Student $student)
    {
        if (!$student) {
            return redirect()->route('students.index')->with('error', 'Student not found.');
        }

        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }
}
