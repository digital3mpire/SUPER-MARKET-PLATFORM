<?php

/**
 * Created by PhpStorm.
 * User: florian
 * Date: 24.10.17
 * Time: 00:48
 */

defined('BASEPATH') OR exit('No direct script access allowed');


class Artwork extends CI_Model
{
    private $name;

    private $artistname;

    private $thumbnail;

    private $linktocontent;

    private $pathtoartwork;


    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
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
        $this->thumbnail = $thumbnail;
    }

}