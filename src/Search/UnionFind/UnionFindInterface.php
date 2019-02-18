<?php
namespace Orq\PHP\Algs\Search\UnionFind;

interface UnionFindInterface {
    /**
     * @param int $p
     * @param int $q
     * @return void
     */
    public function union($p, $q);


    /**
     * @param int $p
     * @return int The group in which $p belongs to
     */
    public function find($p);

    /**
     * @param int $p
     * @param int $q
     * @return boolean Return true if $p and $q are in the same group, false otherwise
     */
    public function connected($p, $q);


    /**
     * @return int number of components
     */
    public function count();
}
