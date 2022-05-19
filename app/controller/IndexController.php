<?php

class IndexController extends Controller
{
     public function index()
    {
        return $this->view->render('index', [
            'countPhoto' => $this->getCountPhoto(),
        ]);
    }

    public function getCountPhoto()
    {
        echo Index::countPhoto();
    }
}