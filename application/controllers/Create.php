<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Create extends Application
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
        $this->data['pagebody'] = 'Create';
        
        $this->data['character'] = 'stickman.png';
        
        $this->load();
        
		$this->render(); 
	}
    
    public function load() {
        $this->load->model('accessory');
        $this->load->model('category');
        $categories = $this->category->all();
        foreach($categories as $categorie) {
            $str = "";
            $equips = $this->accessory->getItems($categorie->id);
            foreach($equips as $equip) {
                $str .= "<option value = '$equip->name'>$equip->name</option>";
            }
            $this->data[$categorie->name] = $str;
        }
    }

}