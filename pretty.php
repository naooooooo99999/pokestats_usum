<?php

chdir(__DIR__);
array_map('unlink', glob('./pretty/*.json'));

foreach (glob('./raw/*.json') as $filename) {
    $output = preg_replace('/\.json$/', '-pretty.json', basename($filename));
    file_put_contents("./pretty/{$output}", json_encode(json_decode(file_get_contents($filename)), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
}
