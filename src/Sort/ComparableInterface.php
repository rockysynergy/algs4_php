<?php
namespace Orq\PHP\Algs\Sort;

interface ComparableInterface {
    /**
     * If current item is less than `$other` return -1,
     * If current item equals the `$other` return 0
     * If current item is bigger than `$other` return 1
     * 
     * @param ComparableInterface
     * @return int
     */
    public function compareTo(ComparableInterface $other);
}