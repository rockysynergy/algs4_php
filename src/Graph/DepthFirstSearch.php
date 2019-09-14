<?php
namespace Orq\PHP\Algs\Graph;

use Orq\PHP\Algs\Exceptions\IllegalArgumentException;

class DepthFirstSearch
{
    private $marked = [];
    private $count = 0;
    private $G;

    public function __construct(Graph $G, int $s)
    {
        $this->G = $G;
        $this->validateVertex($s);
        $this->dfs($G, $s);
    }

    private function dfs(Graph $G, $v)
    {
        $this->marked[$v] == true;
        $this->count++;

        foreach ($G->adj($v) as $w) {
            if (!$this->marked[$w]) {
                $this->dfs($G, $w);
            }
        }
    }

    public function marked(int $v)
    {
        $this->validateVertex($v);
        return $this->marked[$v];
    }

    public function count()
    {
        return $this->count;
    }

    private function validateVertex(int $v)
    {
        $L = $this->G->V();
        if ($v < 0 || $v >= $L) {
            throw new IllegalArgumentException("Vertex " . $v .' is not between 0 and '. $L);
        }
    }
}