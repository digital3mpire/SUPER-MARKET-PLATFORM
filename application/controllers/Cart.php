<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller
{
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
     *        http://example.com/index.php/welcome
     *    - or -
     *        http://example.com/index.php/welcome/index
     *    - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */


    public function index()
    {

        // Get all items in the cart
        $data['allentities'] = $this->supercart->getItems();

        //var_dump($allItems);
        /*foreach ($allItems as $items) {
            foreach ($items as $item) {
                echo 'ID: '.$item['id'].'<br />';
                echo 'Qty: '.$item['quantity'].'<br />';
                echo 'Price: '.$item['attributes']['price'].'<br />';
                echo 'Size: '.$item['attributes']['size'].'<br />';
                echo 'Color: '.$item['attributes']['color'].'<br />';
            }
        }*/
        $this->load->view('showcart',$data);
    }

}