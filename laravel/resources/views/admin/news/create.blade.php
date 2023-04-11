@extends('layouts.admin')
@section('content')
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Добавить новость</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
    </div>
    <div>
        @if($errors->any())
            @foreach($errors->all() as $error)
                <x-alert type="danger" :message=" $error "></x-alert>
            @endforeach
        @endif
        <form method="post" action="{{route('admin.news.store')}}">
            @csrf
            <div class="form-group">
                <label for="category_ids">Категории</label>
                <select class="form-control" name="category_id[]" id="category_ids" multiple="multiple">
                    <option value="0">--Выбрать--</option>
                    @foreach($categories as $category)
                        <option @if(in_array($category->id, (array) old('category_id'))) selected @endif value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="title">Заголовок</label>
                <input type="text" id="title" name="title" value="{{old('title')}}" class="form-control">
            </div>
            <div class="form-group">
                <label for="description">Описание</label>
                <input type="text" id="author" name="author" value="{{old('author')}}" class="form-control">
            </div>
            <div class="form-group">
                <label for="author">Автор</label>
                <textarea class="form-control" id="description" name="description">{{old('description')}}</textarea>
            </div>
            <div class="form-group">
                <label for="status">Статус</label>
                <select class="form-control" name="status" id="status">
                    @foreach($statuses as $status)
                        <option @if(old('status') === $status) selected @endif value="{{$status}}">{{$status}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="source_id">Статус</label>
                <select class="form-control" name="source_id" id="source_id">
                    @foreach($sources as $source)
                        <option @if((int) old('source_id') === $source->id) selected @endif value="{{$source->id}}">{{$source->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="image">Изображение</label>
                <input type="file" class="form-control" id="image" name="image" value="{{old('image')}}"/>
            </div>
            <br>
            <button type="submit" class="btn btn-success">Сохранить</button>
        </form>
    </div>
@endsection
