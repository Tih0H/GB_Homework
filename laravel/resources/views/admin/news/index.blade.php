@extends('layouts.admin')
@section('content')
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Добавить новость</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
        <a class="nav-link" href="{{route('admin.news.create')}}">
            <span data-feather="shopping-cart" class="align-text-bottom"></span>
            Создать новость
        </a>
    </div>

@endsection
