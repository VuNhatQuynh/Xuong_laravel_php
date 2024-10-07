@extends('master')
@section('title')
    <h1>Tổng Doanh thu theo tháng</h1>
@endsection
@section('content')
    <div class="table-responsive">
        <table class="table table-primary">
            <thead>
                <tr>
                    <th scope="col">Thang</th>
                    <th scope="col">Nam</th>
                    <th scope="col">Tong</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($data as $sales)
                    <tr class="">
                        <td scope="row">{{$sales->month}}</td>
                        <td>{{$sales->year}}</td>
                        <td>{{$sales->total_sales}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
