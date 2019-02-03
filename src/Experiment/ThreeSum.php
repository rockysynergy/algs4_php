<?php
namespace Orq\PHP\Algs\Experiment;

/**
 * Giveng a sequece of numbers and find consecutive triple numbers 
 * which the sum is zero
 */
class ThreeSum {
    /**
     * @param array $a
     * @return int
     */
    public static function count(Array $a) {
        $total = count($a);
        $cnt = 0;
        for ($i = 0; $i < $total; $i++) {
            for ($j = $i + 1; $j < $total; $j++) {
                for ($k = $j + 1; $k < $total; $k++) {
                    if ($a[$i] + $a[$j] + $a[$k] === 0) $cnt++;
                }
            }
        }

        return $cnt;
    }
}
