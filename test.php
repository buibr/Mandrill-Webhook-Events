<?php


require  __DIR__ . '/Request.php';
require  __DIR__ . '/Exceptions.php';
require  __DIR__ . '/Event.php';
require  __DIR__ . '/EventMsg.php';


$mandrill = new \buibr\MandrillEvents\Request();

// print('<pre>');
// print_r(
//     $mandrill
// );
// print('</pre>');
// die;

$mandrill->events(function( \buibr\MandrillEvents\Event $event){

    print('<pre>');
    print_r([
        $event->getid(),
        $event->getStatus()
    ]);
    print('</pre>');
    die; ;

}, function(Exception $e){

    //  Do what you want on exception.
    print('<pre>');
    print_r( $e->getMessage() );
    print('</pre>');
    die;

});

// [{"event":"send","_id":"4762f57725474465b02bc9e91143796b","msg":{"ts":1554978258,"subject":"Merhaba,lig heyecanini youwinde yasayin! 15TL ve size ozel 250 TL\'ye kadar %100 bedava bahis sansini kacirmayin!","email":"fatihakarken1992@gmail.com","tags":[],"opens":[],"clicks":[],"state":"sent","smtp_events":[],"subaccount":null,"resends":[],"reject":null,"_id":"4762f57725474465b02bc9e91143796b","sender":"contact@hepsibahisvip.com","template":null},"ts":1554978259}]

// [
//     'post' => [
//         'mandrill_events' => '[{"event":"send","_id":"c8b5cfe05cef4cd9a042cf90435a7272","msg":{"ts":1554977146,"subject":"Merhaba,lig heyecanini youwinde yasayin! 15TL ve size ozel 250 TL\'ye kadar %200 bedava bahis sansini kacirmayin!","email":"sagircaglayan@gmail.com","tags":[],"opens":[],"clicks":[],"state":"sent","smtp_events":[],"subaccount":null,"resends":[],"reject":null,"_id":"c8b5cfe05cef4cd9a042cf90435a7272","sender":"contact@hepsibahisvip.com","template":null},"ts":1554977147},{"event":"send","_id":"da0b96828d064a78b505e74909d36aa9","msg":{"ts":1554977836,"subject":"Merhaba,lig heyecanini youwinde yasayin! 15TL ve size ozel 250 TL\'ye kadar %200 bedava bahis sansini kacirmayin!","email":"okters78@gmail.com","tags":[],"opens":[],"clicks":[],"state":"sent","smtp_events":[],"subaccount":null,"resends":[],"reject":null,"_id":"da0b96828d064a78b505e74909d36aa9","sender":"contact@hepsibahisvip.com","template":null},"ts":1554977836},{"event":"send","_id":"a5a481d3bc204f9e84ed9f2d18c16088","msg":{"ts":1554977986,"subject":"Merhaba,lig heyecanini youwinde yasayin! 15TL ve size ozel 250 TL\'ye kadar %100 bedava bahis sansini kacirmayin!","email":"cagriseviner1954@gmail.com","tags":[],"opens":[],"clicks":[],"state":"sent","smtp_events":[],"subaccount":null,"resends":[],"reject":null,"_id":"a5a481d3bc204f9e84ed9f2d18c16088","sender":"contact@hepsibahisvip.com","template":null},"ts":1554977986}]',
//     ],
//     'get' => [],
// ]