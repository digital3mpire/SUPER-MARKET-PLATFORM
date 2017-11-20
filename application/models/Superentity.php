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


    /**
     * Superentity constructor.
     * @param bool $loadfromgithub
     */
    public function __construct($loadfromgithub = FALSE)
    {

        $this->load->helper('file');
        $this->load->model('Entity/Artwork', 'entity_artwork');

        if ($loadfromgithub == TRUE) {

            $this->loadgithub();

        } else {

            $this->assetstructure = directory_map(BASEPATH . '../public/assets/SUPER-INFORMATION-HIGH-MARKET');
            $this->loadfromfile($this->assetstructure);

        }

    }


    /**
     * @param $a_assetrootdir
     */
    public function loadfromfile($a_assetrootdir)
    {

        /* first step:
           walk through first level of directory and get the artistnames */
        foreach ($a_assetrootdir as $key1 => $dirlevel_1) {

            // we only want arrays cause arrays are directories AND we do not want the example directorystucture
            if ($key1 != "name_prename/" && is_array($dirlevel_1)) {

                /* lest walk through the content of the first level directories (the artist directories)
                   and try to get the single artworks plus its content */
                foreach ($dirlevel_1 as $key2 => $dirlevel_2) {

                    // again we only want arrays cause arrays are directories with content
                    if (is_array($dirlevel_2)) {

                        //echo "<h2>".ucwords($this->transformName($key1))."</h2>";

                        foreach ($dirlevel_2 as $key3 => $dirlevel_3) {

                            $media = null;

                            // and again. only arrays cause ... you know the game
                            if (is_array($dirlevel_3)) {

                                //echo "<h3>".$key3."</h3>";

                                switch ($key3) {
                                    case "_meta/":
                                        // echo "meta";
                                        break;

                                    case "_pics/":
                                        //  "pics";
                                        $media = "pics";

                                        break;

                                    case "_video/":
                                        // echo "video";
                                        $media = "video";

                                        break;

                                    case "_text/":
                                        // echo "text";
                                        $media = "text";
                                        break;

                                    case "_audio/":
                                        // echo "audio";
                                        $media = "audio";
                                        break;

                                    default:
                                        // echo "download_link";
                                        $media = "download";
                                        break;

                                }

                                $assetid = $this->generateAssetId($key1, $key2)."_".$media;
                            }

                            if ($media !== null) {


                                $artworkfiles = array();
                                $this->artworks[$assetid] = new Artwork();

                                foreach ($dirlevel_3 as $key4 => $file) {

                                    if ($file !== "index.html") {
                                        //echo $file."<br>";
                                        $artworkfiles[] = $file;
                                    }

                                }

                                $this->artworks[$assetid]->setAssetid($assetid);
                                $this->artworks[$assetid]->setTitle(ucwords($this->transformName($key2)));
                                $this->artworks[$assetid]->setArtistname(ucwords($this->transformName($key1)));

                                $this->artworks[$assetid]->setThumbnail($key1 . $key2 . "_meta/400x400_thumbnail.jpg");
                                $this->artworks[$assetid]->setLinktocontent($key1 . $key2 . $key3);
                                $this->artworks[$assetid]->setPathtoartwork($key1 . $key2);
                                $this->artworks[$assetid]->setMediatype($media);
                                $this->artworks[$assetid]->setFiles($artworkfiles);


                            }


                        }




                        // $this->getArtworkMedia($assetid, $value2);


                    } // if

                } // foreach

            } // if
        } // foreach

    }


    public function loadgithub($repo = "SUPER-INFORMATION-HIGH-MARKET")
    {


        //die();

        $token = "?access_token=22e9eaa25dab124102195b7143b3fb4cf50abfd7";

        // create curl resource
        $ch = curl_init();

        // set USER-Agent
        curl_setopt($ch, CURLOPT_USERAGENT, 'digital3mpire');
        //return the transfer as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // set url
        curl_setopt($ch, CURLOPT_URL, "https://api.github.com/repos/digital3mpire/" . $repo . "/contents/" . $token);

        //curl_setopt($ch, CURLOPT_URL, "https://api.github.com/users/digital3mpire/repos".$token);

        // $output contains the output string
        $json_output = curl_exec($ch);
        $a_output = json_decode($json_output);

        //var_dump($a_output);die();

        foreach ($a_output as $artist) {

            if ($artist->type === "dir" & $artist->name !== "name_prename") {

                $this->artistnames[] = ucwords($this->transformName($artist->name));

                echo $artist->sha;

                // set url
                curl_setopt($ch, CURLOPT_URL, "https://api.github.com/repos/digital3mpire/" . $repo . "/contents/" . $artist->path . $token);

                // $output contains the output string
                $json_artwork = curl_exec($ch);

                $a_artwork = json_decode($json_artwork);

                //var_dump($a_artwork);

                if (is_array($a_artwork)) {
                    //var_dump($a_artwork);

                    foreach ($a_artwork as $artwork) {

                        if ($artwork->type == "dir") {

                            //var_dump($artwork);

                            $assetid = $this->generateAssetId($artist->name, $artwork->name);

                            $this->artworks[$assetid] = new Artwork();

                            $this->artworks[$assetid]->setAssetid($assetid);
                            $this->artworks[$assetid]->setTitle(ucwords($this->transformName($artwork->name)));
                            $this->artworks[$assetid]->setArtistname(ucwords($this->transformName($artist->name)));
//https://raw.githubusercontent.com/digital3mpire/SUPER-INFORMATION-HIGH-MARKET/master/Sebastian_Schmieg/extension_1/_meta/400x400_thumbnail.jpg

                            /*
                            // set url
                            curl_setopt($ch, CURLOPT_URL, "https://api.github.com/repos/digital3mpire/".$repo."/contents/".$artwork->path.$token);

                            // $output contains the output string
                            $json_artworkdir = curl_exec($ch);

                            $a_artworkdir = json_decode($json_artworkdir);

                            var_dump($a_artworkdir);
*/
                            $geturl = "https://api.github.com/repos/digital3mpire/" . $repo . "/git/trees/" . $artwork->sha . $token . "&recursive=1";

                            // set url
                            curl_setopt($ch, CURLOPT_URL, $geturl);

                            // $output contains the output strin
                            $json_artwork_dir = curl_exec($ch);

                            $a_artwork_dir = json_decode($json_artwork_dir);

                            //var_dump($a_artwork_dir);
                            //die();
                            echo $artwork->path . "<br>";
                            echo "<img src=\"" . $this->defineThumbnail($artwork->path, $a_artwork_dir) . "\">";

                            $this->artworks[$assetid]->setThumbnail($artwork->path . "_meta/400x400_thumbnail.jpg");
                            $this->artworks[$assetid]->setLinktocontent($artist->path . $artwork->path);

                        }

                    }
                }
            }
        }

        die();
        /*var_dump($this->artworks);
        var_dump($this->artistnames);
        // close curl resource to free up system resources
        curl_close($ch);
        die();
        //return $output;
        */
    }


    private function defineThumbnail($directory, $a_artwork_dirs)
    {

        foreach ($a_artwork_dirs->tree as $a_artwork_dir) {


            if ($a_artwork_dir->type == "blob" && $a_artwork_dir->path == "_meta/400x400_thumbnail.jpg") {

                return "https://raw.githubusercontent.com/digital3mpire/SUPER-INFORMATION-HIGH-MARKET/master/" . $directory . "/_meta/400x400_thumbnail.jpg";

            }

        }
        // var_dump($a_artwork_dirs->tree);
        return base_url() . "00_pics/burningmoney_" . rand(1, 4) . ".jpg";

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
    public function getArtwork($assetid)
    {
        return $this->artworks[$assetid];
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


    public function getAssetStructure()
    {

        return $this->assetstructure;

    }


    private function generateAssetId($name, $artwork)
    {

        return str_replace('/', '', $name) . "_" . str_replace('/', '', $artwork);

    }

    private function transformName($dirname)
    {

        return str_replace('_', ' ', str_replace('/', '', $dirname));

    }


}