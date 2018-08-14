<?php

$a = array(
    's' => 'sdf',
     2 => '123'
);


$b = (object) $a;

print_r($b);

echo $b->s = '1' ;