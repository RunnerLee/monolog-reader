<?php
/**
 * @author: RunnerLee
 * @email: runnerleer@gmail.com
 * @time: 16-5-27 下午5:24
 */

namespace Runner\LoggerReader\Parser;

interface ParserInterface
{

    public function __construct();


    /**
     * @param string $message
     * @return mixed
     */
    public function messageHandle($message);


    /**
     * @param string $context
     * @return mixed
     */
    public function contextHandle($context);


    /**
     * @param string $extra
     * @return mixed
     */
    public function extraHandle($extra);

}
