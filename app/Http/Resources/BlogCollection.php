<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\ResourceCollection;

class BlogCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return $this->collection->map(function ($item){
            $data = [
                'id'=>$item->id,
                'writer'=>$item->user ? new UserResource($item->user) : null,
                'title'=>$item->title,
                'category'=>null,
                'slug'=>$item->slug,
                'description'=>$item->description,
                'image'=>$item->image,
                'date'=>Carbon::createFromTimestamp($item->created_at)->diffForHumans(),
                'viewCount'=>$item->viewCount,
                'likeCount'=>$item->likeCount,
                'commentCount'=>$item->commentCount,
            ];
            $data=array_merge($data,[
                'body'=>$item->body,
            ]);

            return $data;
        });
    }
}
