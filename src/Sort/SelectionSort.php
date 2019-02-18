<?php
namespace Orq\PHP\Algs\Sort;

class SelectionSort {

    /**
     * Rearrange the array in ascending order, using the natural order
     * @param array $items
     * @return void
     */
    public static function sort(Array &$items) {
        $n = count($items);
        for ($i = 0; $i < $n; $i++) {
            $min = $i;
            for ($j = $i + 1; $j < $n; $j++) {
                if (self::less($items[$j], $items[$min])) $min = $j;
            }

            self::exch($items, $i, $min);
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
        for ($i = 0; $i < $n; $i++) {
            $min = $i;
            for ($j = $i + 1; $j < $n; $j++) {
                if (self::lessWithCompareFunc($compareFunc, $items[$j], $items[$min])) $min = $j;
            }

            self::exch($items, $i, $min);
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