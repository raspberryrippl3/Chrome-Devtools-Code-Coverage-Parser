<?php
$json_string = 'Coverage-20190407T072310.json';
$jsondata = file_get_contents($json_string);
$obj = json_decode($jsondata,true);
$output_css = '';

/*
foreach ($obj['0']['ranges'] as $name => $value) {
    $length = $value['end'] - $value['start'];
    $output_css .= substr($obj['0']['text'], $value['start'], $length) . PHP_EOL;
}
*/

foreach( $obj as $arr ) {
    if( strpos( $arr['url'],"css" ) ) {
        
        foreach ($arr['ranges'] as $name => $value) {
            $length = $value['end'] - $value['start'];
            $output_css .= substr($arr['text'], $value['start'], $length) . PHP_EOL;
        }
        
        break;
    }
}

echo $output_css;
$file = 'coverage.css';
file_put_contents($file, $output_css);

?>
