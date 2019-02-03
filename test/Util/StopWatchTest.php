<?php
use PHPUnit\Framework\TestCase;

class StopWatchTest extends TestCase {
    /**
     * @test
     */
    public function elapsedTime() {
        $start = new \DateTime('2001-07-12 18:00:00');
        $stopWatch = new \Orq\PHP\Algs\Util\Stopwatch($start);

        $now = new \DateTime();
        $diff = $now->getTimeStamp() - $start->getTimeStamp();
        $this->assertEquals($diff, $stopWatch->elapsedTime());
    }

    /**
     * @test
     */
    public function secondsToTime() {
        $seconds = 4250;
        $stopWatch = new \Orq\PHP\Algs\Util\Stopwatch();

        $this->assertEquals('1:10:50', $stopWatch->secondsToTime($seconds));
    }

    /**
     * @test
     */
    public function secondsToTimeWithoutPassingSeconds() {
        $start = new \DateTime('2001-07-12 18:00:00');
        $stopWatch = new \Orq\PHP\Algs\Util\Stopwatch($start);

        $this->assertNotEquals('0:00:00', $stopWatch->secondsToTime());
    }

}
