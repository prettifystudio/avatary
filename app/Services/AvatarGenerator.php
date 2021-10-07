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
        public ?string $name ="John Doe",
        public ?string $background_color = "f44336",
        public ?string $text_color ="fafafa",
        public ?string $shape ="circle",
        public mixed $size = 150,
    ) {
    }

    public function generateBackgroundColor()
    {
        if (! ColorPicker::check($this->background_color)) {
            return ColorPicker::pick();
        }

        if ($this->background_color === 'random' || is_null($this->background_color)) {
            return ColorPicker::pick();
        }
        return $this->background_color;
    }



    private function getTextColor()
    {
        if (!ColorPicker::check($this->text_color)) {
            return "fafafa";
        }
        return $this->text_color;
    }


    private function getName()
    {
        if (strlen($this->name) < 2 || strlen($this->name) === 0) {
            return Initials::generate('John Doe');
        }

        if (preg_match('/\p{Arabic}/u', $this->name)) {
            return mb_strrev(Initials::generate($this->name));
        }

        return Initials::generate($this->name);
    }




    private function getSize()
    {
        if (is_null($this->size) || ($this->size > 512) || $this->size < 50) {
            return 150;
        }
        return $this->size;
    }









    private function getShape()
    {
        if ($this->shape === 'rectangle') {
            return $this->drawrRectangleShape();
        } else {
            return $this->drawrCircleShape();
        }
    }

    private function initCanvas(): ImageCanvas
    {
        return Image::canvas($this->getSize() * 2 + 6, $this->getSize() * 2 + 6);
    }



    private function drawrRectangleShape(): ImageCanvas
    {
        $canvas = $this->initCanvas();
        $canvas->rectangle(0, 0, $this->getSize() * 2 + 6, $this->getSize() * 2 + 6, function (RectangleShape $draw) {
            $draw->background($this->generateBackgroundColor());
        });

        return $canvas;
    }

    private function drawrCircleShape(): ImageCanvas
    {
        $canvas = $this->initCanvas();
        $canvas->circle($this->getSize()*2, $this->getSize() + 3, $this->getSize() + 3, function (CircleShape $draw) {
            $draw->background($this->generateBackgroundColor());
        });

        return $canvas;
    }

    private function getText(ImageCanvas $canvas)
    {
        $canvas->text($this->getName(), $this->getSize(), $this->getSize(), function (Font $font) {
            $font->file(public_path('/Cairo-Light.ttf'));
            $font->size($this->getSize());
            $font->color($this->getTextColor());
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
        $canvas->resize($this->getSize(), $this->getSize());
        return $canvas->response('png');
    }
}
