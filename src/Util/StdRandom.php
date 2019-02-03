<?php
namespace Orq\PHP\Algs\Util;

use Orq\PHP\Algs\Exceptions as Exceptions;


/**
 * Generate random number
 */
class StdRandom {
    /**
     * returns a random integer uniformly in [0, n)
     *
     * @param int $n number of possible integers
     * @return int
     */
    public static function uniform(int $n = null) {
        if ($n <= 0) throw new Exceptions\IllegalArgumentException("argument must be positive: " . $n);

        $limit = is_null($n) ? PHP_INT_MAX : $n - 1;
        $r = rand(0, $limit);
        $m = $limit - 1;

        // power of two
        if (($limit & $m) == 0) {
            return r & m;
        }

        // reject over-represetated candidates
        $u = $r >> 1;
        while ($u + $m - ($r = $u % $limit) < 0) {
            $u = rand(0, $limit) >> 1;
        }
        return $r;
    }

    /**
     * @param int $a
     * @param int $b
     * @return int
     */
    public static function uniformBetween($a, $b) {
        if (!($a < $b) || ($b - $a) > PHP_INT_MAX) 
            throw new Exceptions\IllegalArgumentException("invalid range [" . $a . ", " . $b . "]");

        return $a + self::uniform($b - $a);
    }

    /**
     * @param int $n
     * @return int
     */
    public function aUniform($n = null) {
        $limit = is_null($n) ? PHP_INT_MAX : $n;
        return rand(0, 1 << rand(1, 8 * $limit - 2));
    }
}
