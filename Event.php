<?php


namespace buibr\MandrillEvents;


class Event {

    /**
     * Name of the event, sent, open, click ...
     */
    private $event;


    /**
     * Unique id per email sent.
     */
    private $_id;


    /**
     * The body fo this event.
     */
    private $msg;

    
    /**
     * for open and click events only, the user agent string for the environment (ie, browser or email client) where the open or click occurred
     */
    private $user_agent;

    /**
     * 	for open and click events only, the ip address where the event originated
     */
    private $ip;

    /**
     * 
     * for open and click events only, the location where the event occurred. value will be null if no location can be determined from the ip address of the event. otherwise, an array of key/value pairs with the following keys:
     * country_short    string	abbreviated country
     * country_long     string	the full country name
     * region           string	 
     * city             string	 
     * postal_code      string	 
     * timezone     	string	 
     * latitude     	floating point number	can be negative
     * longitude        floating point number	can be negative
     * 
     * 
     */
    private $location;

    /**
     * 
     */
    private $user_agent_parsed;

    /**
     * Initiate this class
     */
    public function __construct( $data = null ){
        return $this->validation( $data );
    }



    /**
     * Validate the request with secret
     * @throws buibr\MandrillEvents\Exceptions
     */
    public function validation( $data = [])
    {
        if(empty($data['event'])){
            throw new \buibr\MandrillEvents\Exceptions('Invalid event type.');
        }
        $this->event = $data['event'];

        if(empty($data['_id'])){
            throw new \buibr\MandrillEvents\Exceptions('Invalid event id.');
        }
        $this->_id = $data['_id'];

        if(empty($data['msg'])){
            throw new \buibr\MandrillEvents\Exceptions('Invalid message sent.');
        }

        $this->msg          = new EventMsg($data['msg']);
        $this->user_agent   = isset($data['user_agent']) ? $data['user_agent'] : null;
        $this->ip           = isset($data['ip']) ? $data['ip'] : null;
        $this->location     = isset($data['location']) ? $data['location'] : null;
        $this->user_agent_parsed = isset($data['user_agent_parsed']) ? $data['user_agent_parsed'] : null;

        return $this;
    }

    /**
     * 
     * Check if event is opent or not.
     */
    public function isSent() {
        return ($this->event === 'sent' || $this->msg->state === 'sent');
    }


    /**
     * 
     * Check if event is opent or not.
     */
    public function isOpen() {
        return !empty($this->msg->opens);
    }


    /**
     *  if email is clicked. 
     */
    public function isClicked() {
        return !empty($this->msg->clicks);
    }

    /**
     * If mandrill rejected to send.
     */
    public function isRejected()
    {
        return !empty($this->msg->reject);
    }


    /**
     * 
     */
    public function getMsg()
    {
        return $this->msg;
    }


    /**
     * 
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     *  sent, rejected, spam, unsub, bounced, or soft-bounced
     */
    public function getStatus()
    {
        return $this->msg->state;
    }

     
}