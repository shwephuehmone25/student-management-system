@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h2 class="mb-4">Student Details</h2>

            <!-- Student Details -->
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Personal Information</h4>

                    <!-- Roll Number -->
                    <p><strong>Roll Number:</strong> {{ $student->rollno }}</p>

                    <!-- Class -->
                    <p><strong>Class:</strong> {{ $student->class }}</p>

                    <!-- Name -->
                    <p><strong>Name:</strong> {{ $student->name }}</p>

                    <!-- Date of Birth -->
                    <p><strong>Date of Birth:</strong> {{ $student->DOB->format('d/m/Y') }}</p>

                    <!-- NRC -->
                    <p><strong>NRC:</strong> {{ $student->nrc }}</p>

                    <!-- Father's Name -->
                    <p><strong>Father's Name:</strong> {{ $student->father_name }}</p>

                    <!-- Address -->
                    <p><strong>Address:</strong> {{ $student->address }}</p>

                    <!-- Phone Numbers -->
                    <p><strong>Phone Numbers:</strong> 
                        @foreach (json_decode($student->phone_numbers) as $phone)
                            {{ $phone }}@if (!$loop->last),@endif
                        @endforeach
                    </p>

                    <!-- Role -->
                    <p><strong>Role:</strong> {{ $student->role->name }}</p>
                </div>
            </div>

            <!-- Back Button -->
            <div class="mt-4">
                <a href="{{ route('students.index') }}" class="btn btn-secondary">Back to List</a>
            </div>
        </div>
    </div>
</div>
@endsection
