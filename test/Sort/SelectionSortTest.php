<?php
use PHPUnit\Framework\TestCase;
use Orq\PHP\Algs\Sort\SelectionSort;

require_once __DIR__ . '/../../vendor/autoload.php';

class SelectionSortTest extends TestCase {
    /**
     * @test
     */
    public function sortWorks() {
        $sorter = new SelectionSort();
        $a = [6, 4, 3, 9, 14];
        $numbers = [];
        for ($i = 0; $i < count($a); $i++) {
            $numbers[$i] = new Number($a[$i]);
        }
        
        SelectionSort::sort($numbers);
        $this->assertSame(3, $numbers[0]->getValue());
        $this->assertSame(6, $numbers[2]->getValue());
    }

    /**
     * @test
     */
    public function sortWithCompareFuncWorks() {
        $sorter = new SelectionSort();
        $a = [6, 4, 3, 9, 14];
        $numbers = [];
        for ($i = 0; $i < count($a); $i++) {
            $numbers[$i] = new Number($a[$i]);
        }
        
        SelectionSort::sortWithCompareFunc($numbers, function ($v, $w) {
            if ($v->getValue() < $w->getValue()) return -1;
            else return 1;
        });
        $this->assertSame(3, $numbers[0]->getValue());
        $this->assertSame(6, $numbers[2]->getValue());
    }
}

class Number implements \Orq\PHP\Algs\Sort\ComparableInterface {
    /**
     * @var int
     */
    private $value;

    /**
     * @param int $v
     * @return void
     */
    public function __construct($v) {
        $this->value = $v;
    }

    /**
     * @return int
     */
    public function getValue() {
        return $this->value;
    }

    /**
     * @param ComparableInterface
     * @return int 
     */
    public function compareTo(\Orq\PHP\Algs\Sort\ComparableInterface $other) {
        if ($this->value < $other->getValue()) return -1;
        if ($this->value == $other->getValue()) return 0;
        if ($this->value > $other->getValue()) return 1;
    }

    /**
     * @return void
     */
    public function __toString() {
        return $this->value . '';
    }
}