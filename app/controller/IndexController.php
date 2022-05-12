<?php

class IndexController extends Controller
{
    public function index()
    {
        return $this->view->render('index');
    }
}