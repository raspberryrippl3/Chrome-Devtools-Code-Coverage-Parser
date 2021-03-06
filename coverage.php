<?php

// A simple search string for the css you want to target in the coverage export
$target_css = '/coverage/css/style.css';
$json_string = 'Coverage-20190407T080649.json';
$output_filename = 'style.css';

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
file_put_contents($output_filename, $output_css);

?>
