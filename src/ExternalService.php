<?php
namespace beeare\MockingStubbing;

class ExternalService {

    private $message;

    public function sendSomething($message)
    {
        $this->message = $message;
    }

    public function getSomething()
    {
        return 'Tested!';
    }
}