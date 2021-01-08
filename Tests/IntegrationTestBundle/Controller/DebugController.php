<?php

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class DebugController extends Controller {

	public function getAction($name) {
		return new JsonResponse(array(
			$name => $this->container->get('craue_config')->get($name),
		));
	}

}
