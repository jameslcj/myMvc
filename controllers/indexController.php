<?php
class indexController extends baseController
{
    public function indexAction()
    {
        $modelObj = new indexModel();
        $data = $modelObj->index();
        display('admin/index', $data);
    }
}
