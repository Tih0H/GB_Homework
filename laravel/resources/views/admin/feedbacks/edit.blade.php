@extends('layouts.admin')
@section('content')
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Редактировать отзыв</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
    </div>

    <div>
        @if($errors->any())
            @foreach($errors->all() as $error)
                <x-alert type="danger" :message=" $error "></x-alert>
            @endforeach
        @endif
        <form method="post" action="{{route('admin.feedbacks.update',['feedback'=>$feedback])}}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="author">Автор</label>
                <input type="text" id="author" name="author" value="{{$feedback->author}}" class="form-control">
            </div>
            <div class="form-group">
                <label for="feedback">Отзыв</label>
                <textarea class="form-control" id="feedback" name="feedback">{!! $feedback->feedback !!}</textarea>
            </div>
            <br>
            <button type="submit" class="btn btn-success">Сохранить</button>
        </form>
    </div>
@endsection

