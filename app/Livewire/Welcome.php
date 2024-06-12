<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\profiles;
use Livewire\WithFileUploads;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class Welcome extends Component
{
    use WithFileUploads;


    public $imageInput;
    public $asciiOutput;

    public function convertToAscii()
    {
        $this->validate([
            'imageInput' => 'image',
        ]);

        $path = $this->imageInput->getRealPath();
        $this->asciiOutput = $this->imageToAscii($path);
    }

    public function imageToAscii($imagePath, $scaleFactor = 0.2)
    {
        $characters = ['@', '#', 's', '%', '?', '*', '+', ';', ':', ',', '.'];
        //$characters = ['9', '8', '7', '6', '5', '4', '3', '2', '1', '0', '.'];
        $image = imagecreatefromstring(file_get_contents($imagePath));
        $width = imagesx($image);
        $height = imagesy($image);

        $output = '';
        for ($y = 0; $y < $height; $y += 6) {
            for ($x = 0; $x < $width; $x += 3) {
                $color = imagecolorat($image, $x, $y);
                $rgba = imagecolorsforindex($image, $color);
                $brightness = intval(($rgba['red'] + $rgba['green'] + $rgba['blue']) / 3);
                $charIndex = intval($brightness / 25.5);
                $output .= $characters[$charIndex];
            }
            $output .= PHP_EOL;
        }
        return $output;
    }

    public function render()
    {
        return view('livewire.welcome');
    }
}
