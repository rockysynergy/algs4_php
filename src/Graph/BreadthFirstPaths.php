<?php
namespace Orq\PHP\Algs\Graph;

use Orq\PHP\Algs\Util\Stack;

class BreadthFirstPaths
{
    private $G;
    private $s = -1;
    private $marked = [];
    private $edgeTo = [];
    private $distTo = [];

    public function __construct(Graph $G, int $s)
    {
        $this->validateVertex($s);

        $this->G = $G;
        $this->s = $s;
        for ($i = 0; $i < $G->V(); $i++) {
            $this->distTo[$i] = INF;
        }
        $this->bfs();
    }

    private function bfs()
    {
        $q = [];
        array_push($q, $this->s);
        $this->marked[$this->s] = true;
        $this->distTo[$this->s] = 0;

        while (count($q)>0) {
            $w = array_shift($q);
            foreach ($this->G->adj($w) as $v) {
                if (!$this->marked[$v]) {
                    $this->edgeTo[$v] = $w;
                    $this->distTo[$v] = $this->distTo[$w]+1;
                    $this->marked[$v] = true;
                    array_push($q, $v);
                }
            }
        }
    }

    public function hasPathTo(int $v)
    {
        $this->validateVertex(($v));
        return $this->marked[$v];
    }

    public function distTo(int $v)
    {
        $this->validateVertex($v);
        return $this->distTo[$v];
    }

    public function pathTo(int $v):Stack
    {
        $this->validateVertex($v);
        $s = new Stack();

        for ($w = $this->edgeTo[$v]; $w != $this->s; $w = $this->edgeTo[$w]) {
            $s->push($w);
        }
        $s->push($this->s);

        return $s;
    }
        
    private function validateVertex(int $v)
    {
        $L = $this->G->V();
        if ($v < 0 || $v >= $L) {
            throw new IllegalArgumentException("Vertex " . $v .' is not between 0 and '. $L);
        }
    }
}