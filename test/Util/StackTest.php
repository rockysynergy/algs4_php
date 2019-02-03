<?php
use PHPUnit\Framework\TestCase;

class StackTest extends TestCase {
    /**
     * @test
     */
    public function push() {
        $stack = new \Orq\PHP\Algs\Util\Stack();

        $stack->push("Eddy");
        $this->assertEquals(1, $stack->size());
        $this->assertFalse($stack->isEmpty());
    }

    /**
     * @test
     */
    public function pop() {
        $stack = new \Orq\PHP\Algs\Util\Stack();

        $stack->push("Eddy");
        $this->assertEquals("Eddy", $stack->pop());
        $this->assertTrue($stack->isEmpty());
    }

    /**
     * @test
     * @expectedException \Orq\PHP\Algs\Exceptions\EmptyException
     */
    public function popEmptyStack() {
        $stack = new \Orq\PHP\Algs\Util\Stack();
        $stack->pop();
    }

    /**
     * @test
     */
    public function implementIterable() {
        $stack = new \Orq\PHP\Algs\Util\Stack();

        $stack->push("I");
        $stack->push("am");
        $stack->push("Rocky");
        $result = '';
        foreach ($stack->iterator() as $v) {
            $result .= ' ' . $v;
        }

        $this->assertEquals(" Rocky am I", $result);
    }
}
