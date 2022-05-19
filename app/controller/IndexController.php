<?php

class IndexController extends Controller
{
     public function index()
    {
        return $this->view->render('home', [
            'countPhoto' => Index::countPhoto(),
            'javascript' => '<script src="' . App::config('url') . 'public/javascript/Index/countPhoto.js"></script>'
        ]);
    }

    public function getCountPhoto()
    {
        echo Index::countPhoto();
    }
}