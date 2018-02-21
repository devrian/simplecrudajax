<?php

require_once 'DB.php';

if (!isset($_SESSION['user'])) {
    die('0');
}

if ($_POST['type'] == 'insert') {
    $comment = mysqli_real_escape_string($link, $_POST['fill_comment']);
    $q       = "INSERT INTO komentar (isi_komentar, id_user) VALUES ('$comment', 1)";
    $res     = mysqli_query($link, $q);

    if ($res) {
        $last_id = mysqli_insert_id($link);
        echo "<div id='comment_" . $last_id . "' data-id='".$last_id."'>
                <div class='float-right'>
                    <div class='row'>
                        <div class='col-2'>
                            <button class='btn btn-info btn-sm edit' data-id='". $last_id ."'>
                                <i class='fa fa-pencil'></i>
                            </button>
                        </div>
                        <div class='col-2'>
                            <button class='btn btn-danger btn-sm delete' data-id='". $last_id ."'>
                                <i class='fa fa-trash'></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class='col-10'>
                    <p class='comment_text' data-id='". $last_id ."'>" . $comment . "</p>
                </div><hr>
            </div>";
    } else {
        echo "false";
    }
}

if ($_POST['type'] == 'delete') {
    $id      = mysqli_real_escape_string($link, $_POST['id_comment']);
    $q       = "DELETE FROM komentar WHERE id='$id'";
    $res     = mysqli_query($link, $q);

    if ($res) {
        echo "1";
    } else {
        echo "-1";
    }
}

if ($_POST['type'] == 'update') {
    $id      = mysqli_real_escape_string($link, $_POST['id_comment']);
    $fill    = mysqli_real_escape_string($link, $_POST['fill_comment']);
    $q       = "UPDATE komentar SET id_user = 1, isi_komentar ='$fill' WHERE id ='$id'";
    $res     = mysqli_query($link, $q);
    die($res);

    if ($res) {
        echo "1";
    } else {
        echo "-1";
    }
}



