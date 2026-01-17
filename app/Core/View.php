<?php

namespace App\Core;

class View
{
    protected static string $viewsPath = __DIR__ . '/../Views';
    protected static string $cachePath = __DIR__ . '/../../storage/cache/views';
    protected static array $sections = [];
    protected static ?string $extends = null;

    public static function render(string $template, array $data = []): void
    {
        self::$sections = [];
        self::$extends = null;

        if (!is_dir(self::$cachePath)) {
            mkdir(self::$cachePath, 0777, true);
        }

        $__data = $data;

        $compiled = self::getCompiledPath($template);
        $viewFile = self::getViewFile($template);

        if (!file_exists($compiled) || filemtime($viewFile) > filemtime($compiled)) {
            $content = self::compileView($template);
            file_put_contents($compiled, $content);
        }

        ob_start();
        try {
          // Récupère le contenu compilé
$compiledContent = file_get_contents($compiled);

// Prépare les variables
extract($__data, EXTR_SKIP);

// Exécute le code compilé
eval('?>' . $compiledContent);


        } catch (\Throwable $e) {
            ob_end_clean();
            throw $e;
        }
        echo ob_get_clean();
    }


    protected static function getViewFile(string $template): string
    {
        return self::$viewsPath . '/' . str_replace('.', '/', $template) . '.blade.php';
    }

    protected static function getCompiledPath(string $template): string
    {
        $hash = md5(realpath(self::getViewFile($template)));
        return self::$cachePath . '/' . $hash . '.php';
    }

    protected static function compileView(string $template): string
    {
        $viewFile = self::getViewFile($template);
        $content = file_get_contents($viewFile);

        // Extends
        self::$extends = null;
        if (preg_match('/@extends\([\'"](.+?)[\'"]\)/', $content, $m)) {
            self::$extends = $m[1];
            $content = preg_replace('/@extends\([\'"].+?[\'"]\)/', '', $content, 1);
        }

        // Sections enfant
        $childSections = self::extractSections($content);

        if (self::$extends) {
            $parentFile = self::getViewFile(self::$extends);
            $parentContent = file_get_contents($parentFile);
            $parentSections = self::extractSections($parentContent);
            $sections = array_merge($parentSections, $childSections);
            $content = self::injectSections($parentContent, $sections);
        } else {
            $content = self::stripSections($content);
        }

        // Includes récursifs
        $content = self::compileIncludes($content);

        // Compiler les echos et directives avec l'ancien système StoneFw
        $content = self::compileInline($content);

        // Préparer $__sections
        return "<?php \$__sections = \$__sections ?? []; ?>\n" . $content;
    }

    protected static function extractSections(string $content): array
    {
        $sections = [];
        if (preg_match_all('/@section\([\'"](.+?)[\'"]\)(.*?)@endsection/s', $content, $matches, PREG_SET_ORDER)) {
            foreach ($matches as $m) {
                $sections[$m[1]] = self::compileInline($m[2]);
            }
        }
        return $sections;
    }

    protected static function injectSections(string $parentContent, array $sections): string
    {
        $result = preg_replace_callback('/@yield\([\'"](.+?)[\'"]\)/', function ($m) use ($sections) {
            return $sections[$m[1]] ?? '';
        }, $parentContent);

        $result = preg_replace('/@section\([\'"].+?[\'"]\).*?@endsection/s', '', $result);
        return $result;
    }

    protected static function stripSections(string $content): string
    {
        return preg_replace('/@section\([\'"].+?[\'"]\).*?@endsection/s', '', $content);
    }

    protected static function compileIncludes(string $content): string
    {
        return preg_replace_callback('/@include\([\'"](.+?)[\'"]\)/', function ($m) {
            $incFile = self::getViewFile($m[1]);
            if (!file_exists($incFile)) {
                return '';
            }
            $incContent = file_get_contents($incFile);

            // Extraire toutes les variables actuelles
            return '<?php $__data = get_defined_vars(); extract($__data); ?>' . self::compileInline($incContent);
        }, $content);
    }

    protected static function compileInline(string $content): string
    {
        // ✅ Raw echo
        $content = preg_replace_callback('/\{!!\s*(.+?)\s*!!\}/s', function ($m) {
            return '<?php echo ' . $m[1] . '; ?>';
        }, $content);

        // ✅ Escaped echo
        $content = preg_replace_callback('/\{\{\s*(.+?)\s*\}\}/s', function ($m) {
            return '<?php echo htmlspecialchars(' . $m[1] . ', ENT_QUOTES, "UTF-8"); ?>';
        }, $content);

        // ✅ Directives StoneFw
        $directives = [
            '/@if\s*\((.+?)\)/' => '<?php if ($1): ?>',
            '/@elseif\s*\((.+?)\)/' => '<?php elseif ($1): ?>',
            '/@else\b/' => '<?php else: ?>',
            '/@endif\b/' => '<?php endif; ?>',
            '/@foreach\s*\((.+?)\)/' => '<?php foreach ($1): ?>',
            '/@endforeach\b/' => '<?php endforeach; ?>',
            '/@for\s*\((.+?)\)/' => '<?php for ($1): ?>',
            '/@endfor\b/' => '<?php endfor; ?>',
            '/@while\s*\((.+?)\)/' => '<?php while ($1): ?>',
            '/@endwhile\b/' => '<?php endwhile; ?>',
        ];

        foreach ($directives as $pattern => $replacement) {
            $content = preg_replace($pattern, $replacement, $content);
        }

        return $content;
    }
}
