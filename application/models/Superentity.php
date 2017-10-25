<?php
/**
 * Created by PhpStorm.
 * User: florian
 * Date: 22.10.17
 * Time: 22:04
 */

defined('BASEPATH') OR exit('No direct script access allowed');


class Superentity extends CI_Model
{

    private $assetstructure = array();


    private $assetnames = array();

    private $artistnames = array();




    public function __construct()
    {

        $this->load->model('entity/artwork','entity_artwork');
        $this->assetstructure = directory_map('../assets/SUPER-INFORMATION-HIGH-MARKET');

        var_dump($this->assetstructure);


        $i=0;
        foreach($this->assetstructure as $key => $value ) {

            if (is_array($value)) {
                $artworks[$i] = new Artwork();

                $artworks[$i]->setArtistName(ucwords($this->transformName($key)));


                echo "<br>".$artworks[$i]->getArtistname();
                $i++;

            }

        }
    }


    /**
     * @return array
     */
    public function getArtistnames()
    {
        return $this->artistnamess;
    }

    /**
     * @param array $artistnames
     */
    public function setArtistnames($artistnames)
    {
        $this->artistnames = $artistnames;
    }

    /**
     * @return array
     */
    public function getAssetnames()
    {
        return $this->assetnames;
    }

    /**
     * @param array $assetnames
     */
    public function setAssetnames($assetnames)
    {
        $this->assetnames = $assetnames;
    }


    public function getAllEntities() {

        return [
            [
                'id'=>'1',
                'header'=>'my header 1',
                'imgsrc'=>'00_img/1.jpg',
                'subheadline' => 'my subheadline 1',
                'url' => 'http://github.com/digital3mpire'
            ],
        [
            'id'=>'2',
            'header'=>'my header 2',
            'imgsrc'=>'00_img/2.jpg',
            'subheadline' => 'my subheadline 2',
                'url' => 'http://github.com/digital3mpire'
            ],
        [
            'id'=>'3',
            'header'=>'my header 3',
            'imgsrc'=>'00_img/3.jpg',
            'subheadline' => 'my subheadline 3',
                'url' => 'http://github.com/digital3mpire'
            ],
        [
            'id'=>'4',
            'header'=>'my header 4',
            'imgsrc'=>'00_img/1.jpg',
            'subheadline' => 'my subheadline 4',
            'url' => 'http://github.com/digital3mpire'
            ],

        ];

    }

    public function getAssetStructure() {

        return $this->assetstructure;

    }


    private function transformName($dirname) {

        return str_replace('_',' ',str_replace('/','',$dirname));

    }


}