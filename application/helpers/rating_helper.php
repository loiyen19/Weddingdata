<?php 

if (!function_exists('displayRatingStars')) {
    function displayRatingStars($rating) {
        $html = '';
        $roundedRating = round($rating);
        for ($i = 1; $i <= 5; $i++) {
            $starClass = ($i <= $roundedRating) ? 'fa fa-star' : 'fa fa-star-o';
            $html .= '<i class="' . $starClass . '"></i>';
        }
        return $html;
    }
}
