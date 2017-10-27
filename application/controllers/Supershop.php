<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supershop extends CI_Controller {


	/**
	 * Entity constructor.
	 */
	public function __construct()
	{

		parent::__construct();// you have missed this line.
		$params = [
			// Can add unlimited number of item to cart
			'cartMaxItem' => 0,

			// Set maximum quantity allowed per item to 99
			'itemMaxQuantity' => 99,

			// Do not use cookie, cart data will lost when browser is closed
			'useCookie' => false,
		];
		$this->load->library('supercart', $params);

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

		$this->load->model('superentity');
		$data['allentities'] = $this->superentity->getArtworks();

		// Get all items in the cart
		$data['cartitems'] = $this->supercart->getItems();

		$this->load->view('showcart',$data);
	}

	public function addtocart()
	{

		$get_array = $this->uri->uri_to_assoc(3);
		$this->supercart->add($get_array['id']);


		redirect('Entity/index', 'refresh');


	}


	public function removefromcart()
	{

		$get_array = $this->uri->uri_to_assoc(3);
		$this->supercart->remove($get_array['id']);


		redirect('Entity/index', 'refresh');


	}



	public function Checkout()
	{
		$this->load->view('checkout');
	}


}
