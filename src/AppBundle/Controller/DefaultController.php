<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction($page=1)
    {
		$client = new \Github\Client();
		$organizationApi = $client->api('user');
		$organizationApi->setPerPage(100);

		$paginator  = new \Github\ResultPager( $client );
		$parameters = array('symfony');
		$result     = $paginator->fetch($organizationApi, 'repositories', $parameters);

		// print_R($result);exit;
        // replace this example code with whatever you need
        return $this->render('default/index2.html.twig', [
            'result' => $result,
        ]);
    }
}
