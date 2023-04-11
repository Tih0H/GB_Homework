@extends('layouts.admin')
@section('content')
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Добавить запрос</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
        <a class="nav-link" href="{{route('admin.orders.create')}}">
            <span data-feather="shopping-cart" class="align-text-bottom"></span>
            Создать запрос
        </a>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Info</th>
                <th>Date</th>
                <th>CRUD</th>
            </tr>
            </thead>
            <tbody>
            @forelse($orders as $order)
                <tr>
                    <td>{{$order->id}}</td>
                    <td>{{$order->name}}</td>
                    <td>{{$order->phone}}</td>
                    <td>{{$order->email}}</td>
                    <td>{{$order->info}}</td>
                    <td>{{$order->created_at}}</td>
                    <td><a href="{{ route('admin.orders.edit',['order'=>$order]) }}">Change</a>
                        <a href="">Delete</a></td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">No records available</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

@endsection
