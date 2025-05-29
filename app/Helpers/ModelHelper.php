<?php

use Illuminate\Support\Facades\File;

if (!function_exists('getAllModels')) {
    function getAllModels($namespace = 'App\\Models', $path = null)
    {
        $path = $path ?? app_path('Models');

        if (!File::exists($path)) {
            return [];
        }

        $files = File::allFiles($path);
        $models = [];

        foreach ($files as $file) {
            $relativePath = $file->getRelativePathname();
            $class = $namespace . '\\' . str_replace(['/', '.php'], ['\\', ''], $relativePath);

            if (class_exists($class) && is_subclass_of($class, \Illuminate\Database\Eloquent\Model::class)) {
                $models[] = $class;
            }
        }

        return $models;
    }
}
