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

<h3 class="mb-4 text-secondary">Generate Test</h3>
    <form action="/artisanui/tests" method="POST">
        @csrf 
        <div class="form-group">
            <label for="name">Creation Name</label>
            <input class="form-control" type="text" name="name" id="name" />
        </div>

        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="unit" id="unit" value="1"/>
            <label for="unit" class="form-check-label">Unit</label>
        </div>

        <div class="form-group text-center">
            <button type="submit" class="btn btn-primary">Generate</button>
        </div>

    </form>
@endsection