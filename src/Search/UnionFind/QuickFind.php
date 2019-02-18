<?php
namespace Orq\PHP\Algs\Search\UnionFind;

class QuickFind implements UnionFindInterface  {
    /**
     * @var ids
     */
    protected $ids = [];

    /**
     * @var int
     */
    protected $count = 0;

    /**
     * @param int $n the total number of items to hold
     * @return void
     */
    public function __construct($n) {
        for ($i = 1; $i <= $n; $i++) {
            $this->ids[$i] = $i;
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
        $pId = $this->ids[$p];
        $qId = $this->ids[$q];

        if ($pId === $qId) return;

        for ($i = 1; $i <= count($this->ids); $i++) {
            if ($this->ids[$i] == $pId) $this->ids[$i] = $qId;
        }
        $this->count--;
    }


    /**
     * @param int $p
     * @return int The group in which $p belongs to
     */
    public function find($p) {
        $this->validate($p);
        return $this->ids[$p];
    }

    /**
     * @param int $p
     * @param int $q
     * @return boolean Return true if $p and $q are in the same group, false otherwise
     */
    public function connected($p, $q) {
        $this->validate($p);
        $this->validate($q);
        return $this->ids[$p] === $this->ids[$q];
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
        $total = count($this->ids);
        if ($p < 0 || $p >= count($this->ids)) {
            throw new IllegalArgumentException("index + {$p} is not between 0 and {$total}");
        }
    }
}