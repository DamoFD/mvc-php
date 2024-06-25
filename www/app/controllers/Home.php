<?php

class Home extends Controller
{
    public function index()
    {
        $model = new Model;
        $arr['age'] = 29;
        $result = $model->where($arr);

        show($result);
        $this->view('home');
    }
}
