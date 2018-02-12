<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Application {

    public function __construct() {
        parent::__construct();
    }

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
    public function index() {
        $this->data['pagebody'] = 'home';

        $this->data['character'] = 'stickman.png';
        $this->data['weapon'] = 'sword_iron.png';
        $this->data['helmet'] = 'helmet_light_iron.png';

        $this->render();
    }

    /**
     * Sends an array of image names as a json object based on which preset was selected.
     */
    public function update() {

        $this->load->model('equipmentSet');
        $sets = $this->equipmentSet->all();

        $this->load->model('accessory');
        $accs = $this->accessory->all();

        $choice = $this->input->post("Set");

        $set = $sets['equip1']; //Default set

        switch ($choice) {
            case "Default":
                $set = $sets['equip1'];
                echo json_encode($sets['equip1']);
                echo "\n"; //Newline to separate json objects
                break;
            case "Other":
                $set = $sets['equip2'];
                echo json_encode($sets['equip1']);
                echo "\n";
                break;
        }

        foreach ($set as $cat) {
            //Check if it's a valid accessory
            if (strpos($cat, 'equip') === 0 || strpos($cat, '0') === 0) {
                continue;
            }
            echo json_encode($accs[$cat]);
            echo "\n";
        }
    }

}
