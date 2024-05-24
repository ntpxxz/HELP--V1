<?php
include_once('..\config\function.php');
if (isset($_GET['del_user'])) {
    $user_id = $_GET['del_user'];
    $delete_user = new DB_CON();
    $sql = $delete_user->delete_users($user_id);
if ($sql) {
    echo "<script>alert('Delete Successful');</script>";
    echo "<script>window.location.href='user_tbl.php'</script>";
}
}
?>