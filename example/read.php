<?php
/**
 * @author: RunnerLee
 * @email: runnerleer@gmail.com
 * @time: 16-5-27 下午6:27
 */
require __DIR__ . '/../vendor/autoload.php';


$reader = new \Runner\LoggerReader\Reader();

foreach($reader->load(__DIR__ . '/data/access.log') as $v) {
    print_r($v);
}