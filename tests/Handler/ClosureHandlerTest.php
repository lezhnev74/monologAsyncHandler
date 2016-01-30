<?php
namespace lezhnev74\Monolog\Handler;

use Monolog\Logger;

class ClosureHandlerTest extends \PHPUnit_Framework_TestCase
{
    //
    private function getPreparedRecord($rewrite = [])
    {
        return array_merge([
            "message"    => "search happened: how much is the fish? with found results: 2",
            "context"    => ["platform" => "ios"],
            "level"      => 200,
            "level_name" => "INFO",
            "channel"    => "local",
            "datetime"   => "",
            "extra"      => [],
            "formatted"  => "[2016-01-30 15:41:37] local.INFO: search happened: how much is the fish? with found results: 2 {\"platform\":\"ios\"} []\n",
        ], $rewrite);
    }

    //
    public function test_handler_closure_works()
    {
        // set
        $output = "";
        $prepared_record = $this->getPreparedRecord();
        $handler = new ClosureHandler(function ($record) use (&$output) {
            // do some logic
            $output = $record['message'];
        });

        // execute
        $handler->handle($prepared_record);

        // assert
        $this->assertEquals($prepared_record['message'], $output);

    }

    public function test_monolog_works() {

        // set
        $error_message = "happend123";
        $context = ['account_id'=>9];
        $output = "";
        $output_context = [];

        $handler = new ClosureHandler(function ($record) use (&$output, &$output_context) {
            // do some logic
            $output = $record['message'];
            $output_context = $record['context'];
        });
        $monolog = new Logger('test_logger');
        $monolog->pushHandler($handler);

        // execute
        $monolog->addError($error_message,$context);

        // assert
        $this->assertEquals($error_message, $output);
        $this->assertEquals($context, $output_context);


    }
}