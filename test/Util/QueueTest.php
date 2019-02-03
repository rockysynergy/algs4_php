<?php
use PHPUnit\Framework\TestCase;

class QueueTest extends TestCase {
    /**
     * @test
     */
    public function enqueueIncresesSize() {
        $queue = new \Orq\PHP\Algs\Util\Queue();

        $queue->enqueue("Eddy");
        $this->assertEquals(1, $queue->size());
        $this->assertFalse($queue->isEmpty());
    }

    /**
     * @test
     */
    public function dequeue() {
        $queue = new \Orq\PHP\Algs\Util\Queue();

        $queue->enqueue("Eddy");
        $this->assertEquals("Eddy", $queue->dequeue());
        $this->assertTrue($queue->isEmpty());
    }

    /**
     * @test
     * @expectedException \Orq\PHP\Algs\Exceptions\EmptyException
     */
    public function dequeueEmptyQueue() {
        $queue = new \Orq\PHP\Algs\Util\Queue();
        $queue->dequeue();
    }

    /**
     * @test
     */
    public function implementIterable() {
        $queue = new \Orq\PHP\Algs\Util\Queue();

        $queue->enqueue("I");
        $queue->enqueue("am");
        $queue->enqueue("Rocky");
        $result = '';
        foreach ($queue->iterator() as $v) {
            $result .= ' ' . $v;
        }

        $this->assertEquals(" I am Rocky", $result);
    }
}
