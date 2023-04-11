@extends('layouts.admin')
@section('content')
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Добавить отзыв</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
        <a class="nav-link" href="{{route('admin.feedbacks.create')}}">
            <span data-feather="shopping-cart" class="align-text-bottom"></span>
            Создать отзыв
        </a>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Author</th>
                <th>Feedback</th>
                <th>Date</th>
                <th>CRUD</th>
            </tr>
            </thead>
            <tbody>
            @forelse($feedbacks as $feedback)
                <tr>
                    <td>{{$feedback->id}}</td>
                    <td>{{$feedback->author}}</td>
                    <td>{{$feedback->feedback}}</td>
                    <td>{{$feedback->created_at}}</td>
                    <td><a href="{{ route('admin.feedbacks.edit',['feedback'=>$feedback]) }}">Change</a>
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
