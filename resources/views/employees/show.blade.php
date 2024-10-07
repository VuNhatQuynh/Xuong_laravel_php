@extends('master')
@section('title')
    xem chi tiết nhân viên: {{ $employee->first_name }}
@endsection
@section('content')
    <h1>
        xem chi tiết nhân viên: {{ $employee->first_name }} {{ $employee->last_name }}
    </h1>
    <div class="table-responsive">
        <table class="table table-primary">
            <thead>
                <tr>
                    <th scope="col">tên Trường</th>
                    <th scope="col">Giá trị</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($employee->toArray() as $key => $value)
                    <tr class="">
                        <td scope="row">{{ strtoupper($key) }}</td>
                        <td>@php
                            switch ($key) {
                                case 'profile_picture':
                                if ($value){
                                    $url = Storage::url($value) ;
                                    echo "<img src='$url' alt='' width='100px'>";
                                }
                                break;
                                case 'is_active':
                                    echo $value?
                                    '<span class="badge bg-primary">Yes</span>':
                                    '<span class="badge bg-danger">No</span>';
                                    break;

                                default:
                                    echo $value;
                                    break;
                            }
                        @endphp</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
