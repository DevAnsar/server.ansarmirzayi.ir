<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function uploadImage($file, $folder)
    {

        $public_images_folder = '/images/' . $folder;
        $base_url = public_path($public_images_folder);
        $file_name = $file->getClientOriginalName();
        $file->move($base_url, $file_name);
        return $public_images_folder . '/' . $file_name;

    }
}
