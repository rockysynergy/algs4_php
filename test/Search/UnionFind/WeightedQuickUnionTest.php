<?php
use PHPUnit\Framework\TestCase;
use Orq\PHP\Algs\Search\UnionFind\WeightedQuickUnion;

require_once __DIR__ . '/../../../vendor/autoload.php';

class WeightedQuickUnionTest extends TestCase {


    /**
     * @test
     */
    public function simpleUnion() {
        $quickUF = new WeightedQuickUnion(5);
        $this->assertFalse($quickUF->connected(1, 3));

        $quickUF->union(1, 3);
        $this->assertTrue($quickUF->connected(1, 3));
    }

    /**
     *@test
     */
    public function union4Nodes() {
        $quickUF = new WeightedQuickUnion(5);
        $this->assertFalse($quickUF->connected(1, 3));

        $quickUF->union(1, 3);
        $quickUF->union(3, 2);
        $this->assertTrue($quickUF->connected(1, 2));
    }

    /**
     * @test
     */
    public function unionUpdateSizeCorrectly() {        
        $quickUF = new WeightedQuickUnion(5);
        $this->assertFalse($quickUF->connected(1, 3));
        $quickUF->union(1, 3);

        $this->assertSame(1, $quickUF->find(3));
        $this->assertSame(1, $quickUF->find(1));

        $quickUF->union(2, 3);
        $this->assertSame(1, $quickUF->find(2));
    }

    /**
     * @test
     */
    public function hasTheCorrectCount() {
        $quickUF = new WeightedQuickUnion(6);
        $this->assertSame(6, $quickUF->count());

        $quickUF->union(1, 5);
        $quickUF->union(2, 3);
        $this->assertSame(4, $quickUF->count());
    }

    /**
     * @test
     * @expectedException \Orq\PHP\Algs\Exceptions\IllegalArgumentException
     */
    public function throwsIllegalArgumentException4OutBoundInteger() {
        $quickUF = new WeightedQuickUnion(6);
        $this->assertSame(6, $quickUF->count());

        $quickUF->union(1, 6);
    }

    
    // protected static function getMethod($name) {
    //     $class = new \ReflectionClass('MyClass');
    //     $method = $class->getMethod($name);
    //     $method->setAccessible(true);
    //     return $method;
    // }

    // public function testFoo() {
    //     $foo = self::getMethod('foo');
    //     $obj = new MyClass();
    //     $foo->invokeArgs($obj, []);
    // }
}
