<?php

function formatPrice($prixCent)
{
    $prixEuro = $prixCent / 100;
    return number_format($prixEuro, 2, ',', ' ') . ' €';
}

function priceExcludingVAT($priceCents, $vatRate = 5.5)
{
    $prixHT = ($priceCents * 100) / (100 + $vatRate);
    return $prixHT;
}

function discountedPrice($priceCents, $discountPercent)
{
    $discounted = $priceCents * (1 - ($discountPercent / 100));
    return formatPrice($discounted);
}
?>