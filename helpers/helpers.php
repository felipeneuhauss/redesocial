<?php
/**
 * Created by PhpStorm.
 * User: felipeneuhauss
 * Date: 29/10/15
 * Time: 09:57
 */

if (! function_exists('num_random')) {
    /**
     * Generate a more truly "random" numeric string.
     *
     * @param  int  $length
     * @return string
     *
     * @throws \RuntimeException
     */
    function num_random($length = 16)
    {
        $result = '';

        for($i = 0; $i < $length; $i++) {
            $result .= mt_rand(0, 9);
        }

        return $result;
    }

    function generate_rating_stars($field_name, $quantity = 5, $required = false, $value = 0) {
        $value = round($value);
        $html = "";
        $html .= "<fieldset class='rating'>";
            for ($i = $quantity; $i >= 1; $i--) {
                $html .= "<input type='radio' id='star".$i.$field_name."' name='".$field_name."' value='".$i."' ".($value == $i ? 'checked' : '' )." /><label class='full' for='star".$i.$field_name."' title='".$i." estrelas'></label>";
                $html .= "<input type='radio' id='star".$i.$field_name."half' name='".$field_name."' value='".($i-1).".5' ".($value == (($i-1).".5") ? 'checked' : '' )." /><label class='half' for='star".$i.$field_name."half' title='".($i-1).".5 estrelas'></label>";
            }
        $html .= "</fieldset>";

        return $html;
    }

    function generate_stars($quantity = 5, $value = 0, $rating_quantity = '0', $showEvaluates = true) {
        $value = round((float) $value, 0);
        $html = "<div style='color:#EAAF22'>";

        for ($i = (int)$value; $i > 0; $i--) {
            $html .="<i class='icon-star3'> </i>";
        }
        for ($i = ($quantity-$value) ; $i >= 1; $i--) {
            $html .="<i class='icon-star-empty'></i>";
        }
        $html .= " " . ($rating_quantity > 0 ? $rating_quantity : '0')   . (($showEvaluates ? " Avaliações". " " : "")) ;
        return $html .= "</div>";
    }

    /**
     * Return the numbers from string
     * @param $str
     * @return mixed
     */
    function get_numerics ($str) {
        preg_match_all('/\d+/', $str, $matches);
        return $matches[0][0];
    }

    /**
     * @param $date
     * @return string
     */
    function convert_date_to_db($date = "") {
        $newDate = array();
        if ($date != "") {
            $newDate = explode('/', $date);
            $date = $newDate[2].'-'.$newDate[1].'-'.$newDate[0];
        }
        return $date;
    }

    /**
     * @param $date
     * @return string
     */
    function humanize_date($date = "") {
        $newDate = array();
        if ($date != "") {
            $newDate = explode(' ', $date);
            $newDate = explode('-', $newDate[0]);
            $date = $newDate[2].'/'.$newDate[1].'/'.$newDate[0];
        }
        return $date;
    }

}