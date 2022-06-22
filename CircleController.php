<?php
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class CircleController extends Controller
{
	/**
     * @Route("/circle/surface/{number}", name="circle_surface")
	*/
    public function surface(Request $request)
    {
		$number=$request->get('number');//$request->query->get('radius');
		if(is_numeric($number)){
			$area = (22/7) * ($number*$number);
			$circum = 2*3.14*$number;
        	$response = new Response(json_encode(array('type' => 'Circle','radius'=>number_format($number,1),'surface'=>number_format($area,1),'circumference'=>$circum)));
			$response->headers->set('Content-Type', 'application/json');
			return $response;
		}else{
			$response = new Response(json_encode(array('message' => 'Please Enter valid number')));
			$response->headers->set('Content-Type', 'application/json');
			return $response;
		}
    }
	/**
     * @Route("/circle/diameter/{number}", name="circle_diameter")
	*/
	 public function diameter(Request $request)
    {
		$number=$request->get('number');//$request->query->get('radius');
		if(is_numeric($number)){
			$diameter = 2*$number;
        	$response = new Response(json_encode(array('type' => 'Circle','radius'=>number_format($number,1),'diameter'=>number_format($diameter,1))));
			$response->headers->set('Content-Type', 'application/json');
			return $response;
		}else{
			$response = new Response(json_encode(array('message' => 'Please Enter valid number')));
			$response->headers->set('Content-Type', 'application/json');
			return $response;
		}
    }
}