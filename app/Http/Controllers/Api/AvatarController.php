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


    public function initials(Request $request)
    {
        // // $this->validate($request, [
        // //     'size' => 'integer|max:960',
        // //     'name' => 'sometimes|regex:/^[A-Za-z ]*$/|min:2',
        // //     'bgcolor' => ['regex: /^([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$/'],
        // //     'text_color' => ['regex: /^([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$/']
        // // ]);
        $image =  AvatarGenerator::make(...$request->query());
        return ddd($image);

    }
}
