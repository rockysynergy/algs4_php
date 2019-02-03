<?php
namespace Orq\PHP\Algs\Experiment;
require __DIR__ . '/../../vendor/autoload.php';

use Orq\PHP\Algs\Util\StdRandom as StdRandom;
use Orq\PHP\Algs\Util\Stopwatch as Stopwatch;
/**
 *
 */
class ThreeSumClient {
    /**
     * Test threesum
     * @param int $n
     */
    public static function threeSum($n) {
        $a = [];
        for ($i = 0; $i < $n; $i++) {
            $a[$i] = StdRandom::uniformBetween(-1000000, 1000000);
        }

        $stopWatch = new Stopwatch();
        $cnt = ThreeSum::count($a);
        $time = $stopWatch->elapsedTime();
        print("{$cnt} tripples {$stopWatch->secondsToTime($time)} seconds \n");
    }

    /**
     * Test StdRandom
     */
    public static function getRandom() {
        $stopWatch = new Stopwatch();
        for ($i = 0; $i < 5000; $i++) {
            $a[$i] = StdRandom::uniformBetween(-1000000, 1000000);
            print("{$i}: {$a[$i]} \n");
        }
        $time = $stopWatch->elapsedTime();
        print($stopWatch->secondsToTime($time) . " seconds\n");
    }
}

// ThreeSumClient::getRandom();
ThreeSumClient::threeSum($argv[1]);
