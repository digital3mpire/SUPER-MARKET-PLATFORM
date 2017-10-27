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

    private $artworks = array();




    public function __construct()
    {

        $this->load->helper('file');
        $this->load->model('entity/artwork','entity_artwork');
        $this->assetstructure = directory_map(BASEPATH.'../public/assets/SUPER-INFORMATION-HIGH-MARKET');

        foreach($this->assetstructure as $key1 => $value1 ) {

            if (is_array($value1)) {

                foreach($value1 as $key2 => $value2) {

                    $assetid = $this->generateAssetId($key1,$key2);

                    $this->artworks[$assetid] = new Artwork();

                    $this->artworks[$assetid]->setAssetid($assetid);
                    $this->artworks[$assetid]->setTitle(ucwords($this->transformName($key2)));
                    $this->artworks[$assetid]->setArtistname(ucwords($this->transformName($key1)));

                    $this->artworks[$assetid]->setThumbnail($key1.$key2."_meta/400x400_thumbnail.jpg");
                    $this->artworks[$assetid]->setLinktocontent("xxx");

                }
            }
        }
    }


    /**
     * @return array
     */
    public function getArtworks()
    {
        return $this->artworks;
    }

    /**
     * @param array $artworks
     */
    public function setArtworks($artworks)
    {
        $this->artworks = $artworks;
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

    private function generateAssetId($name,$artwork) {

        return str_replace('/','',$name)."_".str_replace('/','',$artwork);

    }

    private function transformName($dirname) {

        return str_replace('_',' ',str_replace('/','',$dirname));

    }


}