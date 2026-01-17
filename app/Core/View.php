<?php

namespace App\Core;

class View
{
    protected static string $viewsPath = __DIR__ . '/../Views/';
    protected static array $sections = [];
    protected static ?string $extends = null;

    public static function render(string $view, array $data = []): void
    {
        self::$sections = [];
        self::$extends = null;

        extract($data);

        // Compile la vue enfant
        $content = self::compileView($view);

        // Si layout
        if (self::$extends) {
            $layoutContent = self::compileView(self::$extends);
            eval('?>' . $layoutContent);
            return;
        }

        // Vue simple
        eval('?>' . $content);
    }

    protected static function compileView(string $view): string
    {
        $viewFile = self::$viewsPath . str_replace('.', '/', $view) . '.blade.php';

        if (!file_exists($viewFile)) {
            throw new \UnexpectedValueException("View [$view] not found");
        }

        $content = file_get_contents($viewFile);

        // @extends
        $content = preg_replace_callback(
            '/@extends\([\'"](.+)[\'"]\)/',
            function ($m) {
                self::$extends = $m[1];
                return '';
            },
            $content
        );

        // @section
        $content = preg_replace_callback(
            '/@section\([\'"](.+)[\'"]\)(.*?)@endsection/s',
            function ($m) {
                self::$sections[$m[1]] = $m[2];
                return '';
            },
            $content
        );

        // @yield
        $content = preg_replace_callback(
            '/@yield\([\'"](.+)[\'"]\)/',
            fn ($m) => self::$sections[$m[1]] ?? '',
            $content
        );

        // {{ ... }}
        $content = preg_replace(
            '/{{\s*(.+?)\s*}}/',
            '<?= htmlspecialchars($1, ENT_QUOTES, "UTF-8") ?>',
            $content
        );

        return $content;
    }
}
