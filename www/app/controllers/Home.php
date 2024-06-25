<?php

class Home extends Controller
{
    public function index()
    {
        $model = new Model;
        $model->test();
        $this->view('home');
    }
}
