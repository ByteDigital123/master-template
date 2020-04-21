<?php

namespace App\Services;

use Carbon\Carbon;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class ImageFileService
{
    protected $img;
    protected $file;
    protected $sanitized_file_name;
    protected $required_width = 2000;
    protected $required_height = 1125;

    public function __construct($file)
    {
        $this->file = $file;
    }

    public function handle()
    {
        $mime_type = $this->file->getMimeType();
        $name = $this->getFileName();
        $extension = $this->getFileExtension();
        $this->sanitized_file_name = (new SanitizeFileName())->handle($name) . '_' . time() . '.' . $extension;

        $this->img = Image::make($this->file);
        $this->cropImageDependingOnOrientation();
        $this->storeFile();

        return [
            'bytes' => filesize($this->file),
            'format' => $mime_type,
            'original_filename' => $this->sanitized_file_name,
            'url' => Storage::disk('image')->url($this->sanitized_file_name),
            'secure_url' => Storage::disk('image')->url($this->sanitized_file_name),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];
    }

    public function storeFile()
    {
        try {
            $name = Storage::disk('image')->put($this->sanitized_file_name, $this->img);
        } catch (\Exception $e) {
            abort(500, $e->getMessage());
        }
    }

    public function cropImageDependingOnOrientation()
    {
        list($img_width, $img_height) = getimagesize($this->file);

        if ($img_width > $img_height) {
            $orientation = 'landscape';
        } else {
            $orientation = 'portrait';
        }

        switch ($orientation) {
            case 'landscape':
                $this->img->resize(1280, 720, function ($c) {
                    $c->aspectRatio();
                    $c->upsize();
                })->encode('jpg', 90);
            break;

            case 'portrait':
                $this->img->resize(720, 1280, function ($c) {
                    $c->aspectRatio();
                    $c->upsize();
                })->encode('jpg', 90);
            break;

            default:
                 $this->img->resize(720, 1280, function ($c) {
                     $c->aspectRatio();
                     $c->upsize();
                 })->encode('jpg', 90);
            break;
        };
    }

    public function getFileExtension()
    {
        return pathinfo($this->file->getClientOriginalName(), PATHINFO_EXTENSION);
    }

    public function getFileName()
    {
        return pathinfo($this->file->getClientOriginalName(), PATHINFO_FILENAME);
    }

    public function removeFile()
    {
    }
}
