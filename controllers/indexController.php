<?php
class indexController
{
    public function indexAction()
    {
        $modelObj = new indexModel();
        $data = $modelObj->index();
        display('index', $data);
    }
}
