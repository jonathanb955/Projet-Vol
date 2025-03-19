<?php


class bdd
{
    public function getBdd()
    {
        return new PDO('mysql:host=localhost;dbname=projet_vol;charset=utf8', 'root', '');
    }
}