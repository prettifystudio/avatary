<?php

namespace App\Services;

use Illuminate\Support\Str;
use App\Service\ColorPicker;
use Intervention\Image\Gd\Font;
use Intervention\Image\Facades\Image;
use Intervention\Image\Image as ImageCanvas;
use Intervention\Image\Gd\Shapes\CircleShape;
use Intervention\Image\Gd\Shapes\RectangleShape;

class AvatarGenerator
{
    public function __construct(
        public string $name,
        public string $background_color = "f44336",
        public string $text_color ="fafafa",
        public string $shape ="circle",
        public int $size = 150,
    ) {
        

    }

    public function generateColor()
    {
        $this->background_color !== 'random' ?: $this->background_color = ColorPicker::pick()  ;
        return $this->background_color;
    }


    private function getName()
    {
        if(strlen($this->name) < 2){
            return Initials::generate('John Doe');
        }
    
        return Initials::generate($this->name);
    }


    private function initCanvas(): ImageCanvas
    {
        return Image::canvas($this->size * 2 + 6, $this->size * 2 + 6);
    }


    private function getShape()
    {
        if($this->shape === 'circle'){
            return $this->drawrCircleShape();
        }else{
            return $this->drawrRectangleShape();
        }
    }


    private function drawrRectangleShape(): ImageCanvas
    {
        $canvas = $this->initCanvas();
        $canvas->rectangle(0,0, $this->size * 2 + 6, $this->size * 2 + 6, function (RectangleShape $draw) {
            $draw->background($this->generateColor());
        });

        return $canvas;
    }

    private function drawrCircleShape(): ImageCanvas
    {
        $canvas = $this->initCanvas();
        $canvas->circle($this->size*2, $this->size + 3, $this->size + 3, function (CircleShape $draw) {
            $draw->background($this->generateColor());
        });

        return $canvas;
    }

    private function getText(ImageCanvas $canvas)
    {
        $canvas->text($this->getName(), $this->size, $this->size, function (Font $font) {
            $font->file(public_path('/Roboto-Regular.ttf'));
            $font->size($this->size);
            $font->color($this->text_color);
            $font->valign('middle');
            $font->align('center');
            $font->angle(360);

        });

        return $canvas;
    }


    private function drawText()
    {
        $canvas = $this->getShape();
        $canvas = $this->getText($canvas);
        return $canvas;
    }

    

    public function generate()
    {
        $canvas = $this->drawText();
        $canvas->resize($this->size, $this->size);
        return $canvas->response('png');
    }
}
