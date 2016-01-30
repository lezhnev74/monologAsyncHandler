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
});
$monolog = new Logger('async_logger');
$monolog->pushHandler($handler);
```

##Installation

```
composer require lezhnev74/monolog-async-handler
```


