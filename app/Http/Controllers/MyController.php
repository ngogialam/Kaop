<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use DB;
use App\test;
class MyController extends Controller
{
 
    public function getCatagory(Request $request){
        $data = new test;
        $data->cat_name = $request->catagory;
        $data->save();
    }
}