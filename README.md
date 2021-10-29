# Intro

> This package helps you, in addition to uploading multiple files for each file, specify which **disk** it should be on or which folder it should be in.

- The Package `ramsey/uuid` is used to hash file names.

# Installation

```bash
composer require samankhdev/lara-file
```

# Version `2`

- Example

## Single upload file

```php
    $laraFile = new LaraUpload();
    $laraFile->push($request->img, "products/img");
    $laraFile->send();
```

#tips

1. first param is your **file**
2. second param is location of this file
3. and last param choose **disk** default is `public` and optional
4. for example =>`products/img` will be in `public/products/img` in -> **storage**
5. the result of **push** method is `boolean`

## Multiple upload files

```php
    $laraFile = new LaraUpload();
    $laraFile->pushMany([
            [
                'dir'=>'images',
                'file'=>$request->file,
                'disk'=>'privateImages' //default is `public`
            ],...
    ]);
        $laraFile->send();
```

# Config

- to change default -> default disk and default directory

```bash
pa vendor:publish
```

- now you can see a file named **laraFile.php** in config directory .

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
