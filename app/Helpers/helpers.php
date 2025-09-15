<?php
function pickTextColor(string $bgColor, string $light = 'text-white', string $dark = 'text-black'): string
{
    // remove # if exists
    $hex = ltrim($bgColor, '#');

    // expand short hex (#fff → #ffffff)
    if (strlen($hex) === 3) {
        $hex = $hex[0] . $hex[0] . $hex[1] . $hex[1] . $hex[2] . $hex[2];
    }

    // get RGB values
    $r = hexdec(substr($hex, 0, 2));
    $g = hexdec(substr($hex, 2, 2));
    $b = hexdec(substr($hex, 4, 2));

    // luminance formula
    $luminance = (0.299 * $r + 0.587 * $g + 0.114 * $b) / 255;

    // return appropriate class
    return $luminance > 0.5 ? $dark : $light;
}
