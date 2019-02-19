<?php
namespace Orq\PHP\Algs\Sort;

class MergeSort {
    private static $CUTOFF = 7;
    
    /**
     * Rearrange the array in ascending order, using the natural order
     * @param array $items
     * @return void
     */
    public static function sort(Array &$items) {
        $n = count($items);
        $aux = [];
        for ($i = 0; $i < count($items); $i++) {
            $aux[$i] = $items[$i];
        }
        self::doSort($aux, $items, 0, $n - 1);
    }

    /**
     * recursively sort sub-array, using auxiliary array
     */
    private static function doSort(Array &$src, Array &$dst, $lo, $hi) {
        if ($hi <= $lo + self::$CUTOFF) {
            self::insertionSort($dst, $lo, $hi);
            return;
        }

        $mid = $lo + floor(($hi - $lo) / 2);
        self::doSort($dst, $src, $lo, $mid);
        self::doSort($dst, $src, $mid + 1, $hi);

        if (self::less($src[$mid + 1], $src[$mid])) {
            for ($i = $lo; $i <= $hi; $i++) {
                $dist[$i] = $src[$i];
                return;
            }
        }
        self::merge($src, $dst, $lo, $mid, $hi);
    }
    
    private static function insertionSort(Array &$items, $lo, $hi) {
        for ($i = $lo; $i <= $hi; $i++) {
            for ($j = $i; $j > $lo && self::less($items[$j], $items[$j - 1]); $j--) {
                self::exch($items, $j, $j - 1);
            }
        }
    }


    /**
     * Stably merge sub array
     */
    private static function merge(&$src, &$dst, $lo, $mid, $hi) {
        // merge back to items[]
        $i = $lo;
        $j = $mid + 1;
        for ($k = $lo; $k <= $hi; $k++) {
            if ($i > $mid) $dst[$k] = $src[$j++];
            else if ($j > $hi) $dst[$k] = $src[$i++];
            else if (self::less($src[$j], $src[$i])) $dst[$k] = $src[$j++];
            else $dst[$k] = $src[$i++];
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
     * Rearrange the array in ascending order, using the natural order
     * @param array $items
     * @return void
     */
    public static function sortWithCompareFunc(Array &$items, $compareFunc) {
        $n = count($items);
        $aux = [];
        for ($i = 0; $i < count($items); $i++) {
            $aux[$i] = $items[$i];
        }
        self::doSort($aux, $items, 0, $n - 1, $compareFunc);
    }

    /**
     * recursively sort sub-array, using auxiliary array
     */
    private static function doSortWithCompareFunc(Array &$src, Array &$dst, $lo, $hi, $compareFunc) {
        if ($hi <= $lo + self::$CUTOFF) {
            self::insertionSort($dst, $lo, $hi, $compareFunc);
            return;
        }

        $mid = $lo + floor(($hi - $lo) / 2);
        self::doSort($dst, $src, $lo, $mid, $compareFunc);
        self::doSort($dst, $src, $mid + 1, $hi, $compareFunc);

        if (self::less($src[$mid + 1], $src[$mid])) {
            for ($i = $lo; $i <= $hi; $i++) {
                $dist[$i] = $src[$i];
                return;
            }
        }
        self::merge($src, $dst, $lo, $mid, $hi, $compareFunc);
    }
    
    private static function insertionSortWithComareFunc(Array &$items, $lo, $hi, $compareFunc) {
        for ($i = $lo; $i <= $hi; $i++) {
            for ($j = $i; $j > $lo && self::lessWithCompareFunc($compareFunc, $items[$j], $items[$j - 1]); $j--) {
                self::exch($items, $j, $j - 1);
            }
        }
    }

    /**
     * Stably merge sub array
     */
    private static function mergeWithCompareFunc(&$src, &$dst, $lo, $mid, $hi, $compareFunc) {
        // merge back to items[]
        $i = $lo;
        $j = $mid + 1;
        for ($k = $lo; $k <= $hi; $k++) {
            if ($i > $mid) $dst[$k] = $src[$j++];
            else if ($j > $hi) $dst[$k] = $src[$i++];
            else if (self::lessWithCompareFunc( $compareFunc, $src[$j], $src[$i])) $dst[$k] = $src[$j++];
            else $dst[$k] = $src[$i++];
        }
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