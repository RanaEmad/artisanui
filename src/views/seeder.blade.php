@extends('artisanui::layout/layout')
@section('main')

<h3 class="mb-4 text-secondary">Generate Seeder</h3>
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