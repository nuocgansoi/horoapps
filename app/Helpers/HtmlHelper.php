<?php
/**
 * Created by IntelliJ IDEA.
 * User: mon.ls
 * Date: 11/7/2016
 * Time: 4:09 PM
 */

namespace App\Helpers;


class HtmlHelper
{
    public function languageCode($locale)
    {
        $mapping = [
            'vi_VN' => 'vi',
            'vi' => 'vi',
            'en_US' => 'en',
            'en' => 'en',
            'en_UK' => 'en',
            'zh_CN' => 'zh-Hans',
            'zh_TW' => 'zh-Hant',
            'zh_HK' => 'zh-Hant',
        ];

        return $mapping[$locale];
    }

    public function active($arg, $class = 'active')
    {
        $currentRoute = \Route::current()->getName();
        if (is_string($arg)) {
            return ($currentRoute == $arg) ? $class : null;
        }

        return $arg ? $class : null;
    }

    public function rating_stars($score, $fullStar = 'fa fa-star', $halfStar = 'fa-star-half-o', $emptyStar = 'fa fa-star-o')
    {
        if (is_null($score)) {
            $score = 0;
        }
        $whole = floor($score);
        $fraction = $score - $whole;
        $decimal = 0;
        if ($fraction < .25) {
            $decimal = 0;
        } elseif ($fraction >= .25 && $fraction < .75) {
            $decimal = .50;
        } elseif ($fraction >= .75) {
            $decimal = 1;
        }
        $a = $whole + $decimal;
        $stars = null;
        $newWhole = floor($a);
        $fraction = $a - $newWhole;
        $totalStars = 0;
        for ($i = 1; $i <= $newWhole; $i++) {
            $stars .= '<i class="' . $fullStar . '" aria-hidden="true"></i>';
            $totalStars++;
        }
        if ($fraction == .5) {
            $stars .= '<i class="' . $halfStar . '" aria-hidden="true"></i>';
            $totalStars += 1;
        }
        $maxStar = 5;
        if ($totalStars < 5) {
            for ($i = 0; $i < $maxStar - $totalStars; $i++) {
                $stars .= '<i class="' . $emptyStar . '" aria-hidden="true"></i>';
            }
        }

        return $stars;
    }
}
