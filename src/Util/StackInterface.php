<?php
namespace Orq\PHP\Algs\Util;

interface StackInterface {
    /**
     * @return void
     */
    public function push($item);

    /**
     * @return mixed
     */
    public function pop();

    /**
     * @return boolean
     */
    public function isEmpty();

    /**
     * @return int
     */
    public function size();
}
