<?php

    $time = time();
    $actual_time = date('D d M Y @ H:i:s', $time);
    $modified_time = date('D d M Y @ H:i:s', strtotime('+1 hour 10 minute'));

    echo 'Current time: '.$actual_time.'<br>';
    echo 'Modified time: '.$modified_time;

?>