<?php

namespace Tests\Unit;

use App\Services\SvgGeneratorService;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class SvgGeneratorServiceTest extends TestCase
{
    #[Test]
    public function it_generates_svg_with_rect_and_rounded_corners(): void
    {
        $service = new SvgGeneratorService;

        $svg = $service->generate(800, 600, 40, '#ff0000');

        $this->assertStringContainsString('<svg', $svg);
        $this->assertStringContainsString('<rect', $svg);
        $this->assertStringContainsString('viewBox="0 0 800 600"', $svg);
        $this->assertStringContainsString('rx="40"', $svg);
        $this->assertStringContainsString('ry="40"', $svg);
        $this->assertStringContainsString('fill="#ff0000"', $svg);
        $this->assertStringContainsString('class="spa-cover-svg"', $svg);
    }

    #[Test]
    public function it_escapes_color_values(): void
    {
        $service = new SvgGeneratorService;

        $svg = $service->generate(100, 100, 0, '"><script>');

        $this->assertStringNotContainsString('"><script>', $svg);
        $this->assertStringContainsString('fill="&quot;&gt;&lt;script&gt;"', $svg);
    }
}
