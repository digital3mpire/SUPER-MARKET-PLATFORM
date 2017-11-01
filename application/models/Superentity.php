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
        $this->load->model('Entity/Artwork','entity_artwork');
        $this->assetstructure = directory_map(BASEPATH.'../public/assets/SUPER-INFORMATION-HIGH-MARKET');

        foreach($this->assetstructure as $key1 => $value1 ) {

            if ($key1 != "name_prename/") {

                if (is_array($value1)) {

                    foreach($value1 as $key2 => $value2) {

                        if (is_array($value2)) {

                            $assetid = $this->generateAssetId($key1,$key2);

                            $this->artworks[$assetid] = new Artwork();

                            $this->artworks[$assetid]->setAssetid($assetid);
                            $this->artworks[$assetid]->setTitle(ucwords($this->transformName($key2)));
                            $this->artworks[$assetid]->setArtistname(ucwords($this->transformName($key1)));

                            $this->artworks[$assetid]->setThumbnail($key1.$key2."_meta/400x400_thumbnail.jpg");
                            $this->artworks[$assetid]->setLinktocontent($key1.$key2);

                        } // if

                    } // foreach
                } // if
            } // if
        } // foreach



        // is cURL installed yet?
        /*if (!function_exists('curl_init')){
            die('Sorry cURL is not installed!');
        } else {

            $c = curl_init();
            curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($c, CURLOPT_HTTPHEADER, array('Accept: application/json', 'Content-Type: application/json'));
            curl_setopt($c, CURLOPT_URL, 'https://api.github.com/users/digital3mpire/repos');
            curl_setopt($c, CURLOPT_USERAGENT,'digital3mpire');
            $content = curl_exec($c);
            //var_dump($content);
            curl_close($c);
            $api = json_decode($content);
            // var_dump($api);

            //print($api->open_issues_count);
        }*/



    }



    function curl_download($Url){

        // is cURL installed yet?
        if (!function_exists('curl_init')){
            die('Sorry cURL is not installed!');
        }

        // OK cool - then let's create a new cURL resource handle
        $ch = curl_init();

        // Now set some options (most are optional)

        // Set URL to download
        curl_setopt($ch, CURLOPT_URL, $Url);

        // Set a referer
        curl_setopt($ch, CURLOPT_REFERER, "https://api.github.com/users/di/orgs");

        // User agent
        curl_setopt($ch, CURLOPT_USERAGENT, "MozillaXYZ/1.0");

        // Include header in result? (0 = yes, 1 = no)
        curl_setopt($ch, CURLOPT_HEADER, 0);

        // Should cURL return or print out the data? (true = return, false = print)
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Timeout in seconds
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);

        // Download the given URL, and return output
        $output = curl_exec($ch);

        // Close the cURL resource, and free system resources
        curl_close($ch);

        return $output;
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

    public function saveCollection($postdata, $supercartitems) {

        $this->load->model('Entity/Supershopcollection','Supershopcollection');


        $collection = new Supershopcollection();

        $collection->setUsername($postdata['username']);
        $collection->setUseremail($postdata['useremail']);
        $collection->setCollectionTitle($postdata['collection_title']);
        $collection->setThecollection('the collection');
        $collection->setComment($postdata['comment']);

        return $collection->save();

    }


    private function generateAssetId($name,$artwork) {

        return str_replace('/','',$name)."_".str_replace('/','',$artwork);

    }

    private function transformName($dirname) {

        return str_replace('_',' ',str_replace('/','',$dirname));

    }


}