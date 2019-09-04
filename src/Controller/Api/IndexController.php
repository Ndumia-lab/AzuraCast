<?php
namespace App\Controller\Api;

use App\Entity;
use App\Http\Response;
use App\Http\ServerRequest;
use Azura\Timezone;
use Psr\Http\Message\ResponseInterface;

class IndexController
{
    /**
     * Public index for API.
     *
     * @param ServerRequest $request
     * @param Response $response
     * @return ResponseInterface
     */
    public function indexAction(ServerRequest $request, Response $response): ResponseInterface
    {
        return $response->withRedirect('/static/api/index.html');
    }

    /**
     * @OA\Get(path="/status",
     *   tags={"Miscellaneous"},
     *   description="Returns an affirmative response if the API is active.",
     *   parameters={},
     *   @OA\Response(
     *     response=200,
     *     description="Success",
     *     @OA\JsonContent(ref="#/components/schemas/Api_SystemStatus")
     *   )
     * )
     *
     * @param ServerRequest $request
     * @param Response $response
     * @return ResponseInterface
     */
    public function statusAction(ServerRequest $request, Response $response): ResponseInterface
    {
        return $response->withJson(new Entity\Api\SystemStatus);
    }

    /**
     * @OA\Get(path="/time",
     *   tags={"Miscellaneous"},
     *   description="Returns the time (with formatting) in GMT and the user's local time zone, if logged in.",
     *   parameters={},
     *   @OA\Response(
     *     response=200,
     *     description="Success",
     *     @OA\JsonContent(ref="#/components/schemas/Api_Time")
     *   )
     * )
     *
     * @param ServerRequest $request
     * @param Response $response
     * @return ResponseInterface
     */
    public function timeAction(ServerRequest $request, Response $response): ResponseInterface
    {
        $tz_info = Timezone::getInfo();
        return $response->withJson(new Entity\Api\Time($tz_info));
    }
}
