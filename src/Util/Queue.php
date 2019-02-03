<?php
namespace Orq\PHP\Algs\Util;

use Orq\PHP\Algs\Exceptions as Exceptions;

class Queue implements QueueInterface {
    /**
     * @var array
     */
    private $items = [];

    /**
     * @param mixed $item
     * @return void
     */
    public function enqueue($item) {
        array_push($this->items, $item);
    }

    /**
     * @return mixed
     */
    public function dequeue() {
        if (count($this->items) == 0)
            throw new Exceptions\EmptyException("The Queue is empty");
        else 
            return array_shift($this->items);
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
        return count($this->items) === 0;
    }

    /**
     * @return ArrayIterator
     */
    public function iterator() {
        return new \ArrayIterator($this->items);
    }
}
?>
