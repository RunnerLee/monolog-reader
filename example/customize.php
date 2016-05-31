<?php
/**
 * @author: RunnerLee
 * @email: runnerleer@gmail.com
 * @time: 16-5-27 下午7:00
 */
require __DIR__ . '/../vendor/autoload.php';

$customizeParser = new \Runner\MonologReader\Parser\CustomizeParser();

$customizeParser->setContextCallback(function(array $v) {
    return 'this is context';
});

$customizeParser->setExtraCallback(function(array $v) {
    return 'this is callback';
});

$customizeParser->setMessageCallBack(function($v) {
    return 'this is message';
});

$reader = (new \Runner\MonologReader\Reader())->setParser($customizeParser);

foreach($reader->load(__DIR__ . '/data/access.log') as $v) {
    print_r($v);
}