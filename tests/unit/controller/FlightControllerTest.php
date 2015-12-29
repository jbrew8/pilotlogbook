<?php
namespace OCA\PilotLogbook\Controller;

use PHPUnit_Framework_TestCase;

use OCP\AppFramework\Http;
use OCP\AppFramework\Http\DataResponse;

use OCA\PilotLogbook\Service\NotFoundException;


class FlightControllerTest extends PHPUnit_Framework_TestCase {

    protected $controller;
    protected $service;
    protected $userId = 'admin';
    protected $request;

    public function setUp() {
        $this->request = $this->getMockBuilder('OCP\IRequest')->getMock();
        $this->service = $this->getMockBuilder('OCA\PilotLogbook\Service\FlightService')
            ->disableOriginalConstructor()
            ->getMock();
                $this->controller = new FlightController(
            'pilotlogbook', $this->request, $this->service, $this->userId
        );
    }

    public function testCreate(){
        $this->service->expects($this->once())
            ->method('create')
            ->with($this->equalTo('title'),
                   $this->equalTo('content'),
                   $this->equalTo($this->userId))
            ->will($this->returnValue($flight));

        $result = $this->controller->create('title', 'content');
        $this->assertEquals($flight, $result->getData());
    }

    
    public function testUpdate() {
        $flight = 'just check if this value is returned correctly';
        
        $this->service->expects($this->once())
            ->method('update')
            ->with($this->equalTo(3),
                   $this->equalTo($this->userId))
            ->will($this->returnValue($flight));
        
        $result = $this->controller->update(3, 'title', 'content');

        $this->assertEquals($flight, $result->getData());
    }
    

    
    public function testUpdateNotFound() {
        // test the correct status code if no note is found
        $this->service->expects($this->once())
            ->method('update')
            ->will($this->throwException(new NotFoundException()));

        $result = $this->controller->update(3, 'title', 'content');

        $this->assertEquals(Http::STATUS_NOT_FOUND, $result->getStatus());
    }
    

}