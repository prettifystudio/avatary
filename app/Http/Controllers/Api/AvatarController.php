<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\AvatarGenerator;
use App\Services\AvatarService;
use Illuminate\Support\Facades\Validator;

class AvatarController extends Controller
{


    /**
     * Accepts params
     * name:string
     * background color:string
     * text_color: string
     * size:int
     *
     */

    public function initials(Request $request)
    {
        $name = $request->query('name', 'John Doe');
        $background_color = $request->query('bgcolor', 'random');
        $text_color = $request->query('color', 'fafafa');
        $shape = $request->query('shape', 'circle');
        $size = $request->query('size', 260);




        // return (strlen($name));


        $image =  new AvatarService(name: $name, background_color:$background_color, text_color:$text_color, shape:$shape, size:$size);

        return $image->generate();
    }
}
