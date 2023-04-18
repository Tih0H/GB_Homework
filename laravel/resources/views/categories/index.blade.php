@extends('layouts.main')
@section('categories')
    <div class="nav py-1 mb-2 align-items-center flex justify-content-center">
        <nav class="nav d-flex flex-lg-wrap justify-content-center">
            @foreach($categories as $category)
                <a class="p-2 link-secondary text-decoration-none" href="{{route('categories.show',['category'=>$category])}}">{{$category->title}}</a>

            @endforeach
        </nav>
    </div>
@endsection



