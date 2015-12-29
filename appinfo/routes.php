<?php
/**
 * ownCloud - pilotlogbook
 *
 * This file is licensed under the Affero General Public License version 3 or
 * later. See the COPYING file.
 *
 * @author John Brewer VIII <jb8@octavius.org>
 * @copyright John Brewer VIII 2015
 */

/**
 * Create your routes in here. The name is the lowercase name of the controller
 * without the controller part, the stuff after the hash is the method.
 * e.g. page#index -> OCA\PilotLogbook\Controller\PageController->index()
 *
 * The controller class has to be registered in the application.php file since
 * it's instantiated in there
 */
return [
'resources' => [
        'flight_api' => ['url' => '/api/0.1/flights']
     ],    
    'routes' => [
	   ['name' => 'page#index', 'url' => '/', 'verb' => 'GET'],
	   ['name' => 'page#do_echo', 'url' => '/echo', 'verb' => 'POST'],
       ['name' => 'flight#index', 'url' => '/flights', 'verb' => 'GET'],
       ['name' => 'flight#logflight', 'url' => '/logflight', 'verb' => 'GET'],
       ['name' => 'flight#log', 'url' => '/log', 'verb' => 'GET'],
       ['name' => 'flight#add', 'url' => '/add', 'verb' => 'POST'],
       ['name' => 'flight#update', 'url' => '/update', 'verb' => 'POST'],
       ['name' => 'flight#delete', 'url' => '/delete/{id}', 'verb' => 'DELETE'],
       ['name' => 'flight_api#preflighted_cors', 'url' => '/api/0.1/{path}',
         'verb' => 'OPTIONS', 'requirements' => ['path' => '.+']]
    ]
];