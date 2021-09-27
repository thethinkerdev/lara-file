<?php

use Ramsey\Uuid\Uuid;

return [
    "default-disk" => "public",
    "default-dir" => "lara-file",
    "get-random-code" => Uuid::uuid4()->toString()
];
