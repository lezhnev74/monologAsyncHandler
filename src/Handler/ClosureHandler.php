<?php

namespace lezhnev74\Monolog\Handler;

use Closure;
use Monolog\Handler\HandlerInterface;
use Monolog\Handler\AbstractProcessingHandler;
use Monolog\Logger;

class ClosureHandler extends AbstractProcessingHandler {

    /**
     * This closure should be called on logging and make queue pushing on anything async related
     *
     * @var function
     */
    private $closure = null;


    /**
     * ClosureHandler constructor.
     *
     * @param int $closure this closure will be actually called on Logging (function should handle the rest logic)
     * @param bool $level
     * @param $bubble
     */
    public function __construct($closure, $level = Logger::DEBUG, $bubble = true)
    {
        // set closure
        if(is_object($closure) && ($closure instanceof Closure)) {
            $this->closure = $closure;
        }

        parent::__construct($level, $bubble);
    }


    /**
     * Make actually pushing
     *
     * @param array $record
     */
    protected function write(array $record)
    {
        if($this->closure) {
            call_user_func($this->closure,$record);
        }
    }

}