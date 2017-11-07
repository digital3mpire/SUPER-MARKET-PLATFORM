<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supershoppingcart extends CI_Controller
{


    private $data;

    /**
     * Entity constructor.
     */
    public function __construct()
    {

        parent::__construct();// you have missed this line.

        //$this->load->library('session');
        $params = [
            // Can add unlimited number of item to cart
            'cartMaxItem' => 0,

            // Set maximum quantity allowed per item to 99
            'itemMaxQuantity' => 99,

            // Do not use cookie, cart data will lost when browser is closed
            'useCookie' => false,
        ];
        $this->load->library('supercart', $params);
        $this->data['allentities'] = $this->superentity->getArtworks();

        $this->data['cartitems'] = $this->supercart->getItems();


    }


    public function showcart()
    {

        $this->load->view('showcart', $this->data);
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




}
