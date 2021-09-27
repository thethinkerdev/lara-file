# Intro
>This package helps you, in addition to uploading multiple files for each file, specify which **disk** it should be on or which folder it should be in.

- The Package `ramsey/uuid` is used to hash file names.

## Usage

* Example
- Simple Uploading
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

## Config
- to change default config run this command

```bash
pa vendor:publish
```
- one file named **laraFile.php** in config directory will create
