<?php

namespace Samkhdev\LaraFile;

class LaraUpload
{
    private $data;
    private $names = [];
    public function __construct(array $data)
    {
        $this->data = $data;
    }
    public function send(): array
    {
        foreach ($this->data as $FileInfo) {
            $name = config('lara-file.get-random-code') . '.' . $FileInfo['file']->getClientOriginalExtension();
            $disk = $FileInfo['disk'] ?? config("lara-file.default-disk");
            $dir = $FileInfo['dir'] ?? config("lara-file.default-dir");
            $FileInfo['file']->storeAs($dir, $name, $disk);
            $this->names[$dir] = $name;
        }
        return $this->names;
    }
}
