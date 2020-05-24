<?php


class HomeController extends Controller {

    /**
     * 
     */
    private $data = array();

    
   

    public function index(){
        $pictures = new PictureModel();
        $pictures->setPicture();
        $this->data = $pictures->getPictures();
        $this->loadTemplate("home",$this->data);
    }

    public function sobre(){
        $this->loadTemplate('sobre',$this->data);
    }
    
};