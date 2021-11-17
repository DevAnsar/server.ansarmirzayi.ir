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
                ->take(3)->get();

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
    public function all_jobs(){

        try{
            $jobs=Resume::orderBy('queue','asc')
                ->select(['title','image','description','url','domain'])
                ->get();

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
