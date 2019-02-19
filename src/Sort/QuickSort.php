<?php
namespace Orq\PHP\Algs\Sort;

use \Orq\PHP\Algs\Exceptions\IllegalArgumentException as IllegalArgumentException;

class QuickSort {
   /**
     * Rearrange the array in ascending order, using the natural order
     * @param array $items
     * @return void
     */
    public static function sort(Array &$items) {
        //@todo add random shuffle to guarantee the performance
        self::doSort($items, 0, count($items) - 1);
    }

    private static function doSort(&$items, $lo, $hi) {
        if ($hi <= $lo) return;
        $j = self::partition($items, $lo, $hi);
        self::doSort($items, $lo, $j - 1);
        self::doSort($items, $j + 1, $hi);
    }

    private static function partition(&$items, $lo, $hi) {
        $i = $lo;
        $j = $hi + 1;
        $v = $items[$lo];

        while (true) {
            // find item on $lo to swap
            while (self::less($items[++$i], $v)) {
                if ($i == $hi) break;
            }

            // find item on $hi to swap
            while (self::less($v, $items[--$j])) {
                if ($j == $lo) break;
            }

            // check if pointers cross
            if ($i >= $j) break;
            self::exch($items, $i, $j);
        }

        // put partitioning item $v at $items[$j]
        self::exch($items, $lo, $j);

        // now $items[$lo .. $j - 1] <= $a[j] <= $a[$j+1 .. $hi]
        return $j;
    }

    /**
     * Select Kth item from array 
     * 
     * @param Array $items
     * @param int   $k
     * @return ComparebleInterface
     */
    public static function select(&$items, $k) {
        $n = count($items);
        if ($k < 0 || $k >= count($items)) {
            throw new IllegalArgumentException("index is not between 0 and {$n}: {$k}");
        }

        $lo = 0;
        $hi = count($items) - 1;
        while ($hi > $lo) {
            $i = self::partition($items, $lo, $hi);
            if ($i > $k) $hi = $i - 1;
            else if ($i < $k) $lo = $i + 1;
            else return $items[$i];
        }

        return $items[$lo];
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