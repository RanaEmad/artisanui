<?php
namespace REM\ArtisanUi\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;

use Illuminate\Http\Request;

class FactoriesController extends Controller
{
    public function index(){
        return view("artisanui::factory");
    }

    public function generate(Request $request){
        $attributes=$request->validate([
            "name"=>"required"
        ]);
        $attributes=$this->checkExistence($attributes,"model");  

        Artisan::call("make:factory",$attributes);
        return redirect()->back()->with("status","Generated Successfully!");
    }

    protected function checkExistence($attributes,$attribute){
        $value= request()->{$attribute};
        if($value){
            if($attribute=="model"){
                $attributes["--$attribute"]=request()->extra_name;
            }
            else{
                $attributes["--$attribute"]=true;
            }
        }
        return $attributes;
    }
}
