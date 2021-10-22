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

            $disk = $this->getDisk($FileInfo);
            $dir = $this->getDir($FileInfo);

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

    private function getDisk($FileInfo): string
    {
        return $FileInfo['disk'] ?? config("lara-file.default-disk");
    }
    private function getDir($FileInfo): string
    {
        return $FileInfo['dir']?? config("lara-file.default-dir");
    }
}
