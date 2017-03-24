<?php
/**
 * @author: RunnerLee
 * @email: runnerleer@gmail.com
 * @time: 16-5-27 下午5:24
 */

namespace Runner\MonologReader\Parser;

/**
 * Interface ParserInterface
 * @package Runner\MonologReader\Parser
 */
interface ParserInterface
{
    /**
     * @param $row
     * @param $index
     * @return array
     */
    public function parse($row, $index);
}
