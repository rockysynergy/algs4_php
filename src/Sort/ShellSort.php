<?php
namespace Orq\PHP\Algs\Sort;

class ShellSort {    
    /**
     * Rearrange the array in ascending order, using the natural order
     * @param array $items
     * @return void
     */
    public static function sort(Array &$items) {
        $n = count($items);

        // 3x + 1 increment sequence: 1, 4, 13, 40
        $h = 1;
        while ($h < $n / 3) $h = 3 * $h + 1;

        while ($h >= 1 ) {
            for ($i = $h; $i < $n; $i++) {
                for ($j = $i; $j >= $h && self::less($items[$j], $items[$j-$h]); $j--) {
                    self::exch($items, $j, $j - $h);
                }            
            }

            $h = floor($h/3);
        }
    }

    /**
     * Rearrange the array in ascending order, using the natural order
     * @param array $items
     * @return void
     */
    public static function sortWithCompareFunc(Array &$items, $compareFunc) {
        $n = count($items);

        // 3x + 1 increment sequence: 1, 4, 13, 40
        $h = 1;
        while ($h < $n / 3) $h = 3 * $h + 1;

        while ($h >= 1 ) {
            for ($i = $h; $i < $n; $i++) {
                for ($j = $i; $j >= $h && self::lessWithCompareFunc($compareFunc, $items[$j], $items[$j-$h]); $j--) {
                    self::exch($items, $j, $j - $h);
                }            
            }

            $h = floor($h/3);
        }
    }
    
    /**
     * Returns TRUE if $v is less than $w
     * 
     * @param ComparableInterface $v
     * @param ComparableInterface $w
     * @return boolean
     */
    private static function less(ComparableInterface $v, ComparableInterface $w) {
        return $v->compareTo($w) < 0;
    }

    /**
     * Returns TRUE if compare($v, $w) < 0
     * 
     * @param ComparableInterface $v
     * @param ComparableInterface $w
     * @return boolean
     */
    private static function lessWithCompareFunc($compareFunc, ComparableInterface $v, ComparableInterface $w) {
        return $compareFunc($v, $w) < 0;
    }

    /**
     * Swap items
     * @param array $items
     * @param int $i
     * @param int $j
     * 
     * @return void
     */
    private static function exch(&$items, $i, $j) {
        $t = $items[$i];
        $items[$i] = $items[$j];
        $items[$j] = $t;
    }
}