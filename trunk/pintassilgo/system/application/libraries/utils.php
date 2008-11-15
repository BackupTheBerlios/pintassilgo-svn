<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of utils
 *
 * @author bruno
 */
class utils {

    // I do not know off any function that does this, so i implemented it myself
    function array_rem_elem($array, $element) {
        foreach($array as $key => $value) {
            if($value == $element) {
                unset($array[$key]);
                break;
            }
        }
        return array_values($array);
    }
}
?>
