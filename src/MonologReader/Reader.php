<?php
/**
 * @author: RunnerLee
 * @email: runnerleer@gmail.com
 * @time: 16-5-27 下午5:01
 */
namespace Runner\MonologReader;


use Runner\MonologReader\Parser\DefaultParser;
use Runner\MonologReader\Parser\ParserInterface;
use SplFileObject;

/**
 * Class Reader
 * @package Runner\MonologReader
 */
class Reader
{
    /**
     * @var ParserInterface
     */
    protected $parser = null;

    /**
     * Reader constructor.
     * @param ParserInterface|null $parser
     */
    public function __construct(ParserInterface $parser = null)
    {
        if (null === $parser) {
            $parser = new DefaultParser();
        }

        $this->setParser($parser);
    }

    /**
     * @param $row
     * @param $index
     * @return array
     */
    public function readRow($row, $index = 0)
    {
        return $this->parser->parse($row, $index);
    }

    /**
     * @param $file
     * @return array
     */
    public function readFile($file)
    {
        $fileObject = new SplFileObject($file);
        $record = [];
        while (!$fileObject->eof()) {
            $row = trim($fileObject->fgets());
            if (empty($row)) {
                continue;
            }
            $record[$fileObject->key()] = $this->readRow($row, $fileObject->key());
        }
        return $record;
    }

    /**
     * @param ParserInterface $parserInterface
     * @return $this
     */
    public function setParser(ParserInterface $parserInterface)
    {
        $this->parser = $parserInterface;

        return $this;
    }

    /**
     * @return ParserInterface
     */
    public function getParser()
    {
        return $this->parser;
    }
}
