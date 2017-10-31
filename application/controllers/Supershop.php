<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supershop extends CI_Controller {


	private $data;

	/**
	 * Entity constructor.
	 */
	public function __construct()
	{

		parent::__construct();// you have missed this line.

		$this->load->library('session');
		$params = [
			// Can add unlimited number of item to cart
			'cartMaxItem' => 0,

			// Set maximum quantity allowed per item to 99
			'itemMaxQuantity' => 99,

			// Do not use cookie, cart data will lost when browser is closed
			'useCookie' => false,
		];
		$this->load->library('supercart', $params);

		$this->data['cartitems'] = $this->supercart->getItems();
		$this->data['allentities'] = $this->superentity->getArtworks();
		$this->data['status'] = "save";

	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('index');
	}


	public function cart()
	{

		$this->load->view('showcart',$this->data);
	}

	public function addtocart()
	{

		$get_array = $this->uri->uri_to_assoc(3);
		$this->supercart->add($get_array['id']);


		redirect('Supershop/listentity', 'refresh');


	}


	public function removefromcart()
	{

		$get_array = $this->uri->uri_to_assoc(3);
		$this->supercart->remove($get_array['id']);


		redirect('Supershop/listentity', 'refresh');


	}

	public function listentity()
	{
		// Get all items in the cart

		$this->load->view('listentity',$this->data);

	}

	public function checkout()
	{

		$this->load->helper('form');


		$this->load->view('checkout',$this->data);

	}


	public function checkout_step1() {

		$this->load->helper('form');
		$this->load->library('form_validation');

		/* validate */
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('useremail', 'Email', 'required|valid_email',
			array('required' => 'You must provide a %s.')
		);
		$this->form_validation->set_rules('collection_title', 'Collection title', 'required');


		if ($this->form_validation->run() == FALSE)
		{

			$formdata = $this->input->post(NULL, TRUE); // returns all POST items with XSS filter

			$this->load->view('checkout',$this->data);

		}
		else
		{

			$formdata = $this->input->post(NULL, TRUE); // returns all POST items with XSS filter
			$this->session->set_userdata($formdata);
			$this->data['formdata'] = $formdata;
			$this->load->view('checkout_pay',$this->data);

		}


// var_dump($formdata);die();

	}

	public function checkout_confirm()
	{

		$this->load->helper('form');

		$this->load->library('form_validation');

		/* validate */
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('useremail', 'Email', 'required|valid_email',
			array('required' => 'You must provide a %s.')
		);
		$this->form_validation->set_rules('collection_title', 'Collection title', 'required');

		if ($this->form_validation->run() == FALSE)
		{

			$c = $this->input->post(NULL, TRUE); // returns all POST items with XSS filter
			var_dump($c);
			$this->load->view('checkout',$this->data);

		}
		else
		{


			$postdata = $this->input->post(NULL, TRUE); // returns all POST items with XSS filter
			$this->superentity->saveCollection($postdata, $this->supercart->getItems());

			$this->load->view('checkout_success',$this->data);
		}


	}


}
