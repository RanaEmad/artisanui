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

    <h3 class="mb-4 text-secondary">Generate Model</h3>
    <form action="/artisanui/models" method="POST">
        @csrf 
        <div class="form-group">
            <label for="name">Creation Name</label>
            <input class="form-control" type="text" name="name" id="name" />
        </div>

        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="all" id="all" value="1"/>
            <label for="all" class="form-check-label">All</label>
        </div>

        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="controller" id="controller" value="1"/>
            <label for="controller" class="form-check-label">Controller</label>
        </div>

        <div class="form-check form-check-inline">
            <input type="checkbox" class="form-check-input" name="factory" id="factory" value="1">
            <label for="factory" class="form-check-label">Factory</label>
        </div>

        <div class="form-check form-check-inline">
            <input type="checkbox" class="form-check-input" name="migration" id="migration" value="1">
            <label for="migration" class="form-check-label">Migration</label>
        </div>

        <div class="form-check form-check-inline">
            <input type="checkbox" class="form-check-input" name="seed" id="seed" value="1">
            <label for="seed" class="form-check-label">Seeder</label>
        </div>

        <div class="form-group text-center">
            <button type="submit" class="btn btn-primary">Generate</button>
        </div>

    </form>
@endsection