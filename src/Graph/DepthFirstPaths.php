<?php
namespace Orq\PHP\Algs\Graph;

use Orq\PHP\Algs\Util\Stack;

class DepthFirstPaths
{
    private $G;
    private $marked = [];
    private $edgeTo = [];
    private $s = -1;

    public function __construct(Graph $G, int $s)
    {
        $this->G = $G;
        $this->s = $s;
        $this->validateVertex($s);
        $this->dfs($G, $s);
    }

    private function dfs(Graph $G, int $v)
    {
        $this->marked[$v] = true;

        foreach ($G->adj($v) as $w) {
            if (!$this->marked[$w]) {
                $this->edgeTo[$w] = $v;
                $this->dfs($G, $w);
            }
        }
    }

    public function hasPathTo(int $v):boolean
    {
        $this->validateVertex($v);
        return $this->marked[$v];
    }

    public function pathTo(int $v)
    {
        $this->validateVertex($v);

        if (!$this->marked[$v]) return null;
        $path = new Stack();
        for ($w = $v; $w != $this->s; $w = $this->edgeTo[$w])
        {
            $path->push($w);
        }
        $path->push($this->s);

        return $path;
    }
    
    private function validateVertex(int $v)
    {
        $L = $this->G->V();
        if ($v < 0 || $v >= $L) {
            throw new IllegalArgumentException("Vertex " . $v .' is not between 0 and '. $L);
        }
    }
}