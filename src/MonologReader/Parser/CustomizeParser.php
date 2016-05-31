<?php
/**
 * @author: RunnerLee
 * @email: runnerleer@gmail.com
 * @time: 16-5-27 下午6:13
 */

namespace Runner\MonologReader\Parser;

class CustomizeParser implements ParserInterface
{

    protected $callback = [];

    /**
     * CustomizeParser constructor.
     */
    public function __construct()
    {
    }

    /**
     * @param \Closure $closure
     * @return $this
     */
    public function setMessageCallBack(\Closure $closure)
    {
        $this->callback['message'] = $closure;

        return $this;
    }


    /**
     * @param \Closure $closure
     * @return $this
     */
    public function setContextCallback(\Closure $closure)
    {
        $this->callback['context'] = $closure;

        return $this;
    }


    /**
     * @param \Closure $closure
     * @return $this
     */
    public function setExtraCallback(\Closure $closure)
    {
        $this->callback['extra'] = $closure;

        return $this;
    }



    /**
     * @param string $message
     * @return mixed
     */
    public function messageHandle($message)
    {
        return $this->callback['message']($message);
    }

    /**
     * @param string $context
     * @return mixed
     */
    public function contextHandle($context)
    {
        return $this->callback['context']($context);
    }

    /**
     * @param string $extra
     * @return mixed
     */
    public function extraHandle($extra)
    {
        return $this->callback['extra']($extra);
    }
}
