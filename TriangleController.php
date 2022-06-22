<?php

namespace AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class TriangleController extends Controller
{
  
	/**
     * @Route("/triangle/{a}/{b}/{c}", name="triangle")
	*/
    public function index(Request $request)
    {
		$base = $request->get('a');
		$perp = $request->get('b');
		$hypo = $request->get('c');
		if(is_numeric($base) && is_numeric($perp) && is_numeric($hypo)){	
			$circum = number_format($base + $perp + $hypo,1);
			$area = number_format(($base/2) * $perp,1);
			$response = new Response(json_encode(array('type' => 'Triangle','a'=>number_format($base,1),'b'=>number_format($perp,1),'c'=>number_format($hypo,1),'surface'=>$area,'circumference'=>$circum)));
			$response->headers->set('Content-Type', 'application/json');
			return $response;
		}else{
			$response = new Response(json_encode(array('message' => 'Please Enter valid number')));
			$response->headers->set('Content-Type', 'application/json');
			return $response;
		}
    }
}