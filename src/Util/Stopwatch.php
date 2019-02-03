<?php
namespace Orq\PHP\Algs\Util;

class Stopwatch {
    /**
     * @var \DateTime
     */
    private $start;


    /**
     * @param \DateTime $start
     * @return void
     */
    public function __construct(\DateTime $start = null) {
        if (is_null($start)) $start = new \DateTime();
        $this->start = $start;
    }

    /**
     * @return string
     */
    public function elapsedTime() {
        $end = new \DateTime();
        $diff = $end->getTimeStamp() - $this->start->getTimeStamp();

        return $diff;
    }

    /**
     * @param int $seconds 
     * @return string
     */
    public function secondsToTime($seconds = null) {
        if (is_null($seconds)) {
            $seconds = $this->elapsedTime();
        }
        $h = floor($seconds / 3600);
        $seconds -= $h * 3600;
        $m = floor($seconds / 60);
        $seconds -= $m * 60;

        $str = $h.':'.sprintf('%02d', $m).':'.sprintf('%02d', $seconds);
        return $str;
    }
}
?>
