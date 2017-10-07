<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function __construct(){
        if(Auth::check() || Auth::guard('admin')->check() || Auth::guard('comp')->check())
            $this->user_in = true;
        else
            $this->user_in = false;
    }

    public function uploadImageCrop($data, $adds_for_name = '', $folder = "/uploads/images/")
    {
        $folder_with_public = public_path() . $folder;
        
        list($type, $data) = explode(';', $data);
        list(, $data)      = explode(',', $data);

        $data = base64_decode($data);
        $image_name = time() . $adds_for_name . '.jpg';
        $path = $folder_with_public . $image_name;

        file_put_contents($path, $data);

        return (object) [
            "success" => true,
            "image_name" => $folder . $image_name
        ];
    }
}
