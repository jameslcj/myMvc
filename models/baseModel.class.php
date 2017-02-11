<?php

class baseModel
{
    protected $db = null;
    public function __construct()
    {
        loadUtil('db');
        $this->db = db::getObj();
    }
}
