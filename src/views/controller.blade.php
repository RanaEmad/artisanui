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

    <form action="/artisanui/controllers" method="POST">
        @csrf 
        <div class="form-group">
            <label for="name">Creation Name</label>
            <input class="form-control" type="text" name="name" id="name" />
        </div>

        <div class="form-group extra-form-group d-none">
            <label for="extra_name"></label>
            <input class="form-control" type="text" name="extra_name" id="extra_name" />
        </div>

        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="api" id="api" value="1"/>
            <label for="api" class="form-check-label">API</label>
        </div>

        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="resource" id="resource" value="1"/>
            <label for="resource" class="form-check-label">Resource</label>
        </div>

        <div class="form-check form-check-inline">
            <input type="checkbox" class="form-check-input" name="model" id="model" value="1">
            <label for="model" class="form-check-label">Model</label>
        </div>

        <div class="form-check form-check-inline">
            <input type="checkbox" class="form-check-input" name="parent" id="parent" value="1">
            <label for="parent" class="form-check-label">Parent</label>
        </div>

        <div class="form-group text-center">
            <button type="submit" class="btn btn-primary">Generate</button>
        </div>

    </form>
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            $("#model").on("click",(e)=>{
                if(e.target.checked==true){
                    set_extra_group("model");
                }
                else{
                    clear_extra_group();
                }
            });

            $("#parent").on("click",(e)=>{
                if(e.target.checked==true){
                    set_extra_group("parent");
                }
                else{
                    clear_extra_group();
                }
            });

            function set_extra_group(name){
                let extra= $(".extra-form-group");
                let label= $(".extra-form-group label");
                let input= $(".extra-form-group input");
                input.val("");
                label.html(name+" name");
                extra.removeClass("d-none");
            }

            function clear_extra_group(){
                let extra= $(".extra-form-group");
                let label= $(".extra-form-group label");
                let input= $(".extra-form-group input");
                input.val("");
                label.html("");
                if(!extra.hasClass("d-none")){
                    extra.addClass("d-none");
                }
            }
        });
    </script>
@endsection