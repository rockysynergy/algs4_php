<?php
use PHPUnit\Framework\TestCase;

class BagTest extends TestCase {
    /**
     * @test
     */
    public function addItemIncresesSize() {
        $bag = new \Orq\PHP\Algs\Util\Bag();

        $bag->add("I am rocky");
        $this->assertEquals(1, $bag->size());
    }

    /**
     * @test
     */
    public function implementIterable() {
        $bag = new \Orq\PHP\Algs\Util\Bag();

        $bag->add("I");
        $bag->add("am");
        $bag->add("Rocky");
        $result = '';
        foreach ($bag->iterator() as $v) {
            $result .= ' ' . $v;
        }

        $this->assertEquals(" I am Rocky", $result);
    }
}
?>
