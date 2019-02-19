<?php
namespace Orq\PHP\Algs\Sort;

class MergeSortBottomUp {
    
    /**
     * Rearrange the array in ascending order, using the natural order
     * @param array $items
     * @return void
     */
    public static function sort(Array &$items) {
        $n = count($items);
        $aux = [];

        for ($len = 1; $len < $n; $len *= 2) {
            for ($lo = 0; $lo < $n - $len; $lo += $len + $len) {
                $mid = $lo + $len - 1;
                $hi = min([$lo + $len + $len - 1, $n - 1]);
                self::merge($items, $aux, $lo, $mid, $hi);
            }
        }
    }

    /**
     * Stably merge sub array
     */
    private static function merge(&$items, &$aux, $lo, $mid, $hi) {
        // copy to aux
        for ($k = $lo; $k <= $hi; $k++) {
            $aux[$k] = $items[$k];
        }

        // merge back to $items
        $i = $lo;
        $j = $mid + 1;
        for ($k = $lo; $k <= $hi; $k++) {
            if ($i > $mid) $items[$k] = $aux[$j++];
            else if ($j > $hi) $items[$k] = $aux[$i++];
            else if (self::less($aux[$j], $aux[$i])) $items[$k] = $aux[$j++];
            else $items[$k] = $aux[$i++];
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