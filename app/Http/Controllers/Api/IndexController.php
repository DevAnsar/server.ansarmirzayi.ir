<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Resume;
use App\Models\Setting;
use Illuminate\Http\Request;

class IndexController extends Controller
{

    public function index(){

        try{
            $jobs=Resume::orderBy('queue','asc')
                ->select(['title','image','description','url','domain'])
                ->get();

            $contents=Setting::pluck('value','key');

            return response()->json([
                'status'=>true,
                'contents'=>$contents,
                'jobs'=>$jobs,
            ]);
        }catch (\Exception $e){
            return response()->json([
                'status'=>false,
                'message'=>'خطایی رخ داد. کمی بعد دوباره امتحان کنید'
            ]);
        }

    }
    public function jobs(Request $request){

        try{

            $jobs=Resume::orderBy('queue','asc')
                ->select(['title','image','description','url','domain'])
                ->paginate(4);

            return response()->json([
                'status'=>true,
                'jobs'=>$jobs
            ]);
        }catch (\Exception $e){
            return response()->json([
                'status'=>false,
                'message'=>'خطایی رخ داد. کمی بعد دوباره امتحان کنید'
            ]);
        }

    }
}
