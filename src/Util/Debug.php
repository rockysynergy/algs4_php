<?php
namespace Orq\PHP\Algs\Util;

class Debug {
    /**
     * @param $var the variable want to peek
     * @param $label 
     * @param $file
     * @return void
     */
    public static function varDump($var, $label = '', $file = 'debug.txt') {
        ob_start(function ($buffer) use ($label, $file) {
            $content = date('Y-m-d G:i:s') . " => " .$label . ": \n" . $buffer;
            file_put_contents($file, $content, FILE_APPEND);
        });

        var_dump($var);
        ob_end_clean();
    }
}
