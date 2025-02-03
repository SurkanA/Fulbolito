<?php
// Web
require_once 'app/controllers/user.controller.php';
require_once 'app/controllers/team.controller.php';
require_once 'app/controllers/player.controller.php';

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

if ($_GET['action'] != 'api') {
    $action = !empty($_GET['action']) ? $_GET['action'] : 'home';
    $params = explode('/', $action);

    switch ($params[0]) {
        case 'home':
            $controller = new UserController();
            $controller->showHome();
            break;
        // User
        case 'login':
            $controller = new UserController();
            $controller->login();
            break;
        case 'logout':
            $controller = new UserController();
            $controller->logout();
        case 'register':
            $controller = new UserController();
            $controller->register();
            break;
        case 'addUser':
            $controller = new UserController();
            $controller->addUser();
        case 'authUser':
            $controller = new UserController();
            $controller->authUser();
            break;
        // Player
        case 'players':
            $controller = new PlayerController();
            $controller->showPlayers();
            break;
        case 'player':
            $controller = new PlayerController();
            if (isset($params[1]) && isset($params[2])) {
                $controller->showPlayer($params[1], $params[2]);
            } else {
                $controller->showPlayers();
            }
            break;
        case 'addPlayer':
            $controller = new PlayerController();
            $controller->insertPlayer();
            break;
        case 'modifyPlayer':
            $controller = new PlayerController();
            if (isset($params[1]) && isset($params[2])) {
                $controller->showModPlayer($params[1], $params[2]);
            } else {
                $controller->showPlayers();
            }
            break;
        case 'updatePlayer':
            $controller = new PlayerController();
            if (isset($params[1]) && isset($params[2])) {
                $controller->updatePlayer($params[1], $params[2]);
            } else {
                $controller->showPlayers();
            }
            break;
        case 'deletePlayer':
            $controller = new PlayerController();
            if (isset($params[1]) && isset($params[2])) {
                $controller->deletePlayer($params[1], $params[2]);
            } else {
                $controller->showPlayers();
            }
            break;
        // Team
        case 'teams':
            $controller = new TeamController();
            $controller->showTeams();
            break;
        case 'team':
            $controller = new TeamController();
            if (isset($params[1])) {
                $controller->showTeam($params[1]);
            }
            break;
        case 'createTeam':
            $controller = new TeamController();
            $controller->createTeam();
            break;
        case 'deleteTeam':
            $controller = new TeamController();
            if (isset($params[1])) {
                $controller->deleteTeam($params[1]);
            } else {
                $controller->showTeams();
            }
            break;
        case 'updateTeam':
            $controller = new TeamController();
            $controller->updateTeam();
            break;
        case 'modifyTeam':
            $controller = new TeamController();
            if (isset($params[1])) {
                $controller->editTeam($params[1]);
            } else {
                $controller->showTeams();
            }
            break;
        default:
            echo "404 not found";
            break;
    }
}
// API
require_once 'libs/router.php';
require_once 'api/controllers/jugador.api.controller.php';
require_once 'api/controllers/equipo.api.controller.php';

if (!empty($_GET['resource'])) {
    $router = new Router();
    
    // Players
    $router->addRoute('jugadores', 'GET', 'JugadorApiController', "obtenerJugadores");
    $router->addRoute('jugadores/paginar/:CANTIDAD', 'GET', 'JugadorApiController', "obtenerJugadoresPaginado");
    $router->addRoute('jugadores/filtrar/:FILTRO/:VALOR', 'GET', 'JugadorApiController', "obtenerJugadoresFiltro");
    $router->addRoute('jugadores/ordenar/:CATEGORIA/:ORDEN', 'GET', 'JugadorApiController', "obtenerJugadoresOrdenado");
    $router->addRoute('jugador/:EQUIPO/:ID', 'GET', 'JugadorApiController', "obtenerJugador");
    $router->addRoute('jugador/:EQUIPO/:ID', 'PUT', 'JugadorApiController', "actualizarJugador");
    $router->addRoute('jugador/:EQUIPO/:ID', 'DELETE', 'JugadorApiController', "borrarJugador");
    $router->addRoute('jugador', 'POST', 'JugadorApiController', "crearJugador");
    
    // Teams
    $router->addRoute('equipo', 'GET', 'EquipoApiController', 'obtenerEquipos');
    $router->addRoute('equipo/:id', 'GET', 'EquipoApiController', "obtenerEquipo");
    $router->addRoute('equipo', 'POST', 'EquipoApiController', "crearEquipo");
    $router->addRoute('equipo/:id', 'DELETE', 'EquipoApiController', "borrarEquipo");
    $router->addroute('equipo/:id', 'PUT', 'EquipoApiController', "updateEquipo");
    
    $router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);

}