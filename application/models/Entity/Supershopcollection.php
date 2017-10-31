<?php

/**
 * Created by PhpStorm.
 * User: florian
 * Date: 24.10.17
 * Time: 00:48
 */

defined('BASEPATH') OR exit('No direct script access allowed');


class Supershopcollection extends ArrayObject {

    private $db;

    private $id;

    private $username;

    private $useremail;

    private $collection_title;

    private $comment;

    private $thecollection;

    /**
     * Supershopcollection constructor.
     * @param $thecollection
     */
    public function __construct($id = null)
    {

        $this->db = new SQLite3(APPPATH."/database/supershop_DB");

        if ($id != NULL) {

            $collection = $this->db->exec("Select * from superproduct_collection where id =".$id);
            var_dump($collection);

        }

    }


    public function save() {

        $username = $this->getUsername();
        $useremail = $this->getUseremail();
        $comment = $this->getComment();
        $collectiontitle = $this->getCollectionTitle();

        $sql = "INSERT INTO superproduct_collection (
               username,
               useremail,
               comment,
               collection_title,
               thecollection,
               payedwith
               ) VALUES (
               '".$username."',
               '".$useremail."',
               '".$comment."',
               '".$collectiontitle."',
               'the collection of things',
               'notpayed')
               ";

       $this->db->exec($sql);
       return $this->db->lastInsertRowid();

    }


    /**
     * @return mixed
     */
    public function getThecollection()
    {
        return $this->thecollection;
    }

    /**
     * @param mixed $thecollection
     */
    public function setThecollection($thecollection)
    {
        $this->thecollection = $thecollection;
    }

    /**
     * @return mixed
     */
    public function getCollectionTitle()
    {
        return $this->collection_title;
    }

    /**
     * @param mixed $collection_title
     */
    public function setCollectionTitle($collection_title)
    {
        $this->collection_title = $collection_title;
    }

    /**
     * @return mixed
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param mixed $comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getUseremail()
    {
        return $this->useremail;
    }

    /**
     * @param mixed $useremail
     */
    public function setUseremail($useremail)
    {
        $this->useremail = $useremail;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }


}