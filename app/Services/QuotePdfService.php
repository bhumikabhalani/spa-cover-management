<?php

namespace App\Services;

use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Response;

/**
 * Generates PDF quotes for spa cover orders.
 */
class QuotePdfService
{
    public function __construct(
        private readonly SvgGeneratorService $svgGenerator,
    ) {}

    /**
     * Generate a PDF quote for the given order.
     */
    public function generate(Order $order): Response
    {
        $order->load(['customer', 'spaModel']);

        $spaModel = $order->spaModel;
        $svg = $this->svgGenerator->generate(
            $spaModel->width,
            $spaModel->height,
            $spaModel->corner_radius,
            $order->color,
        );

        $pdf = Pdf::loadView('pdf.quote', [
            'order' => $order,
            'customer' => $order->customer,
            'spaModel' => $spaModel,
            'svg' => $svg,
        ])->setPaper('a4');

        $filename = sprintf('quote-order-%d.pdf', $order->id);

        return $pdf->download($filename);
    }
}
