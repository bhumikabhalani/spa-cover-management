<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Services\QuotePdfService;
use Illuminate\Http\Response;

class OrderQuoteController extends Controller
{
    public function __construct(
        private readonly QuotePdfService $quotePdfService,
    ) {}

    public function download(Order $order): Response
    {
        $this->authorize('view', $order);

        return $this->quotePdfService->generate($order);
    }
}
