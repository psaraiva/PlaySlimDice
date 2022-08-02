<?php
declare(strict_types=1);

use App\Application\Actions\Dice\RollDiceAction;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;

return function (App $app) {
    $app->options('/{routes:.*}', function (Request $request, Response $response) {
        // CORS Pre-Flight OPTIONS Request Handler
        return $response;
    });

    $app->get('/', function (Request $request, Response $response) {
        $response->getBody()->write('Slim PHP!');
        return $response;
    });

    $app->get('/api/dice/play', RollDiceAction::class);
};
