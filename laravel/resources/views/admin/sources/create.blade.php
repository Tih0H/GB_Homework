@extends('layouts.admin')
@section('content')
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Добавить источник</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
    </div>
    <div>
        @if($errors->any())
            @foreach($errors->all() as $error)
                <x-alert type="danger" :message=" $error "></x-alert>
            @endforeach
        @endif
        <form method="post" action="{{route('admin.sources.store')}}">
            @csrf
            <div class="form-group">
                <label for="name">Название</label>
                <input type="text" id="name" name="name" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror">
            </div>
            @error('name') <span class="text-danger">{{$message}}</span> @enderror
            <div class="form-group">
                <label for="source_url">URL</label>
                <input type="url" id="source_url" name="source_url" value="{{old('source_url')}}" class="form-control @error('source_url') is-invalid @enderror">
            </div>
            @error('source_url') <span class="text-danger">{{$message}}</span> @enderror
            <br>
            <button type="submit" class="btn btn-success">Сохранить</button>
        </form>
    </div>
@endsection
