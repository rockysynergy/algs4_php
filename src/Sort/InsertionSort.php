<?php
namespace Orq\PHP\Algs\Sort;

class InsertionSort {    
    /**
     * Rearrange the array in ascending order, using the natural order
     * @param array $items
     * @return void
     */
    public static function sort(Array &$items) {
        $n = count($items);
        for ($i = 1; $i < $n; $i++) {
            for ($j = $i; $j > 0 && self::less($items[$j], $items[$j-1]); $j--) {
                self::exch($items, $j, $j - 1);
            }            
        }
    }
        
    /**
     * Rearrange the array in ascending order, using the natural order
     * 
     * @param array $items
     * @param Callable $compareFunc
     * @return void
     */
    public static function sortWithCompareFunc(Array &$items, $compareFunc) {
        $n = count($items);
        for ($i = 1; $i < $n; $i++) {
            for ($j = $i; $j > 0 && self::lessWithCompareFunc($compareFunc, $items[$j], $items[$j-1]); $j--) {
                self::exch($items, $j, $j - 1);
            }            
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