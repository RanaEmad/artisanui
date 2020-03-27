@extends('artisanui::layout/layout')
@section('main')

@if ($errors->all())
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger">
            {{$error}}
        </div>
    @endforeach
    
@endif

@if (session("status"))
    <div class="alert alert-success">
        {{session("status")}}
    </div>
@endif

    <form action="/artisanui/seeders" method="POST">
        @csrf 
        <div class="form-group">
            <label for="name">Creation Name</label>
            <input class="form-control" type="text" name="name" id="name" />
        </div>

        <div class="form-group text-center">
            <button type="submit" class="btn btn-primary">Generate</button>
        </div>

    </form>
@endsection