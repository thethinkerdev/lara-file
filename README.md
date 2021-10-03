# Intro

> This package helps you, in addition to uploading multiple files for each file, specify which **disk** it should be on or which folder it should be in.

- The Package `ramsey/uuid` is used to hash file names.

# Version `2`

- Example

* Simple Uploading

```php
  $lara = new LaraUpload(
        [
            [
                'dir'=>'images',
                'file'=>$request->file,
                'disk'=>'public'
            ]
        ]
    );
    $lara->send();
```

- `dir` : you can choose your file where be should in `storage`, in top example I upload in `storage/app/public/images`
- `file` : you should give it your file.
- `disk` : you can choose on of your disks in `filesystem.php` in config directory.

## Multiple-Upload

- you can easily upload multiple files

```php
$lara = new LaraUpload(
        [
            [
                'dir'=>'images',
                'file'=>$request->file,
                'disk'=>'privateImages'
            ],
            [
                'dir'=>"pictures",
                'file'=>$request->file,
                'disk'=>'public'
            ],
            ...
        ]
    );
```


# Config

- to change default config run this command

```bash
pa vendor:publish
```

- one file named **laraFile.php** in config directory will create



# Version `1`

## Usage

- Example

* Simple Uploading

```php
    $files = [];
    foreach ($request->file as $file) {
        array_push($files, [
            "file" => $file
        ]);
    }

    $lara = new LaraUpload($files);
    $lara->send();
```

- In this example I want Upload my files in `public/images/`

```php
    $files = [];
    foreach ($request->file as $file) {
        array_push($files, [
            'dir'=>'images',
            "file" => $file
        ]);
    }

    $lara = new LaraUpload($files);
    $lara->send();
```

- In Another example I change **disk**

```php
    $files = [];
    foreach ($request->file as $file) {
        array_push($files, [
            'dir'=>'images',
            'disk'=>'PrivateFiles',
            "file" => $file
        ]);
    }

    $lara = new LaraUpload($files);
    $lara->send();
```