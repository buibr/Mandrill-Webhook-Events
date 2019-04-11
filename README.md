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

$mandrill = new Request( $secret );
    
$mandrill->events(function(Event $event){

    //  Do the purpose.

}, function(Exception $e){

    //  Do what you want on exception.

});

```