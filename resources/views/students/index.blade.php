@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="mb-4">Student List</h2>

                <!-- Search and Filter Form -->
                <form method="GET" action="{{ route('students.index') }}" class="mb-3">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control"
                            placeholder="Search by Roll No, Name or Class" value="{{ request('search') }}">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </form>

                <a href="{{ route('students.index') }}" class="btn btn-secondary mb-3" style="margin-right: 10px;">Clear</a>

                <!-- Add New Student Button -->
                <a href="{{ route('students.create') }}" class="btn btn-primary mb-3">
                    <i class="fa-solid fa-user-plus"></i>Create
                </a>

                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <!-- Student List Table -->
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Roll No</th>
                            <th>Class</th>
                            <th>Name</th>
                            <th>DOB</th>
                            <th>NRC</th>
                            <th>Father's Name</th>
                            <th>Address</th>
                            <th>Phone Numbers</th>
                            <th>Role</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($students as $student)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $student->rollno }}</td>
                                <td>{{ $student->class }}</td>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->DOB }}</td>
                                <td>{{ $student->nrc }}</td>
                                <td>{{ $student->father_name }}</td>
                                <td>{{ $student->address }}</td>
                                <td>
                                    @php
                                        $phones = json_decode($student->phone_numbers);
                                    @endphp
                                    @if ($phones && is_array($phones))
                                        @foreach ($phones as $phone)
                                            <div>{{ $phone }}</div>
                                        @endforeach
                                    @else
                                        <div>No phone numbers available</div>
                                    @endif
                                </td>
                                

                                <td>{{ $student->role->name }}</td>
                                <td>
                                    <a href="{{ route('students.edit', $student->id) }}" class="btn btn-success"
                                        style="margin-right: 10px;">
                                        <i class="fa-solid fa-pencil"></i>Edit
                                    </a>
                                    <form action="{{ route('students.destroy', $student->id) }}" method="POST"
                                        style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Are you sure you want to delete this student?')">
                                            <i class="fa-solid fa-trash-can"></i> Delete
                                        </button>
                                    </form>

                                    <a href="{{ route('students.show', $student->id) }}" class="btn btn-info mt-2"
                                        style="margin-right: 10px;">
                                        <i class="fa-solid fa-circle-info"></i>View
                                    </a>
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="11" class="text-center">No students found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <!-- Pagination Links -->
                <div class="mt-3">
                    {{ $students->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
@endsection
