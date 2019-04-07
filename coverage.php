<?php

$target_css = '/coverage/css/style.css';
$json_string = 'Coverage-20190407T080649.json';
$jsondata = file_get_contents($json_string);
$obj = json_decode($jsondata,true);
$output_css = '';

foreach( $obj as $arr ) {
    if( strpos( $arr['url'], $target_css ) ) {
        
        foreach ($arr['ranges'] as $name => $value) {
            $length = $value['end'] - $value['start'];
            $output_css .= substr($arr['text'], $value['start'], $length) . PHP_EOL;
        }
        
        break;
    }
}

echo $output_css;
$file = 'output.css';
file_put_contents($file, $output_css);

?>
