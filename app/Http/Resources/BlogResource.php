<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class BlogResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'writer'=>$this->user ? new UserResource($this->user) : null,
            'body'=>$this->body,
            'title'=>$this->title,
            'category'=>null,
            'slug'=>$this->slug,
            'description'=>$this->description,
            'image'=>$this->image,
            'date'=>Carbon::createFromTimestamp($this->created_at)->diffForHumans(),
            'viewCount'=>$this->viewCount,
            'likeCount'=>$this->likeCount,
            'commentCount'=>$this->commentCount,
        ];
    }
}
