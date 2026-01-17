<?php

namespace App\Core;

class Helpers
{
    public static function ensureDir(string $path): void
    {
        // Tenter de créer le dossier silencieusement
        @mkdir($path, 0777, true);

        // Vérifier si le dossier existe maintenant
        if (!is_dir($path)) {
            throw new \UnexpectedValueException("Impossible de créer le dossier : $path");
        }
    }
}
