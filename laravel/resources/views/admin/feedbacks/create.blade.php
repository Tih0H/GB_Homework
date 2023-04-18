@extends('layouts.admin')
@section('content')
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Добавить отзыв</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
    </div>
    <div>
        @if($errors->any())
            @foreach($errors->all() as $error)
                <x-alert type="danger" :message=" $error "></x-alert>
            @endforeach
        @endif
        <form method="post" action="{{route('admin.feedbacks.store')}}">
            @csrf
            <div class="form-group">
                <label for="author">автор</label>
                <input type="text" id="author" name="author" value="{{old('author')}}" class="form-control @error('author') is-invalid @enderror">
            </div>
            @error('author') <span class="text-danger">{{$message}}</span> @enderror
            <div class="form-group">
                <label for="feedback">Отзыв</label>
                <textarea class="form-control @error('feedback') is-invalid @enderror" id="feedback" name="feedback">{!! old('feedback') !!}</textarea>
            </div>
            @error('feedback') <span class="text-danger">{{$message}}</span> @enderror
            <br>
            <button type="submit" class="btn btn-success">Сохранить</button>
        </form>
    </div>
@endsection
