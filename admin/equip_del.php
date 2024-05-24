<?php
include_once('..\config\function.php');
if (isset($_GET['del_item'])) {
    $item_name = $_GET['del_item'];
    $delete_item = new DB_CON();
    $sql = $delete_item->delete_items($item_name);
    if ($sql) {
        echo "<script>alert('Delete Successful');</script>";
        echo "<script>window.location.href='equip_tbl.php'</script>";
    }
}
?>


