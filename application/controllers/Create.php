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
            $str = "<option value = '0'>select.1</option>";
            $equips = $this->accessory->getItems($categorie->id);
            foreach($equips as $equip) {
                $str .= "<option value = '$equip->id'>$equip->name</option>";
            }
            $this->data[$categorie->name] = $str;
        }
    }
    
        public function update() {

        $this->load->model('accessory');
        $accs = $this->accessory->all();
        //Load models
        $this->load->model('equipmentSet');
        $sets = $this->equipmentSet->all();

        $this->load->model('accessory');
        $accs = $this->accessory->all();
        $choices = array($this->input->post("Head"), 
                        $this->input->post("Weapon"), 
                        $this->input->post("Robe"), 
                        $this->input->post("Socks"), 
                        $this->input->post("Gloves"));
        foreach($choices as $choice) {
            echo json_encode($accs[$choice]);
            echo "\n";
        }
    }

}