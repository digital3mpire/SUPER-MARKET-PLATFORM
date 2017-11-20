<?php

/**
 * Created by PhpStorm.
 * User: florian
 * Date: 24.10.17
 * Time: 00:48
 */

defined('BASEPATH') OR exit('No direct script access allowed');


class Supershopcollection extends ArrayObject
{

    private $db;

    private $id;

    private $username;

    private $webpage;

    private $collection_title;

    private $comment;

    private $thecollection;

    private $slug;


    /**
     * Supershopcollection constructor.
     * @param $thecollection
     */
    public function __construct($id = null)
    {

        $this->db = new SQLite3(APPPATH . "/database/supershop_DB");

        if ($id != NULL) {

            $collection = $this->db->exec("Select * from superproduct_collection where id =" . $id);

        }

    }


    public function setCollection($postdata, $supercartitems)
    {


        $this->setUsername($postdata['username']);
        $this->setWebpage($postdata['webpage']);
        $this->setCollectionTitle($postdata['collection_title']);
        $this->setThecollection($supercartitems);
        $this->setComment($postdata['comment']);
        $this->setSlug($postdata['username']."-".$postdata['collection_title']);

        echo $sql = "SELECT * FROM 'superproduct_collection' WHERE username = '" . $postdata['username'] . "' AND collection_title = '" . $postdata['collection_title']."'";
        $results = $this->db->query($sql);


        if ($results != false) {

            $row = $results->fetchArray();

            //var_dump($row);
            //echo "numcolumns".$results->numColumns()." ende";

            if ($row == false) {

                $id = $this->saveCollection();

            } else {

                $this->updateCollection($row['id']);
                $id = $row['id'];

            }

        }




        return $this->getSlug();

    }


    public function saveCollection()
    {

        $sql = "INSERT INTO superproduct_collection (
               username,
               webpage,
               comment,
               collection_title,
               thecollection,
               theslug
               ) VALUES (
               '" . $this->getUsername() . "',
               '" . $this->getWebpage() . "',
               '" . $this->getComment() . "',
               '" . $this->getCollectionTitle() . "',
               '" . $this->getThecollection() . "',
               '" . $this->getSlug() . "')
               ";

        $this->db->exec($sql);
        return $this->db->lastInsertRowid();

    }


    private function updateCollection($id)
    {

        echo $sql = "UPDATE superproduct_collection SET
                    username = " . $this->getUsername() . ",
                    webpage = " . $this->getWebpage() . ",
                    comment = " . $this->getComment() . ",
                    collection_title = " . $this->getCollectionTitle() . ",
                    thecollection = \"" . $this->getThecollection() . "\",
                    theslug = " . $this->getSlug() . "
                    WHERE id = " . $id;


        $queryresult = $this->db->exec($sql);
        if ($queryresult) {
            //echo 'Anzahl der modifizierten Reihen: ', $this->db->changes();
        }


    }


    /**
     * @return mixed
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * @param mixed $slug
     */
    public function setSlug($slugstring)
    {
        $this->slug = $this->slugit($slugstring);
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
    public function getWebpage()
    {
        return $this->webpage;
    }

    /**
     * @param mixed $webpage
     */
    public function setWebpage($webpage)
    {
        $this->webpage = $webpage;
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


    public function slugit($str, $replace = array(), $delimiter = '-')
    {
        if (!empty($replace)) {
            $str = str_replace((array)$replace, ' ', $str);
        }
        $clean = iconv('UTF-8', 'ASCII//TRANSLIT', $str);
        $clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
        $clean = strtolower(trim($clean, '-'));
        $clean = preg_replace("/[\/_|+ -]+/", $delimiter, $clean);
        return $clean;

    }

}