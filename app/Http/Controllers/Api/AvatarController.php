<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use F9Web\ApiResponseHelpers;
use App\Http\Controllers\Controller;
use App\Services\AvatarGenerator;
use Illuminate\Support\Facades\Validator;

class AvatarController extends Controller
{
    use ApiResponseHelpers;


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
        // // $this->validate($request, [
        // //     'size' => 'integer|max:960',
        // //     'name' => 'sometimes|regex:/^[A-Za-z ]*$/|min:2',
        // //     'bgcolor' => ['regex: /^([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$/'],
        // //     'text_color' => ['regex: /^([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$/']
        // // ]);

        $name = $request->query('name', 'John Doe');
        $background_color = $request->query('bgcolor', 'random');
        $text_color = $request->query('color', 'fafafa');
        $shape = $request->query('shape', 'circle');
        $size = $request->query('size', 260);
        $image =  new AvatarGenerator(name: $name, background_color:$background_color, text_color:$text_color, shape:$shape, size:$size);
        return $image->generate();
    }
}
