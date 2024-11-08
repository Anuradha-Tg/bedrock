<?php

namespace App\Helpers;

use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Support\Facades\Storage;

class StorageHelper
{

    private $file;
    private $imageName;
    private $folder;
    private $location;

    public function __construct($folder, $imageName, $file = null)
    {
        $this->folder = $folder;
        $this->imageName = $imageName;
        $this->file = $file;
        $this->location = 'public';
    }

    public function uploadImage(): string
    {
        $imagePath = $this->folder . '/' . $this->imageName;
        Storage::disk($this->location)->put($imagePath, file_get_contents($this->file));
        return Storage::disk($this->location)->url($imagePath);
    }

    public function deleteImage()
    {
        $path = $this->folder . '/' . $this->imageName;
        Storage::disk($this->location)->delete($path);
    }

    public function getUrl(): string
    {
        $imagePath = $this->folder . '/' . $this->imageName;
        return Storage::disk($this->location)->url($imagePath);
    }

    /**
     * @throws FileNotFoundException
     */
    public function getFile(): string
    {
        $imagePath = $this->folder . '/' . $this->imageName;
        return Storage::disk($this->location)->get($imagePath);
    }
}
