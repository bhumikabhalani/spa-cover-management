<?php

namespace App\Services;

/**
 * Generates SVG representations of spa covers.
 */
class SvgGeneratorService
{
    /**
     * Generate an SVG string for a spa cover with the given dimensions and color.
     */
    public function generate(int $width, int $height, int $cornerRadius, string $color): string
    {
        $safeColor = htmlspecialchars($color, ENT_QUOTES, 'UTF-8');
        $viewBoxWidth = max($width, 1);
        $viewBoxHeight = max($height, 1);
        $radius = min($cornerRadius, (int) floor(min($width, $height) / 2));

        return sprintf(
            '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 %d %d" preserveAspectRatio="xMidYMid meet" class="spa-cover-svg">
                <rect x="0" y="0" width="%d" height="%d" rx="%d" ry="%d" fill="%s" stroke="#374151" stroke-width="2"/>
            </svg>',
            $viewBoxWidth,
            $viewBoxHeight,
            $viewBoxWidth,
            $viewBoxHeight,
            $radius,
            $radius,
            $safeColor,
        );
    }
}
