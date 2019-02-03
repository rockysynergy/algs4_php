<?php
namespace Orq\PHP\Algs\Util;

interface QueueInterface {
    /**
     * @return void
     */
    public function enqueue($item);

    /**
     * @return mixed
     */
    public function dequeue();

    /**
     * @return boolean
     */
    public function isEmpty();

    /**
     * @return int
     */
    public function size();
}
