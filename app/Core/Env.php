<?php

namespace App\Core;

class Env
{
    protected static array $vars = [];

    public static function load(string $file): void
    {
        if (!file_exists($file)) return;

        $lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {
            if (str_starts_with(trim($line), '#')) continue; // commentaire
            [$key, $value] = explode('=', $line, 2) + [null, null];
            if ($key) self::$vars[trim($key)] = trim($value);
        }
    }

    public static function get(string $key, $default = null)
    {
        return self::$vars[$key] ?? $default;
    }
}
