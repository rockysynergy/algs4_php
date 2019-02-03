<?php
namespace Orq\PHP\Algs\Util;

interface BagInterface {
    /**
     * Add item to the bag
     * @return void
     */
    public function add($item);

    /**
     * @return boolean
     */
    public function isEmpty();

    /**
     * @return int
     */
    public function size();
}
