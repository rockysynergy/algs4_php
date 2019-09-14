<?php
namespace Orq\PHP\Algs\Graph;

use Orq\PHP\Algs\Exceptions\IllegalArgumentException;
use Orq\PHP\Algs\Util\Bag;

Class Graph
{
    private $V;
    private $E;
    private $adj = [];

    public function __construct(int $v)
    {
        if ($v < 0) throw new IllegalArgumentException('Number of vertices must be nongegative');
        $this->V = $v;
        $this->E = 0;

        for ($i=0; $i<$v; $i++) {
            $this->adj[$i] = [];
        }
    }

    public function V()
    {
        return $this->V;
    }

    public function E()
    {
        return $this->E;
    }

    private function validateVertex(int $v)
    {
        if ($v < 0 || $v >= $this->V) {
            throw new IllegalArgumentException("Vertex " . $v .' is not between 0 and '. $this->V - 1);
        }
    }

    public function addEdge(int $v, int $w)
    {
        $this->validateVertex($v);
        $this->validateVertex($w);
        $this->E++;
        array_push($this->adj[$v], $w);
        array_push($this->adj[$w], $v);
    }

    public function adj(int $v) 
    {
        $this->validateVertex($v);
        return $this->adj[$v];
    }

    public function degree(int $v)
    {
        $this->validateVertex($v);
        return count($this->adj[$v]);
    }
}