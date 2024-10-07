@extends('master')
@section('title')
    cap nhat
@endsection
@section('content')
    <h1>
        Cập nhật {{ $employee->first_name }}
    </h1>
    @if (session()->has('success') && !session()->get('success'))
        <div class="alert alert-danger">
            {{ session()->get('error') }}
        </div>
    @endif


    @if (session()->has('success') && session()->get('success'))
        <div class="alert alert-info">
            Thao tác thành công
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container">
        <form method="POST" action="{{ route('employees.update',$employee) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3 row">
                <label for="first_name" class="col-4 col-form-label">first_name</label>
                <div class="col-8">
                    <input value="{{ $employee->first_name }}" type="text" class="form-control" name="first_name"
                        id="first_name" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="last_name" class="col-4 col-form-label">last_name</label>
                <div class="col-8">
                    <input value="{{ $employee->last_name }}" type="text" class="form-control" name="last_name"
                        id="last_name" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="email" class="col-4 col-form-label">email</label>
                <div class="col-8">
                    <input value="{{ $employee->email }}" type="email" class="form-control" name="email"
                        id="email" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="phone" class="col-4 col-form-label">phone</label>
                <div class="col-8">
                    <input value="{{ $employee->phone }}" type="number" class="form-control" name="phone"
                        id="phone" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="date_of_birth" class="col-4 col-form-label">date_of_birth</label>
                <div class="col-8">
                    <input value="{{ $employee->date_of_birth }}" type="date" class="form-control" name="date_of_birth"
                        id="date_of_birth" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="hire_date" class="col-4 col-form-label">hire_date</label>
                <div class="col-8">
                    <input value="{{ $employee->hire_date }}" type="date" class="form-control" name="hire_date"
                        id="hire_date" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="salary" class="col-4 col-form-label">salary</label>
                <div class="col-8">
                    <input value="{{ $employee->salary }}" type="number" class="form-control" name="salary"
                        id="salary" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="is_active" class="col-4 col-form-label">is_active</label>
                <div class="col-8">
                    <input type="checkbox" @checked($employee->is_active) class="form-checkbox" name="is_active"
                        id="is_active" value="1" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="department_id" class="col-4 col-form-label">department_id</label>
                <div class="col-8">
                    <input value="{{ $employee->department_id }}" type="text" class="form-control" name="department_id"
                        id="department_id" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="manager_id" class="col-4 col-form-label">manager_id</label>
                <div class="col-8">
                    <input value="{{ $employee->manager_id }}" type="text" class="form-control" name="manager_id"
                        id="manager_id" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="address" class="col-4 col-form-label">address</label>
                <div class="col-8">
                    <input value="{{ $employee->address }}" type="text" class="form-control" name="address"
                        id="address" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="profile_picture" class="col-4 col-form-label">profile_picture</label>
                <div class="col-8">
                    <input type="file" class="form-control" name="profile_picture" id="profile_picture" />
                    @if ($employee->profile_picture)
                        <img src="{{ Storage::url($employee->profile_picture) }}" alt="" width="100px">
                    @endif
                </div>
            </div>

            <div class="mb-3 row">
                <div class="offset-sm-4 col-sm-8">
                    <button type="submit" class="btn btn-primary">
                        submit
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
