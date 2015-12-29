<?php
namespace OCA\PilotLogbook\Controller;

use OCP\IRequest;
use OCP\AppFramework\Http\DataResponse;
use OCP\AppFramework\Http\TemplateResponse;
use OCP\AppFramework\Controller;


use OCA\PilotLogbook\Service\FlightService;

class FlightController extends Controller {

    private $service;
    private $userId;

    use Errors;

    public function __construct($AppName, IRequest $request,
                                FlightService $service, $UserId){
        parent::__construct($AppName, $request);
        $this->service = $service;
        $this->userId = $UserId;
    }

    /**
     * @NoAdminRequired
     */
    public function index() {
        return new DataResponse($this->service->findAll($this->userId));
    }
 
    /**
     * @NoAdminRequired
     * @NoCSRFRequired
     */
    public function logflight() {
		$params = ['user' => $this->userId];
        return new TemplateResponse('pilotlogbook', 'part.logflight', $params, '');  // templates/main.php
    }

    /**
     * @NoAdminRequired
     * @NoCSRFRequired
     */
    public function log() {
		$params = ['user' => $this->userId];
        return new TemplateResponse('pilotlogbook', 'part.log', $params, '');
    }


    public function add($flight){
        return $this->service->create($flight, $this->userId);
    }
    

    /**
     * @NoAdminRequired
     *
     * @param int $id
     */
    public function show($id) {
        return $this->handleNotFound(function () use ($id) {
            return $this->service->find($id, $this->userId);
        });
    }

    /**
     * @NoAdminRequired
     *
     * @param int $id
     * @param string $title
     * @param string $content
     */
    public function update($flight) {
        $id = $flight['id'];
        return $this->handleNotFound(function () use ($id, $flight) {
            return $this->service->update($flight);
        });
    }

    /**
     * @NoAdminRequired
     *
     * @param int $id
     */
    public function delete($id) {
        return $this->handleNotFound(function () use ($id) {
            return $this->service->delete($id, $this->userId);
        });
    }


    /**
     * @NoAdminRequired
     *
     * @param string $userId
     */
    public function summary() {
        return $this->service->getSummary($this->userId);
    }
}