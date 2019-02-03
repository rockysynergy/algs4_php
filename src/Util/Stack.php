<?php
namespace Orq\PHP\Algs\Util;

use Orq\PHP\Algs\Exceptions as Exceptions;

class Stack implements StackInterface {
    /**
     * @var array
     */
    private $items = [];

    /**
     * @param mixed $item
     * @return void
     */
    public function push($item) {
        array_push($this->items, $item);
    }

    /**
     * @return mixed
     */
    public function pop() {
        if (count($this->items) == 0)
            throw new Exceptions\EmptyException("The Stack is empty");
        else 
            return array_pop($this->items);
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
        return new StackIterator($this->items);
    }
}

/**
 * The iterator implementation for stack
 *
 */
class StackIterator implements \Iterator {
    private $k;
    private $data;

    public function __construct($data) {
        $this->data = $data;
        $this->k = count($data) - 1;
    }

    public function rewind() {
        $this->k = count($this->data) - 1;
    }

    public function current() {
        return $this->data[$this->k];
    }

    public function key() {
        return $this->k;
    }

    public function next() {
        $this->k--;
        return true;
    }

    public function valid() {
        return isset($this->data[$this->k]);
    }
}
?>
