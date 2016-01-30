# MonologAsyncHandler

[![Packagist](https://img.shields.io/packagist/l/lezhnev74/monolog-async-handler.svg)]()
[![Build Status](https://travis-ci.org/lezhnev74/monologAsyncHandler.svg?branch=master)](https://travis-ci.org/lezhnev74/monologAsyncHandler)




Handler for monolog to handle log writing through closure.
Inside the closure you can set pushing to queues.

##Example usage

```php
use lezhnev74\Monolog\Handler\ClosureHandler;
use Monolog\Logger;

$handler = new ClosureHandler(function ($record) {
    // put your data to queue
    // or any other logic goes here that detaches the logging from life circle
    
    /* 
    the $record contains:
    
    [
        "message"    => "the message goes here",
        "context"    => ["platform" => "ios"], // context
        "level"      => 200,
        "level_name" => "INFO",
        "channel"    => "local",
        "datetime"   => "",
        "extra"      => [],
        "formatted"  => "[2016-01-30 15:41:37] local.INFO: FORMATTED MESSAGE GOES HERE []\n",
    ]
    */
});
$monolog = new Logger('async_logger');
$monolog->pushHandler($handler);
```

##Installation

```
composer require lezhnev74/monolog-async-handler
```


