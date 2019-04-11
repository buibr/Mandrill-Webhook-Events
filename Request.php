<?php


namespace buibr\MandrillEvents;

use buibr\MandrillEvents\Event;

class Request {

    /**
     * Mandrill webhook secret 
     */
    private $__secret;


    /**
     * Saves the response completely to this param.
     */
    private $__data;


    /**
     * List all event as Event objects here.
     */
    private $__events;

    /**
     * Initiate this class
     */
    public function __construct( $data = null ){

        if(empty($data)) {
            $this->__data = $_POST;
        } else {
            $this->__data = $data;
        }

        return $this->validation();
    }



    /**
     * Validate the request with secret
     * @throws buibr\MandrillEvents\Exceptions
     */
    public function validation()
    {
        if(empty($this->__data)){
            throw new \buibr\MandrillEvents\Exceptions('Data is empty.');
        }

        if(!isset($this->__data['mandrill_events']) || empty($this->__data['mandrill_events'])) {
            throw new \buibr\MandrillEvents\Exceptions('Events not found.');
        }

        $this->__data = \stripcslashes($this->__data['mandrill_events']);
        // print_r( json_decode( \stripcslashes($this->__data['mandrill_events']) ) );

        $this->__data = \json_decode( $this->__data, true);

        foreach($this->__data as $event){
            $this->__events[] = new Event($event);
        }

        return $this;
    }



    /**
     * Loop throught events 
     */
    public function events( $cbc, $exc){

        foreach($this->__events as $ev ){
            try {
                $cbc( $ev );
            }
            catch( \buibr\MandrillEvents\Exceptions $e){
                $exc($e);
            }
        }

    }


}