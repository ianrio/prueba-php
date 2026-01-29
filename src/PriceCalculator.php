<?php

class PriceCalculator
{
    public function calculateTotal(Order $order): float
    {
        $total = 0;

        foreach ($order->getItems() as $item) {
            // BUG: no se está teniendo en cuenta la cantidad real
            $total += $item['price'] * $item['quantity'];
        }

        $discount = $order->getDiscountPercent();
        if ($discount > 0) {
            $total = $order->isGuest()
                ? $total - ($total * ($discount / 100))
                : ($total - ($total * ($discount / 100))) * 0.95;
        }
        return round($total, 2);
    }
}
