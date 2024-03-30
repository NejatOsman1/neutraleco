<?php

namespace App\Trinity\ApiBundle\Controller;

//FOS\RestBundle\FOSRestBundle

use FOS\RestBundle\Controller\AbstractFOSRestController;
use Symfony\Component\Routing\Annotation\Route;
use Nelmio\ApiDocBundle\Annotation\Operation;
use Nelmio\ApiDocBundle\Annotation\Model;
use OpenApi\Annotations as OA;
use Nelmio\ApiDocBundle\Annotation\Security;

/**
 * DefaultController
 *
 * ================================================
 * Example string for oAuth authentidation:
 * ================================================
 *
 * curl --data "
 *     grant_type=password
 *     &client_id=1_3bcbxd9e24g0gk4swg0kwgcwg4o8k8g4g888kwc44gcc0gwwk4
 *     &client_secret=4ok2x70rlfokc8g0wws8c8kwcokw80k44sg48goc0ok4w0so0k
 *     &username=admin
 *     &password=admin
 * " https://www.example.nl/oauth/v2/token
 *
 * Info:
 *
 * grant_type:      default to password authentication
 * client_id:       <id>_<random_id>    (table: oauth2_clients)
 * client_secret:   <secret>            (table: oauth2_clients)
 *
 * ================================================
 * API request using token:
 * ================================================
 *
 * curl --header "Authorization:Bearer MjNkZTBmNDE0MTRkNzkwZTdlYjNhMTAwM2Q3ZDAwMjI3ZGI5ODRiZWJkMGViOTBkZWY3ZmUxMDA5ZjQ1Y2I1NQ" https://www.example.nl/api/profile
 *
 * ================================================
 * Example string for oAuth refresh:
 * ================================================
 *
 * curl --data "
 *     grant_type=refresh_token
 *     &client_id=1_3bcbxd9e24g0gk4swg0kwgcwg4o8k8g4g888kwc44gcc0gwwk4
 *     &client_secret=4ok2x70rlfokc8g0wws8c8kwcokw80k44sg48goc0ok4w0so0k
 *     &refresh_token=MzM2NTI4NzNmZTM1OGNkYTUyYzQxMjQ5NjAzMDc5YzA3NzI1OTg3Y2ExMmIyYzM1NDJmM2Q2NzY3Y2UwMDc0Ng
 * " https://www.example.nl/oauth/v2/token
 *
 * Info:
 *
 * grant_type:      default to password authentication
 * client_id:       <id>_<random_id>    (table: oauth2_clients)
 * client_secret:   <secret>            (table: oauth2_clients)
 * refresh_token:   <token>             (table: oauth2_refresh_tokens)
 */

class DefaultController extends AbstractFOSRestController
{
    /**
     * Ping user authentication
     *
     * @Route("/api/ping", methods={"GET"})
     * @OA\Response(
     *     response=200,
     *     description="Returned when successful"
     * )
     * @OA\Tag(name="Misc")
     * @Security(name="Bearer")
     */
    public function getApiPingAction()
    {
        $data = array("success" => true);
        $view = $this->view($data);
        return $this->handleView($view);
    }

}
