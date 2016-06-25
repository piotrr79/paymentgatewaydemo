<?php

namespace Websolutio\PaymentBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Websolutio\PaymentBundle\Entity\Payment;
use Websolutio\PaymentBundle\Form\PaymentType;

/**
 * Payment controller.
 *
 */
class PaymentController extends Controller
{
    /**
     * Process payment form and save results to database
     *
     */
    public function createAction(Request $request)
    {
		// Api Mockup host - please change IP it to your dev one.
		// In production or staging environment Api as well as Payment Form should use SSL protocol (https).
		$host = 'http://127.0.2.1:8080';
		$apiurl = $host. '/app_dev.php/payment/api-rsponse';
		
        $entity = new Payment();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);
        
        //validate form
        if ($form->isValid()) {
			
			// get form data
			$name = $form['name']->getData();
			$surname = $form['surname']->getData();
			$ammount = $form['ammount']->getData();
			$currency = $form['currency']->getData();
			$cardnumber = $form['cardnumber']->getData();
			$cardtype = $form['cardtype']->getData();
			$expirationmonth = $form['expirationmonth']->getData();
			$expirationyear = $form['expirationyear']->getData();
			$cvv = $form['cvv']->getData();
			// get transaction ip address for security reasons
			$ipadress = $request->getClientIp();
			
			// create curl params
			$postParams = array('name' => $name, 'surname' => $surname, 'ammount' => $ammount, 'currency' => $currency, 'cardnumber' => $cardnumber, 
			'cardtype' => $cardtype, 'expirationmonth' => $expirationmonth, 'expirationyear' => $expirationyear, 'cvv' => $cvv);
			
			// curl
			$ch = curl_init();
			$optArray = array(
				CURLOPT_URL => $apiurl,
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_POSTFIELDS => $postParams
			);
			curl_setopt_array($ch, $optArray);
			$data = curl_exec($ch);
			$result = json_decode($data,true);
			$errors = curl_error($ch);
			$response = curl_getinfo($ch, CURLINFO_HTTP_CODE);
			curl_close($ch);		
			
		    $resultCode = $result['response'][0]['resultCode'];
		    $resultMessage = $result['response'][0]['resultMessage'];
			
			// successful transaction case
			if ($resultCode == 1) {
				$em = $this->getDoctrine()->getManager();
				$entity = new Payment('UTF-8');
				$entity->setName($name);
				$entity->setSurname($surname);
				$entity->setIpaddress($ipadress);
				$entity->setAmmount($ammount);
				$entity->setCurrency($currency);
				$entity->setCardnumber($cardnumber);
				$entity->setCardtype($cardtype);
				$entity->setExpirationmonth($expirationmonth);
				$entity->setExpirationyear($expirationyear);
				$entity->setStatus(1);
				$entity->setApiresultcode($resultMessage);
				$em->persist($entity);
				$em->flush();
				
			// transaction failed case
		    } elseif ($resultCode != 1) {
				$em = $this->getDoctrine()->getManager();
				$entity = new Payment('UTF-8');
				$entity->setName($name);
				$entity->setSurname($surname);
				$entity->setIpaddress($ipadress);
				$entity->setCardnumber($cardnumber);
				$entity->setCardtype($cardtype);
				$entity->setStatus(0);
				$entity->setApiresultcode($resultMessage);
				$em->persist($entity);
				$em->flush();	

			}	    

            return $this->render('WebsolutioPaymentBundle:Payment:result.html.twig', array(
					'result' => $result,
					'resultMessage' => $resultMessage,
					'resultCode' => $resultCode,
				));
        }

    }

    /**
     * Creates a form to create a Payment entity.
     *
     * @param Payment $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Payment $entity)
    {
        $form = $this->createForm(new PaymentType(), $entity, array(
            'action' => $this->generateUrl('payment_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'procede'));

        return $form;
    }

    /**
     * Displays a form to create a new Payment entity.
     *
     */
    public function newAction()
    {
        $entity = new Payment();
        $form   = $this->createCreateForm($entity);

        return $this->render('WebsolutioPaymentBundle:Payment:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

}
