<?php

declare(strict_types=1);

namespace App\Functions;

use DI\Attribute\Inject;
use Twig\Markup;

class Analytics extends ViewFunction
{
    public string $name = 'analytics';

    #[Inject('files_path')]
    private string $filesPath;

    #[Inject('analytics_file')]
    private string $analyticsFile;

    /** Get the contents of the .analytics file. */
    public function __invoke(): Markup
    {
        $analyticsFile = $this->filesPath . '/' . $this->analyticsFile;

        if (! is_file($analyticsFile)) {
            return new Markup('', 'UTF-8');
        }

        $analytics = trim((string) file_get_contents($analyticsFile));

        return new Markup($analytics, 'UTF-8');
    }
}
