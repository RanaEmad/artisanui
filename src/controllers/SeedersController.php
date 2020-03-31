<?php
namespace REM\ArtisanUi\Controllers;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Support\Facades\Artisan;

use Illuminate\Http\Request;

class SeedersController extends Controller
{
    public function index(){
        return view("artisanui::seeder");
    }

    public function generate(Request $request){
        $attributes=$request->validate([
            "name"=>"required"
        ]);
        try{
            Artisan::call("make:seeder",$attributes);
            return redirect()->back()->with("status","Generated Successfully!");
        }
        catch( Exception $e){
            return redirect()->back()->with("error",$e->getMessage());
        }
    }
}
