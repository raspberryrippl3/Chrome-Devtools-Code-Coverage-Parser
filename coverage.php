<?php

$json_string = 'Coverage-20190406T120902.json';
$jsondata = file_get_contents($json_string);
$obj = json_decode($jsondata,true);

$output_css = '';

foreach ($obj['0']['ranges'] as $name => $value) {

    $length = $value['end'] - $value['start'];
    $output_css .= substr($obj['0']['text'], $value['start'], $length) . PHP_EOL;


}

echo $output_css;

$file = 'coverage.css';
file_put_contents($file, $output_css);

?>
