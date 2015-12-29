<?php
namespace OCA\PilotLogbook\Service;

use Exception;

use OCP\AppFramework\Db\DoesNotExistException;
use OCP\AppFramework\Db\MultipleObjectsReturnedException;

use OCA\PilotLogbook\Db\Flight;
use OCA\PilotLogbook\Db\FlightMapper;


class FlightService {

    private $mapper;

    public function __construct(FlightMapper $mapper){
        $this->mapper = $mapper;
    }

    public function findAll($userId) {
        return $this->mapper->findAll($userId);
    }

    private function handleException ($e) {
        if ($e instanceof DoesNotExistException ||
            $e instanceof MultipleObjectsReturnedException) {
            throw new NotFoundException($e->getMessage());
        } else {
            throw $e;
        }
    }

    public function find($id, $userId) {
        try {
            return $this->mapper->find($id, $userId);

        // in order to be able to plug in different storage backends like files
        // for instance it is a good idea to turn storage related exceptions
        // into service related exceptions so controllers and service users
        // have to deal with only one type of exception
        } catch(Exception $e) {
            $this->handleException($e);
        }
    }

    public function create($array, $userId){
        $flight = Flight::fromArray($array);
        $flight->setUserId($userId);
        return $this->mapper->insert($flight);
    }

    public function update($flightArray) {
        $flight = Flight::fromArray($flightArray);
        try {
            return $this->mapper->update($flight);
        } catch(Exception $e) {
            $this->handleException($e);
        }
    }

    public function delete($id, $userId) {
        try {
            $flight = $this->mapper->find($id, $userId);
            $this->mapper->delete($flight);
            return $flight;
        } catch(Exception $e) {
            $this->handleException($e);
        }
    }

    public function getSummary($userId) {
        $summary = $this->mapper->getSummary($userId);
        return $summary;
    }

}

/*
  The bare minimum to create a flight:
        $flight = new Flight();
        $flight->setDate('2015-11-30');
        $flight->setUserId($userId);
            // id, user_id, date, aircraft, tailNumber, departurePoint, arrivalPoint, total
        $flight->setAircraft('C-172');
        $flight->setTailNumber('N12345');
        $flight->setDeparturePoint('W29');
        $flight->setArrivalPoint('ESN');
        $flight->setTotal('1.2');
*/