<?php

function debug($data = [])
{
    echo '<pre>';
    print_r($data);
    echo '</pre>';
}

function dd($data = [])
{
    debug($data);
    exit;
}