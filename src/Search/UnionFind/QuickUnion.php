<?php
namespace Orq\PHP\Algs\Search\UnionFind;
use \Orq\PHP\Algs\Exceptions\IllegalArgumentException as IllegalArgumentException;

class QuickUnion  implements UnionFindInterface  {
    /**
     * @var array
     */
    protected $parent = [];

    /**
     * @var array
     */
    protected $size = [];

    /**
     * @var int
     */
    protected $count = 0;

    /**
     * @param int $n the total number of items to hold
     * @return void
     */
    public function __construct($n) {
        for ($i = 0; $i < $n; $i++) {
            $this->parent[$i] = $i;
            $this->size[$i] = 1;
        }
        $this->count = $n;
    }

    /**
     * @param int $p
     * @param int $q
     * @return void
     */
    public function union($p, $q){
        $this->validate($p);
        $this->validate($q);
        $pRoot = $this->find($p);
        $qRoot = $this->find($q);
        if ($pRoot === $qRoot) return;

        $this->parent[$pRoot] = $qRoot;
         $this->count--;
    }


    /**
     * @param int $p
     * @return int The group in which $p belongs to
     */
    public function find($p) {
        $this->validate($p);
        $root = $p;
        while ($root != $this->parent[$root]) {
            $root = $this->parent[$root];
        }
        while ($p != $root) {
            $pNew = $this->parent[$p];
            $this->parent[$p] = $root;
            $p = $pNew;
        }
        return $p;
    }

    /**
     * @param int $p
     * @param int $q
     * @return boolean Return true if $p and $q are in the same group, false otherwise
     */
    public function connected($p, $q) {
        $this->validate($p);
        $this->validate($q);
        return $this->find($p) == $this->find($q);
    }


    /**
     * @return int number of components
     */
    public function count() {
        return $this->count;
    }

    /**
     * @param int $p
     * @throws \Orq\PHP\Algs\Exceptions\IllegalArgumentException
     */
    private function validate($p) {
        $total = count($this->parent);
        if ($p < 0 || $p >= count($this->parent)) {
            throw new IllegalArgumentException("index + {$p} is not between 0 and {$total}");
        }
    }
}