<?php

/**
 * Created by PhpStorm.
 * User: florian
 * Date: 24.10.17
 * Time: 00:48
 */

defined('BASEPATH') OR exit('No direct script access allowed');


class Artwork extends ArrayObject
{

    private $assetid;



    private $title;

    private $artistname;

    private $thumbnail;

    private $linktocontent;

    private $pathtoartwork;

    private $files = array();

    private $mediatype;


    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
    }

     /*** @return mixed
      */
    public function getFiles()
    {
        return $this->files;
    }

    /**
     * @param mixed $files
     */
    public function setFiles($files)
    {
        $this->files = $files;
    }

    /**
     * @return mixed
     */
    public function getMediatype()
    {
        return $this->mediatype;
    }

    /**
     * @param mixed $mediatype
     */
    public function setMediatype($mediatype)
    {
        $this->mediatype = $mediatype;
    }


    /**
     * @return mixed
     */
    public function getAssetid()
    {
        return $this->assetid;
    }

    /**
     * @param mixed $assetid
     */
    public function setAssetid($assetid)
    {
        $this->assetid = $assetid;
    }



    /**
     * @return mixed
     */
    public function getArtistname()
    {
        return $this->artistname;
    }

    /**
     * @param mixed $artistname
     */
    public function setArtistname($artistname)
    {
        $this->artistname = $artistname;
    }

    /**
     * @return mixed
     */
    public function getLinktocontent()
    {
        return $this->linktocontent;
    }

    /**
     * @param mixed $linktocontent
     */
    public function setLinktocontent($linktocontent)
    {
        $this->linktocontent = $linktocontent;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $name
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getPathtoartwork()
    {
        return $this->pathtoartwork;
    }

    /**
     * @param mixed $pathtoartwork
     */
    public function setPathtoartwork($pathtoartwork)
    {
        $this->pathtoartwork = $pathtoartwork;
    }

    /**
     * @return mixed
     */
    public function getThumbnail()
    {
        return $this->thumbnail;
    }

    /**
     * @param mixed $thumbnail
     */
    public function setThumbnail($thumbnail)
    {

        try {
            if (!file_exists(BASEPATH.'../public/assets/SUPER-INFORMATION-HIGH-MARKET/'.$thumbnail)) {

                $thumbnail = base_url()."00_pics/burningmoney_".rand(1,4).".jpg";

            } else {

                $thumbnail = base_url().'assets/SUPER-INFORMATION-HIGH-MARKET/'.$thumbnail;

            }
        } catch (Exception $e) {
            // Handle exception
        }

        $this->thumbnail = $thumbnail;
    }

}