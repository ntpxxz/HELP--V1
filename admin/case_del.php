<?php
include_once('..\config\function.php');
if (isset($_GET['del_case'])) {
    $job_id = $_GET['del_case'];
    $delete_job = new DB_CON();
    $sql =
    $delete_job->delete_jobs($job_id);
if ($sql) {
    echo "<script>alert('Delete Successful');</script>";
    echo "<script>window.location.href='case_tbl.php'</script>";
}
}

?>