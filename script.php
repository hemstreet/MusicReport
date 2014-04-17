<?php

// Include Simple html dom
include_once(dirname(__FILE__) . '/simple_html_dom.php');

$script = array_shift($argv);

echo PHP_EOL . 'Last.fm Report' . PHP_EOL . PHP_EOL;

if(!$argv) {
    echo "You must pass LastFm url username parameters: i.e jonhemstreet";
}

// Create DOM from URL or file
forEach($argv as $userName) {

    $html = file_get_html('http://www.last.fm/user/' . $userName);

    echo $userName . ' -------' . PHP_EOL . PHP_EOL;

    $x = false;

    forEach ($html->find('#recentTracks tr.first .subjectCell a') as $content) {

        echo($content->innertext);
        echo ($x) ? '' : ' - ';

        if (!$x) {
            $x = true;
        }

    }

    echo PHP_EOL . PHP_EOL . '-------------------------------' . PHP_EOL . PHP_EOL;
}