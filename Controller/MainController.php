<?php

namespace Abienvenu\KyelaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

class MainController extends Controller
{
	/**
	 * @Route("/", name="index")
	 * @Template()
	 */
	public function indexAction(Request $request)
	{
		$info = $this->get('translator')->trans('glop');
		return ['info' => $info];
	}
}