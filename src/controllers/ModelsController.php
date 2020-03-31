<?php
namespace REM\ArtisanUi\Controllers;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Support\Facades\Artisan;

use Illuminate\Http\Request;

class ModelsController extends Controller
{
    public function index(){
        return view("artisanui::model");
    }

    public function generate(Request $request){
        $attributes=$request->validate([
            "name"=>"required"
        ]);
        $attributes=$this->checkExistence($attributes,"all");
        $attributes=$this->checkExistence($attributes,"controller");
        $attributes=$this->checkExistence($attributes,"factory");  
        $attributes=$this->checkExistence($attributes,"migration");  
        $attributes=$this->checkExistence($attributes,"seed");  

        try{
            Artisan::call("make:model",$attributes);
            return redirect()->back()->with("status","Generated Successfully!");
        }
        catch( Exception $e){
            return redirect()->back()->with("error",$e->getMessage());
        }
    }

    protected function checkExistence($attributes,$attribute){
        $value= request()->{$attribute};
        if($value){
            $attributes["--$attribute"]=true;
        }
        return $attributes;
    }
}
