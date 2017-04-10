<?php
/**
 * @author: RunnerLee
 * @email: runnerleer@gmail.com
 * @time: 2017-04
 */

namespace Runner\MonologReader;

use Runner\MonologReader\Contexts\ContextInterface;
use Runner\MonologReader\Contexts\FileContext;
use Runner\MonologReader\Exceptions\ParseException;
use Runner\MonologReader\Parsers\DefaultParser;
use Runner\MonologReader\Parsers\ParserInterface;

class Reader
{
    /**
     * @var ContextInterface
     */
    protected $context;

    /**
     * @var ParserInterface
     */
    protected $parser;

    /**
     * Reader constructor.
     *
     * @param ParserInterface|null $parser
     */
    public function __construct(ParserInterface $parser = null)
    {
        $this->parser = is_null($parser) ? (new DefaultParser()) : $parser;
    }

    /**
     * @param string $file
     *
     * @return $this
     */
    public function loadFile($file)
    {
        $this->context = new FileContext($file);

        return $this;
    }

    /**
     * @return ContextInterface
     */
    public function getContext()
    {
        return $this->context;
    }

    /**
     * @return array|bool
     */
    public function read()
    {
        if (!$this->context->eof() && ($row = $this->context->gets())) {
            if (!$log = $this->parser->parse($row)) {
                throw new ParseException("row parse failed. key: {$this->context->line()}. row: {$row}");
            }

            return $log;
        }

        return false;
    }

    /**
     * @return int|string
     */
    public function line()
    {
        return $this->context->line();
    }

    /**
     * @return array|string
     */
    public function current()
    {
        return $this->context->current();
    }
}
