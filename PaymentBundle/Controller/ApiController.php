<?php

namespace Websolutio\PaymentBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Api controller.
 *
 */
class ApiController extends Controller
{

    /**
     * Api Mockup Response
     *
     */
    public function apiresponseAction()
    {
		$request = $this->getRequest();
		$param = $request->get('ammount');
		
		if ($param <= 100) {
		$postsArray = array();
		$postsArray[] = array(
                'result' => 'ok',
                'resultCode' => '1',
                'resultMessage' => 'Transaction completed',
                );
		} elseif ($param >= 101) {
		$postsArray = array();
		$postsArray[] = array(
                'result' => 'DECLINE',
                'resultCode' => '555',
                'resultMessage' => 'Amount exceed',
                );		
		}
		
		$response = new JsonResponse;
		$response->setContent(json_encode($postsArray));
		$response->setCharset("UTF-8");
		$response->setContent(json_encode(array('response' => $postsArray)));
		$response->headers->set('Content-Type', 'application/json; charset=utf-8');
		return $response;
    }
}
