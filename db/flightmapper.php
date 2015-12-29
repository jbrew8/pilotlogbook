<?php
namespace OCA\PilotLogbook\Db;

use OCP\IDb;
use OCP\AppFramework\Db\Mapper;

class FlightMapper extends Mapper {

    public function __construct(IDb $db) {
        parent::__construct($db, 'pilot_logbook', '\OCA\PilotLogbook\Db\Flight');
    }

    public function find($id, $userId) {
        $sql = 'SELECT * FROM *PREFIX*pilot_logbook WHERE id = ? AND user_id = ?';
        return $this->findEntity($sql, [$id, $userId]);
    }

    public function findAll($userId) {
        $sql = 'SELECT * FROM *PREFIX*pilot_logbook WHERE user_id = ?';
        return $this->findEntities($sql, [$userId]);
    }

    public function getSummary($userId) {
        $sql = "SELECT sum(total) AS 'total', sum(dualReceived) as 'totalDual', sum(pilotInCommand) as 'totalSolo' 
             FROM *PREFIX*pilot_logbook WHERE user_id = ?";

        $query = $this->db->prepareQuery($sql);
        $query->bindParam(1, $userId, \PDO::PARAM_STR);
        $result = $query->execute();

        while($row = $result->fetchRow()) {
            $result->closeCursor();
            return array(
                "total" => $row['total'],
                "totalDual" => $row['totalDual'],
                "totalSolo" => $row['totalSolo']
            );
        }

    }

}