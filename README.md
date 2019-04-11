# budget-sms-php

<h4>Install with composer</h4>

```terminal
composer requre buibr/budget-sms-php
```

<h4>Usage:</h4> 

```php
use buibr\MandrillEvents\Request;
use buibr\MandrillEvents\Event;
use buibr\MandrillEvents\Exception;

$mandrill = new Request();
    
$mandrill->events(function(Event $event){

    //  Do the purpose.
    print_r([
        $event->getid(),
        $event->getStatus()
    ]);

}, function(Exception $e){

    //  Do what you want on exception.

});

```