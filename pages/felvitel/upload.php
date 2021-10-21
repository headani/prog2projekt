<?php

//be kell állítani , hogy mely almappába tegye a képfájlt

    if ( 0 < $_FILES['file']['error'] ) {
        echo 'Error: ' . $_FILES['file']['error'] . '<br>';
    }
    else {
        move_uploaded_file($_FILES['file']['tmp_name'], '../../kepek/' . $_FILES['file']['name']);
    }

?>