<?php
    $indexToRemove = array_search($_POST['id'], $content_ids);
    unset($content_ids[$indexToRemove]);
?>