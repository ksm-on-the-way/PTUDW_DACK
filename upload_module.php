<?php
function uploadFileTo($uploaddir, &$oldfilename)
{
    $filetemp = $_FILES['uploadfile']['tmp_name'];
    $oldfilename = $_FILES['uploadfile']['name'];
    return move_uploaded_file($filetemp, $uploaddir . $oldfilename);
}
