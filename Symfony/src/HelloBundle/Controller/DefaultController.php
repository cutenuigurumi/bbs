<?php

namespace HelloBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
		$user1 = array(
			'username' => 'ebara',
			'email' => 'ebara@');
		$user2 = array(
			'username' => 'test',
			'email' => 'test@');
		$user3 = array(
			'username' => 'aaa',
			'email' => 'aaa@');
		$users = array($user1, $user2, $user3);
		$time = date( "Y/m/d (D) H:i:s", time());
        return $this->render('WinRoadHelloBundle:Default:index.html.twig', array('name' => $name, 'time' => $time, 'users' => $users));
		
    }
}
