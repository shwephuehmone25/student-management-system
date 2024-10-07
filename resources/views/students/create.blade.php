@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h2 class="mb-4">Add New Student</h2>

                <!-- Display validation errors -->
                {{-- @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif --}}

                <!-- Student Create Form -->
                <form action="{{ route('students.store') }}" method="POST">
                    @csrf
                    <!-- Roll Number -->
                    <div class="form-group">
                        <label for="rollno">Roll Number</label>
                        <input type="text" name="rollno" class="form-control" id="rollno" value="{{ old('rollno') }}">
                        @error('rollno')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Class -->
                    <div class="form-group">
                        <label for="class">Class</label>
                        <input type="text" name="class" class="form-control" id="class"
                            value="{{ old('class') }}">
                        @error('class')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Name -->
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" id="name"
                            value="{{ old('name') }}">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Date of Birth -->
                    <div class="form-group">
                        <label for="DOB">Date of Birth</label>
                        <input type="date" name="DOB" class="form-control" id="DOB"
                            value="{{ old('DOB') }}">
                        @error('DOB')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- NRC -->
                    <div class="form-group">
                        <label for="nrc">NRC</label>
                        <input type="text" name="nrc" class="form-control" id="nrc" value="{{ old('nrc') }}"
                            placeholder="example: */***(N)******">
                        @error('nrc')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Father's Name -->
                    <div class="form-group">
                        <label for="father_name">Father's Name</label>
                        <input type="text" name="father_name" class="form-control" id="father_name"
                            value="{{ old('father_name') }}">
                        @error('father_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Address -->
                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea name="address" class="form-control" id="address">{{ old('address') }}</textarea>
                        @error('address')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Phone Numbers -->
                    <div class="form-group">
                        <label for="phone_numbers">{{ __('Phone Numbers (comma-separated)') }}</label>
                        <textarea name="phone_numbers" class="form-control" placeholder="Enter phone numbers separated by commas"
                            oninput="this.value=this.value.replace(/[^0-9,]/g,'');">{{ old('phone_numbers') }}</textarea>
                        @error('phone_numbers')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>


                    <!-- Role Selection -->
                    <div class="form-group">
                        <label for="role_id">{{ __('Role') }}</label>
                        <select name="role_id" id="role_id" class="form-control">
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary mt-3" style="margin-right: 10px;">Save</button>

                    <!-- Back Button -->
                    <a href="{{ route('students.index') }}" class="btn btn-secondary mt-3">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection
