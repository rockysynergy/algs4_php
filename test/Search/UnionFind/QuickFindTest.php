<?php
use PHPUnit\Framework\TestCase;
use Orq\PHP\Algs\Search\UnionFind\QuickFind;

require_once __DIR__ . '/../../../vendor/autoload.php';

class QuickFindTest extends TestCase {

    /**
     * @test
     */
    public function simpleUnion() {
        //$quickUF = new \Orq\PHP\Algs\Search\UnionFind\QuickFind(5);
        $quickUF = new QuickFind(5);
        $this->assertFalse($quickUF->connected(1, 3));

        $quickUF->union(1, 3);
        $this->assertTrue($quickUF->connected(1, 3));
    }

    /**
     * @test
     */
    public function union4Nodes() {
        //$quickUF = new \Orq\PHP\Algs\Search\UnionFind\QuickFind(5);
        $quickUF = new QuickFind(5);
        $this->assertFalse($quickUF->connected(1, 3));

        $quickUF->union(1, 3);
        $quickUF->union(3, 2);
        $this->assertTrue($quickUF->connected(1, 2));
    }

    /**
     * @test
     */
    public function hasTheCorrectCount() {
        $quickUF = new QuickFind(6);
        $this->assertSame(6, $quickUF->count());

        $quickUF->union(1, 6);
        $quickUF->union(2, 3);
        $this->assertSame(4, $quickUF->count());
    }
    
    /**
     * @test
     * @expectedException \Orq\PHP\Algs\Exceptions\IllegalArgumentException
     */
    public function throwsIllegalArgumentException4OutBoundInteger() {
        $quickUF = new QuickFind(6);
        $this->assertSame(6, $quickUF->count());

        $quickUF->union(1, 6);
    }
}

