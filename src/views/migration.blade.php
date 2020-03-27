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

<h3 class="mb-4 text-secondary">Generate Migration</h3>
    <form action="/artisanui/migrations" method="POST">
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
            <input class="form-check-input" type="checkbox" name="create" id="create" value="1"/>
            <label for="create" class="form-check-label">Create</label>
        </div>

        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="table" id="table" value="1"/>
            <label for="table" class="form-check-label">Table</label>
        </div>

        <div class="form-group text-center">
            <button type="submit" class="btn btn-primary">Generate</button>
        </div>

    </form>
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            $("#create").on("click",(e)=>{
                if(e.target.checked==true){
                    set_extra_group("create");
                }
                else{
                    clear_extra_group();
                }
            });

            $("#table").on("click",(e)=>{
                if(e.target.checked==true){
                    set_extra_group("table");
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