<?php


namespace buibr\MandrillEvents;


class EventMsg {


    /**
     * the integer UTC unix timstamp that the message was sent
     */
    public $ts;

    /**
     * 	the subject line of the message
     */
    public $subject;

    /**
     * the recipient's email address
     */
    public $email;

    /**
     * 
     */
    public $tags;

    /**
     * an array containing an item for each time the message was opened. Each open includes the following keys:
     * 
     * ts	    the timestamp for the open
     * ip	    the IP address where the open occurred
     * location	the approximated geolocation of the IP where the open occurred
     * ua	    a string representation of the operating system and browser (or user agent) for the open
     * 
     */
    public $opens;

    /**
     * An array containing an item for each click recorded for the message. Each item contains the following:
     *  ts      timestamp of the click
     *  url     the URL that was clicked
     */
    public $clicks;

    /**
     * sent, rejected, spam, unsub, bounced, or soft-bounced
     */
    public $state;

    /**
     * 
     * an array of JSON objects, each of which is an SMTP response received for the message. Each item in the array will contain the following keys:
     * ts	    the timestamp of the SMTP event
     * type	    the type of SMTP event, such as 'sent' or 'deferred'
     * diag	    the SMTP diagnostic or response message returned by the receiving server
     * source_ip the Mandrill IP address that was attempting to send the message
     * destination_ip the remote IP address of the server Mandrill was connected to for message relay
     * size     the size of the message being relayed
     */
    public $smtp_events;

    /**
     * the subaccount from which the message originated, if no subaccount was used, the value will be null
     */
    public $subaccount;

    /**
     * 
     */
    public $resends;

    /**
     * 
     */
    public $reject;

    
    public $_id;

    /**
     * 	the sender's email address
     */
    public $sender;


    /**
     * the slug of the template used, if any. If no template was used, the value will be null
     */
    public $template;


    public function __construct( $data )
    {
        foreach($this as $key =>$attr){
            @$this->$key = $data[$key];
        }
    }

}