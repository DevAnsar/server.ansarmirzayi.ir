<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BlogCollection;
use App\Http\Resources\BlogResource;
use App\Models\Blog;
use App\Models\Resume;
use App\Models\Setting;
use Illuminate\Http\Request;

class IndexController extends Controller
{

    public function index(){

        try{
            $jobs=Resume::orderBy('queue','asc')
                ->select(['title','image','description','url','domain'])
                ->limit(4)
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

    public function get_top_blogs(){

        try{
            $top_blogs=Blog::query()->orderBy('viewCount','desc')
                ->limit(4)
            ->get();

            return response()->json([
                'status'=>true,
                'top_blogs'=>new BlogCollection($top_blogs)
            ]);
        }catch (\Exception $e){
            return response()->json([
                'status'=>false,
                'e'=>$e,
                'message'=>'خطایی رخ داد. کمی بعد دوباره امتحان کنید'
            ]);
        }

    }
    public function get_blogs(){

        try{
            $blogs=Blog::query()->latest()
            ->get();

            return response()->json([
                'status'=>true,
                'blogs'=>new BlogCollection($blogs)
            ]);
        }catch (\Exception $e){
            return response()->json([
                'status'=>false,
                'e'=>$e,
                'message'=>'خطایی رخ داد. کمی بعد دوباره امتحان کنید'
            ]);
        }

    }

    public function get_blog($slug){

        try{


            $blog=Blog::query()->where('slug','=',$slug)
                ->first();

            return response()->json([
                'status'=>true,
                'blog'=>new BlogResource($blog)
            ]);
        }catch (\Exception $e){
            return response()->json([
                'status'=>false,
                'e'=>$e,
                'message'=>'خطایی رخ داد. کمی بعد دوباره امتحان کنید'
            ]);
        }

    }
}
