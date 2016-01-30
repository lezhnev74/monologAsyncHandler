# MonologAsyncHandler

Handler for monolog to handle log writing through closure.
Inside the closure you can set pushing to queues.

##Example usage

```php
$handler = new ClosureHandler(function ($record) {
    // put your data to queue
    // or any other logic goes here that detaches the logging from life circle
});
$monolog = new Logger('async_logger');
$monolog->pushHandler($handler);
```

##Installation

composer require 
