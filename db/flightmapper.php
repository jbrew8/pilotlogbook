<?php
namespace OCA\PilotLogbook\Db;

use OCP\IDb;
use OCP\AppFramework\Db\Mapper;

class FlightMapper extends Mapper {

    public function __construct(IDb $db) {
        parent::__construct($db, 'pilot_log', '\OCA\PilotLogbook\Db\Flight');
    }

    public function find($id, $userId) {
        $sql = 'SELECT * FROM *PREFIX*pilot_log WHERE id = ? AND user_id = ?';
        return $this->findEntity($sql, [$id, $userId]);
    }

    public function findAll($userId) {
        $sql = 'SELECT * FROM *PREFIX*pilot_log WHERE user_id = ?';
        return $this->findEntities($sql, [$userId]);
    }

}