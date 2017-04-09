<?php
/**
 * @author: RunnerLee
 * @email: runnerleer@gmail.com
 * @time: 2017-04
 */

namespace Runner\MonologReader\Contexts;

use SplFileObject;

/**
 * Class FileContext
 * @package Runner\MonologReader\Contexts
 */
class FileContext implements ContextInterface
{

    /**
     * @var SplFileObject
     */
    protected $file;

    /**
     * @var bool
     */
    protected $isEmpty = false;

    /**
     * FileContext constructor.
     * @param $file
     */
    public function __construct($file)
    {
        $this->file = new SplFileObject($file);

        if (0 == $this->file->fstat()['size']) {
            $this->isEmpty = true;
        }

        $this->file->setFlags(SplFileObject::DROP_NEW_LINE);
    }

    /**
     * @return SplFileObject
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @return string|array
     */
    public function gets()
    {
        if ('' === $row = $this->file->fgets()) {
            return ($this->file->eof() ? false : $this->gets());
        }
        return $row;
    }

    /**
     * @return array|string
     */
    public function current()
    {
        return $this->file->current();
    }

    /**
     * @return integer|string
     */
    public function line()
    {
        return ($this->isEmpty ? 0 : ($this->file->key() + 1));
    }

    /**
     * @return bool
     */
    public function eof()
    {
        return $this->file->eof();
    }
}
