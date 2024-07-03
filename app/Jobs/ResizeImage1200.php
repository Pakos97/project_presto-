<?php

namespace App\Jobs;

use Spatie\Image\Image;
use Spatie\Image\Enums\Unit;

use Illuminate\Bus\Queueable;
use Spatie\Image\Enums\CropPosition;
use Spatie\Image\Enums\AlignPosition;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ResizeImage1200 implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    private $w, $h, $fileName, $path;


    public function __construct($filePath, $w, $h)
    {

        $this->path = dirname($filePath);
        $this->fileName = basename($filePath);
        $this->w = $w;
        $this->h = $h;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $w = $this->w;
$h = $this->h;
$srcPath = storage_path() . '/app/public/' . $this->path . '/' . $this->fileName;
$destPath = storage_path() . '/app/public/' . $this->path . "/crop_{$w}x{$h}_" . $this->fileName;

Image::load ($srcPath)
->crop($w, $h, CropPosition::Center)
->watermark( 
    base_path('public/img/logobarra.png'),
    width: 100,
    height: 100,
    paddingX: 0,
    paddingY: 0,
    paddingUnit: Unit::Percent,
    position: AlignPosition::Center,
    alpha: 50,

)
->save($destPath);


    }
}