<?php

namespace Samkhdev\LaraFile;

use Illuminate\Support\Facades\Config;
use Ramsey\Uuid\Uuid;

class LaraUpload
{
    private $data = [];
    private $names = [];
    public $FileName = 'file';

    public function add(array $data)
    {
        array_push($this->data, ...$data);
    }
    public function send(): array
    {
        foreach ($this->data as $FileInfo) {
            $name = $this->hashName($FileInfo['file']);

            $disk = $this->getDisk($FileInfo['disk']);
            $dir = $this->getDir($FileInfo['dir']);

            $FileInfo['file']->storeAs($dir, $name, $disk);
            $this->names[$dir] = $name;
        }
        return $this->names;
    }
    /* Get Random Code for get unqiue name */
    private function getRandomCode(): string
    {
        return Uuid::uuid4()->toString();
    }

    private function hashName($file): string
    {
        return $this->getRandomCode() . '.' . $file->getClientOriginalExtension();
    }

    private function getDisk($file): string
    {
        return $file ?? config("lara-file.default-disk");
    }
    private function getDir($file): string
    {
        return $file ?? config("lara-file.default-dir");
    }
}
