@extends('layouts.admin')
@section('content')
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Добавить источник</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
        <a class="nav-link" href="{{route('admin.sources.create')}}">
            <span data-feather="shopping-cart" class="align-text-bottom"></span>
            Создать источник
        </a>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>URL</th>
                <th>Date</th>
                <th>CRUD</th>
            </tr>
            </thead>
            <tbody>
            @forelse($sources as $source)
                <tr>
                    <td>{{$source->id}}</td>
                    <td>{{$source->name}}</td>
                    <td>{{$source->source_url}}</td>
                    <td>{{$source->created_at}}</td>
                    <td><a href="{{ route('admin.sources.edit',['source'=>$source]) }}">Change</a>
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
