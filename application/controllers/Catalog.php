<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Catalog extends Application
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
		$this->load->model('accessory');
		$accs = $this->accessory->all();
		$this->load->model('category');
		$categories = $this->category->all();

		$itemTables = '';

		foreach ($categories as $cat) {
			$items = $this->accessory->getItems($cat->id);

			$itemList = array();

			foreach($items as $item) {
				$itemList[] = $this->parser->parse('itembox', (array) $item, true);
			}

			$this->load->library('table');
			$parms = array (
				'table_open' => '<table>',
				'cell_start' => '<td>'
			);
			$this->table->set_template($parms);

			// finally! generate the table
			$rows = $this->table->make_columns($itemList, 4);

			$itemTables .= '<h2>' . $cat->name . '</h2> <p>' . $cat->description . '</p>';

			$itemTables .= $this->table->generate($rows);
		}

    	// prints all categories
		// print_r($all_the_items);
		
		// prime the table class
			
		$role = $this->session->userdata('userrole');
		$this->data['pagetitle'] = 'Current User ('. $role . ')';

		if ($role == ROLE_OWNER) 
        	$this->data['edit'] = $this->parser->parse('modify',[], true);
		else
			$this->data['edit'] = " ";
			
		$this->data['itemTable'] = $itemTables;
        
        $this->data['pagebody'] = 'catalog';
		$this->render(); 
	}

	public function modify() {
		$this->showForm();
	}

	public function showForm() {
		$this->load->helper('form');
        //$task = $this->session->userdata('task');
        //$this->data['id'] = $equip->id;
        // if no errors, pass an empty message
        if ( ! isset($this->data['error']))
            $this->data['error'] = '';
        $fields = array(
			'fhead'		 => form_label('Head') . form_input(),//enter the variable new value inside like this form_input($equip->head)
			'fbody'		 => form_label('Body') . form_input(),
			'fweapon'		 => form_label('Weapon'). form_input(),
			'ffoot'		 => form_label('Foot'). form_input(),
			'fgloves'		 => form_label('Gloves'). form_input(),			
            'zsubmit'    => form_submit('submit', 'Submit'),
        );
        $this->data = array_merge($this->data, $fields);
        $this->data['pagebody'] = 'modifySet';
        $this->render();
	}

	public function cancel() {
		//$this->session->unset_userdata('task');
        redirect('/catalog');
	}

	public function delete() {
		//$dto = $this->session->userdata('task');
        //$task = $this->tasks->get($dto->id);
        //$this->tasks->delete($task->id);
        //$this->session->unset_userdata('task');
        redirect('/catalog');
	}
}