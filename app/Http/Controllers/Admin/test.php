<?php
class Order
{
    public function calculate($orderId)
    {
        $products = Product::where('order_id', $orderId)->get();

        // calculate order total

        foreach ($products as $product)
        {
            if ($product->vat_applicable == Product::VAT_APPLICABLE)
            {
                $vat = $product->amount_of_vat;
            }
            else
            {
                $vat = 0;
            }
            $total += $product->price + $vat;
        }

        // calculate discounted

        if ($this->has_discount == 1)
        {
            $total = $total–($total / 100 * $this->get_discount_percentage);
        }
        elseif (Customer::find($customerId)->type == 'special-customer')
        {
            $total = $total–($total / 100 * 10);
        }
        return $total;
    }
}