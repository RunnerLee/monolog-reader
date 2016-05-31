<?php
/**
 * @author: RunnerLee
 * @email: runnerleer@gmail.com
 * @time: 16-5-27 下午5:01
 */
namespace Runner\MonologReader;

use Runner\MonologReader\Parser\ParserInterface;

class Reader
{

    /**
     * @var ParserInterface
     */
    protected $parser = null;

    public function setParser(ParserInterface $parserInterface)
    {
        $this->parser = $parserInterface;

        return $this;
    }


    public function load($file)
    {
        $logger = new Logger(new \SplFileObject($file));
        if(!is_null($this->parser)) {
            $logger->setParser($this->parser);
        }

        return $logger;
    }
}
