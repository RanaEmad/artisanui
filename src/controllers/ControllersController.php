<?php
namespace REM\ArtisanUi\Controllers;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Support\Facades\Artisan;

use Illuminate\Http\Request;

class ControllersController extends Controller
{
    public function index(){
        return view("artisanui::controller");
    }

    public function generate(Request $request){
        $attributes=$request->validate([
            "name"=>"required"
        ]);
        $attributes=$this->checkExistence($attributes,"api");
        $attributes=$this->checkExistence($attributes,"resource");
        $attributes=$this->checkExistence($attributes,"model");  
        $attributes=$this->checkExistence($attributes,"parent");  

        try{
            Artisan::call("make:controller",$attributes);
            return redirect()->back()->with("status","Generated Successfully!");
        }
        catch( Exception $e){
            return redirect()->back()->with("error",$e->getMessage());
        }
    }

    protected function checkExistence($attributes,$attribute){
        $value= request()->{$attribute};
        if($value){
            if($attribute=="model" || $attribute=="parent"){
                $attributes["--$attribute"]=request()->extra_name;
            }
            else{
                $attributes["--$attribute"]=true;
            }
        }
        return $attributes;
    }
}
