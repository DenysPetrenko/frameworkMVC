<?php
function dump($array): void
{
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}

function dd($array): array
{
    dump($array);
    die();
}
