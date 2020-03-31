<?php
namespace REM\ArtisanUi\Controllers;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Support\Facades\Artisan;

use Illuminate\Http\Request;

class TestsController extends Controller
{
    public function index(){
        return view("artisanui::test");
    }

    public function generate(Request $request){
        $attributes=$request->validate([
            "name"=>"required"
        ]);
        $attributes=$this->checkExistence($attributes,"unit");  

        try{
            Artisan::call("make:test",$attributes);
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
