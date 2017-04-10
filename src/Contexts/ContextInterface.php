<?php
/**
 * @author: RunnerLee
 * @email: runnerleer@gmail.com
 * @time: 2017-04
 */

namespace Runner\MonologReader\Contexts;

interface ContextInterface
{
    /**
     * @return string|array
     */
    public function gets();

    /**
     * @return string|array
     */
    public function current();

    /**
     * @return int|string
     */
    public function line();

    /**
     * @return bool
     */
    public function eof();
}
