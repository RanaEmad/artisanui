<?php
namespace REM\ArtisanUi\Controllers;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Support\Facades\Artisan;

use Illuminate\Http\Request;

class MigrationsController extends Controller
{
    public function index(){
        return view("artisanui::migration");
    }

    public function generate(Request $request){
        $attributes=$request->validate([
            "name"=>"required"
        ]);
        $attributes=$this->checkExistence($attributes,"create");
        $attributes=$this->checkExistence($attributes,"table");
        
        try{
            Artisan::call("make:migration",$attributes);
            return redirect()->back()->with("status","Generated Successfully!");
        }
        catch( Exception $e){
            return redirect()->back()->with("error",$e->getMessage());
        }
    }

    protected function checkExistence($attributes,$attribute){
        $value= request()->{$attribute};
        if($value){
            if($attribute=="create" || $attribute=="table"){
                $attributes["--$attribute"]=request()->extra_name;
            }
            else{
                $attributes["--$attribute"]=true;
            }
        }
        return $attributes;
    }

}
