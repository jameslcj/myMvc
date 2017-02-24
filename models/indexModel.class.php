<?php
class indexModel extends baseModel
{
    public function index()
    {
        // echo "<hr><pre>";var_dump($this->getDatabases());exit("<hr>");
        return array(
            'name' => 'lc',
            'age' => 18
        );
    }
}
