<?php
namespace OCA\PilotLogbook\Service;

use PHPUnit_Framework_TestCase;

use OCP\AppFramework\Db\DoesNotExistException;

use OCA\PilotLogbook\Db\Flight;

class FlightServiceTest extends PHPUnit_Framework_TestCase {

    private $service;
    private $mapper;
    private $userId = 'john';

    public function setUp() {
        $this->mapper = $this->getMockBuilder('OCA\PilotLogbook\Db\FlightMapper')
            ->disableOriginalConstructor()
            ->getMock();
        //        $this->service = new FlightService($this->mapper);
        $this->service = $this->getMockBuilder('OCA\PilotLogbook\Service\FlightService')
                       ->disableOriginalConstructor()
                       ->getMock();

    }

    public function testCreate(){
        $this->service->expects($this->once())
            ->method('create')
            ->with($this->equalTo($userId))
            ->will($this->returnValue($flight));

        $result = $this->service->create($userId);
        $this->assertNotEquals(null, $result);
        //        $result = $this->mapper->insert(new Flight());
    }
    
    /*
    public function testUpdate() {
        // the existing note
        $note = Flight::fromRow([
            'id' => 3,
            'title' => 'yo',
            'content' => 'nope'
        ]);
        $this->mapper->expects($this->once())
            ->method('find')
            ->with($this->equalTo(3))
            ->will($this->returnValue($note));

        // the note when updated
        $updatedNote = Note::fromRow(['id' => 3]);
        $updatedNote->setTitle('title');
        $updatedNote->setContent('content');
        $this->mapper->expects($this->once())
            ->method('update')
            ->with($this->equalTo($updatedNote))
            ->will($this->returnValue($updatedNote));

        $result = $this->service->update(3, 'title', 'content', $this->userId);

        $this->assertEquals($updatedNote, $result);
    }
    */

       
    /**
     * @expectedException OCA\Pilotlogbook\Service\NotFoundException
     */
    /*
    public function testUpdateNotFound() {
        // test the correct status code if no note is found
        $this->mapper->expects($this->once())
            ->method('find')
            ->with($this->equalTo(3))
            ->will($this->throwException(new NotFoundException('')));

        $this->service->update(3, 'title', 'content', $this->userId);
    }
    */

}