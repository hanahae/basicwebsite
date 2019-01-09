<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GraphChart;
use App\datatrobule;

class PagesController extends Controller
{
    public function getHome(){
      return view('home');
    }

    public function getAbout(){
      return view('about');
    }

    public function getContact(){
      return view('contact');
    }

    public function getGameSnake(){
      return view('games.snake');
    }

    public function getDataGraph(){
//      $graph = GraphChart::all();

  //    return view('about')->with('about',$graph);

      $result = GraphChart::all();
      return response()->json($result);
    }
    public function getCountNmserver(){
      $result = datatrobule::all();
       //\DB::table('datatrobules')
                 //->select('nmserver', DB::raw('count(*) as total'))
                 //->groupBy('nmserver')
                 //->get();
              //   echo $result;
              //datatrobule::all();
      return response()->json($result);
    }

}
