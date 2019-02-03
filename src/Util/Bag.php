<?php
namespace Orq\PHP\Algs\Util;

class Bag implements BagInterface {
    /**
     * @var array
     */
    private $items = [];

    /**
     * @param mixed $item
     * @return void
     */
    public function add($item) {
        array_push($this->items, $item);
    }

    /**
     * @return int
     */
    public function size() {
        return count($this->items);
    }

    /**
     * @return boolean
     */
    public function isEmpty() {
        return count($items) === 0;
    }

    /**
     * @return ArrayIterator
     */
    public function iterator() {
        return new \ArrayIterator($this->items);
    }
}
?>
