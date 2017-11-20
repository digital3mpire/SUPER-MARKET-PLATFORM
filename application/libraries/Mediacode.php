<?php
/**
 * Created by PhpStorm.
 * User: florian
 * Date: 14.11.17
 * Time: 00:58
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Mediacode {


    /**
     * @var array
     */
    private $artworks;

    /**
     * @var array
     */
    private $artworkwidgets = array();

    /**
     * Mediacode constructor.
     * @param $artworks
     */
    public function __construct($artworks)
    {
        $this->artworks = $artworks;

        //var_dump($artworks);

        foreach ($artworks as $artwork) {



            switch($artwork->getMediatype()) {

                case "video":

                    foreach ($artwork->getfiles() as $file) {
                       $this->artworkwidgets[] = $this->getVideoWidget($file,$artwork);
                    }


                    break;

                case "pics":

                    if (count($artwork->getfiles()) > 1) {

                        $this->artworkwidgets[] = $this->getSlideshowWidget($artwork);

                    } else {

                        $this->artworkwidgets[] = $this->getImageWidget($artwork);

                    }

                    break;

                case "audio":

                    foreach ($artwork->getfiles() as $file) {
                        $this->artworkwidgets[] = $this->getSoundWidget($file,$artwork);
                    }

                    break;

                case "download":

                    foreach ($artwork->getfiles() as $file) {
                        $this->artworkwidgets[] = $this->getDownloadLink($file,$artwork);
                    }

                    break;

                default:

                    foreach ($artwork->getfiles() as $file) {
                        $this->artworkwidgets[] = $this->getDownloadLink($file,$artwork);
                    }

                    break;


                    break;


            }

        }

    }

    /**
     * @return array
     */
    public function getArtworkwidgets()
    {
        return $this->artworkwidgets;
    }


    /**
     * @param $videofile
     */
    public function getVideoWidget($videofile,$artwork) {

        $widget = "
            <video class=\"responsive-video\" controls>
                <source src=\"".base_url()."assets/SUPER-INFORMATION-HIGH-MARKET/".$artwork->getLinktocontent().$videofile."\" type=\"video/mp4\">
            </video>".$this->getSubline($artwork);

        return $widget;

    }

    /**
     * @param $pictures
     */
    public function getSlideshowWidget($artwork)
    {

        $pictures = $artwork->getfiles();
        $path = $artwork->getLinktocontent();

        $widget = "<div class=\"fkslider\"><ul class=\"rslides\">";
        $i = 0;
        foreach ($pictures as $picture) {

            list($width, $height, $type, $attr) = getimagesize(base_url()."assets/SUPER-INFORMATION-HIGH-MARKET/".$path.$picture);
            $widget .= "<li><img src=\"".base_url()."assets/SUPER-INFORMATION-HIGH-MARKET/".$path.$picture."\" class=\"responsive-img materialboxed\"></li>";
        }
        $widget .= "</ul></div>".$this->getSubline($artwork);

        return $widget;

    }

    /**
     * @param $picture
     */
    public function getImageWidget($artwork) {


        $picture = $artwork->getfiles();
        $path = $artwork->getLinktocontent();
        return "<img src=\"".base_url()."assets/SUPER-INFORMATION-HIGH-MARKET/".$path.$picture[0]."\" class=\"responsive-img materialboxed\">
        ".$this->getSubline($artwork);

    }

    /**
     * @param $audiofile
     */
    public function getSoundWidget($audiofile, $artwork) {


        $path = $artwork->getLinktocontent();

        $widget = "<div class=\"borderbox\"><audio controls>
  <source src=\"".base_url()."assets/SUPER-INFORMATION-HIGH-MARKET/".$path.$audiofile."\" type=\"audio/mpeg\">
Your browser does not support the audio element.
</audio>";

        $widget .= "<h4><a href=\"".base_url()."assets/SUPER-INFORMATION-HIGH-MARKET/".$path.$audiofile."\">
        <i class=\"material-icons\">file_download</i>Download ".$audiofile."</a></h4>
        ".$this->getSubline($artwork)."
        </div>";
        return $widget;

    }

    /**
     * @param $URL
     */
    public function getDownloadLink($url,$artwork) {

        $path = $artwork->getLinktocontent();

        $widget = "<div class=\"borderbox\"><h4><a href=\"".base_url()."assets/SUPER-INFORMATION-HIGH-MARKET/".$path.$url."\">
        <i class=\"material-icons\">file_download</i>Download ".$url."</a></h4>".$this->getSubline($artwork)."</div>";
       ;

        return $widget;


    }


    private function getSubline($artwork) {

        //var_dump($artwork);
        return  "<h5>".$artwork->getArtistname().", '".$artwork->getTitle()."'</h5>
            <div class=\"collection-icons\">
            <a href=\"https://minhaskamal.github.io/DownGit/#/home?url=https://github.com/digital3mpire/SUPER-INFORMATION-HIGH-MARKET/tree/master/".$artwork->getPathtoartwork()."&fileName=".$artwork->getArtistname()."-".$artwork->getTitle()."\" target=\"_blank\">
            <i class=\"medium material-icons\">file_download</i>
            </a>
            <a href=\"https://github.com/digital3mpire/SUPER-INFORMATION-HIGH-MARKET/tree/master/".$artwork->getPathtoartwork()."\">
            <i class=\"medium material-icons\">exit_to_app</i>
            </a>
            </div>";

//                                $this->artworks[$assetid]->setPathtoartwork($key1 . $key2);


    }

}
