<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Application
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/
	 * 	- or -
	 * 		http://example.com/welcome/index
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
                $this->data['pagebody'] = 'home';
                
                $this->data['character'] = '<img class="center-block parent" src="https://cdn.pixabay.com/photo/2017/10/18/10/15/stick-man-2863519_960_720.png" style="width: auto; height: 100%;"/>';
                $this->data['weapon'] = '<img class="weapon" src="/assets/images/items/sword_iron.png"/>';
                $this->data['helmet'] = '<img class="helmet" style="width:80%; height:auto" src="/assets/images/items/helmet_light_iron.png"/>';
                
		$this->render(); 
	}

}
