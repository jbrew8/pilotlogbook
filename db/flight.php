<?php
namespace OCA\PilotLogbook\Db;

use JsonSerializable;

use OCP\AppFramework\Db\Entity;

class Flight extends Entity implements JsonSerializable {

    protected $userId;
    protected $date;
    protected $aircraft;
    protected $tailNumber;
    protected $departurePoint;
	
    protected $arrivalPoint;	
	protected $sel;
	protected $mel;
	protected $rotorcraft;

	//Type of Piloting Time
    protected $dualReceived;
    protected $pilotInCommand;
    protected $secondInCommand;
	protected $asFlightInstructor;
    protected $groundTrainer;
    	
	// Conditions of Flight
    protected $day;
    protected $night;
    protected $crossCountry;
    protected $actualInstrument;
    protected $simulatedInstrument;
    
	// Landings
    protected $instrumentApproach;
    protected $dayLandings;
    protected $nightLandings;
    	
	// Totals
    protected $total;

	// CFI Info
    protected $cfiName;
    protected $cfiNumber;

    protected $notes;

    
    public function jsonSerialize() {
        return [
            'id' => $this->id,
            'userID' => $this->userId,
            'date' => $this->date,
            'aircraft' => $this->aircraft,
            'tailNumber' => $this->tailNumber,
            'departurePoint' => $this->departurePoint,
            'arrivalPoint' => $this->arrivalPoint,
            'singleEngineLand' => $this->sel,
            'multiEngineLand' => $this->mel,
            'rotorcraft' => $this->rotorcraft,
            'dualReceived' => $this->dualReceived,
            'pilotInCommand' => $this->pilotInCommand,
            'secondInCommand' => $this->secondInCommand,
            'asFlightInstructor' => $this->groundTrainer,
            'day' => $this->day,
            'night' => $this->night,
            'crossCountry' => $this->crossCountry,
            'actualInstrument' => $this->actualInstrument,
            'simulatedInstrument' => $this->simulatedInstrument,
            'instrumentApproach' => $this->instrumentApproach,
            'dayLandings' => $this->dayLandings,
            'nightLandings' => $this->nightLandings,
            'total' => $this->total,
            'cfiName' => $this->cfiName,
            'cfiNumber' => $this->cfiNumber,
            'notes' => $this->notes
        ];
    }

    /**
       helper method to create an instance of a flight object from
       an array of key/value pairs (a decoded JSON object).
    */
    public static function fromArray($array){
        $flight = new Flight();
        $flight->setId($array['id']);
        if (array_key_exists('userId', $array)) {
            $flight->setUserId($array['userId']);
        }
        $flight->setDate($array['date']);
        $flight->setAircraft($array['aircraft']);
        $flight->setTailNumber($array['tailNumber']);
        $flight->setDeparturePoint($array['departurePoint']);
        $flight->setArrivalPoint($array['arrivalPoint']);
        $flight->setSel($array['singleEngineLand']);
        $flight->setMel($array['multiEngineLand']);
        $flight->setRotorcraft($array['rotorcraft']);
        $flight->setDualReceived($array['dualReceived']);
        $flight->setPilotInCommand($array['pilotInCommand']);
        $flight->setSecondInCommand($array['secondInCommand']);
        $flight->setasFlightInstructor($array['asFlightInstructor']);
        $flight->setDay($array['day']);
        $flight->setNight($array['night']);
        $flight->setCrossCountry($array['crossCountry']);
        $flight->setActualInstrument($array['actualInstrument']);
        $flight->setSimulatedInstrument($array['simulatedInstrument']);
        $flight->setInstrumentApproach($array['instrumentApproach']);
        $flight->setDayLandings($array['dayLandings']);
        $flight->setNightLandings($array['nightLandings']);
        $flight->setTotal($array['total']);
        $flight->setCfiName($array['cfiName']);
        $flight->setCfiNumber($array['cfiNumber']);
        $flight->setNotes($array['notes']);

        return $flight;
    }

    // Because I didn't know how column names are mapped to properties when I wrote this class...
    public function propertyToColumn($property) {
        switch($property){
          case "userId":
            return "user_id";
          default:
            return $property;
        }
        
    }
    
}