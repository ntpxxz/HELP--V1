<?php
define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '123456');
define('DB_NAME', 'rith-ithelp');
class DB_CON
{
    function __construct()
    {
        $connect = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
        $this->dbcon = $connect;
        if (mysqli_connect_error()) {
            echo "Connect Fail:" . mysqli_connect_error();
        }
    }

    public function fetchdata_users()
    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM rith_user");
        return $result;
    }
    public function insert_users($user_id, $user_name, $user_lastname, $user_pass, $item_name, $user_sec, $user_reg, $user_address, $user_mail, $user_type)
    {
        $result = mysqli_query($this->dbcon, "INSERT INTO rith_user(user_id, user_name,user_lastname, user_pass,item_name , user_sec, user_reg, user_address, user_mail,user_type) 
        VALUES ('$user_id', '$user_name', '$user_lastname', '$user_pass', '$item_name', '$user_sec', '$user_reg', '.$user_address', '$user_mail','$user_type')");
        return $result;
    }


    public function record_users($user_id)    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM rith_user WHERE user_id = '$user_id'");
        return $result;
    }

    public function update_users($user_name, $user_lastname, $user_pass, $item_name, $user_sec, $user_reg, $user_address, $user_mail, $user_tel,$user_type, $user_id)
    {
        $result = mysqli_query($this->dbcon, "UPDATE rith_user SET 
        
        user_name = '$user_name',
        user_lastname = '$user_lastname',
        user_pass = '$user_pass',
        item_name = '$item_name',
        user_sec = '$user_sec',
        user_reg = '$user_reg',
        user_address = '$user_address',
        user_mail = '$user_mail',
        user_tel = '$user_tel',        
        user_type = '$user_type'
        WHERE user_id = '$user_id' ");

        return $result;
    }

    public function delete_users($user_id)
    {
        $delete_user = mysqli_query($this->dbcon, "DELETE FROM rith_user WHERE user_id= '$user_id'");
        return $delete_user;
    }

    

    //-------------------AdminS--------------------//

    public function fetchdata_admins()
    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM rith_user WHERE user_type ='admin'");
        return $result;
    }
    public function record_admins($user_id)
    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM rith_user WHERE user_id = '$user_id'");
        return $result;
    }

    public function
    update_admins($user_name, $user_lastname, $user_pass, $item_name, $user_sec, $user_reg, $user_address, $user_mail,$user_tel,$user_type, $fileName,  $user_id)
    {
        $result = mysqli_query($this->dbcon, "UPDATE rith_user SET      

 
        user_name = '$user_name',
        user_lastname = '$user_lastname',
        user_pass = '$user_pass',
        item_name = '$item_name',
        user_sec = '$user_sec',
        user_reg = '$user_reg',
        user_address = '$user_address',
        user_mail = '$user_mail',
        user_tel = '$user_tel',        
        user_type = '$user_type',
        user_img = '$fileName'
        WHERE user_id = '$user_id'");
        
   
        return $result;
    }

    public function delete_admins($user_id)
    {
        $delete_user = mysqli_query($this->dbcon, "DELETE FROM rith_user WHERE user_id= '$user_id'");
        return $delete_user;
    }

    //-------------------JOBS--------------------//


    public function fetchdata_job_id_new()
    {
        $queryID = mysqli_query($this->dbcon, "SELECT * FROM rith_jobcase ORDER BY job_id DESC LIMIT 1");
        $lastID = $queryID->fetch_assoc();

        $currentDate = date('Ym'); // Get the current date in yyyymmdd format

        if ($lastID == "") {
            $lastID = "CS-" . $currentDate . "001";
        } else {
            $lastID = $lastID['job_id'];
            $lastIDDate = substr($lastID, 0,4); // Extract yyyymmdd from the last job ID

            if ($lastIDDate == $currentDate) {
                $lastIndex = substr($lastID, -3); // Extract the last 3 digits (index)
                $newIndex = str_pad(($lastIndex + 1),3,'0', STR_PAD_LEFT); // Increment the index and pad with leading zeros
                $lastID = "CS-" . $currentDate . $newIndex;
            } else {
                $lastID = "CS-" . $currentDate . "001";
            }
        }

        return $lastID;
    }


    public function fetchdata_job_id()
    
    {
       $queryID = mysqli_query($this->dbcon, "SELECT * FROM rith_jobcase  ORDER BY job_id DESC limit 1  ");
        $lastID =$queryID->fetch_assoc();      

        isset($lastID['job_id']);
        if ($lastID == "") {
            $lastID = "CS-" . date('Ym') . "001";
        } else {
            $lastID = substr($lastID['job_id'], 3);
            $lastID = intval($lastID);
            $lastID = "CS-" . ($lastID + 1);
        }
        return $lastID;
    }       

    public function fetch_id()
    {
        $queryID = mysqli_query($this->dbcon, "SELECT * FROM rith_jobcase ORDER BY job_id DESC limit 1");
        return $queryID;
    }

    public function fetchdata_jobs()
    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM rith_jobcase");
        return $result;
    }

    public function insert_jobs($job_id,$job_date, $user_name, $user_lastname, $user_sec, $user_mail, $item_name, $item_ass, $job_cat, $job_detail,$filename)
    {

        $result = mysqli_query($this->dbcon, "INSERT INTO rith_jobcase(job_id,job_date, user_name, user_lastname, user_sec, user_mail, item_name,item_ass,job_cat,job_detail,job_img)
                VALUES ('$job_id','$job_date', '$user_name', '$user_lastname', '$user_sec', '$user_mail', '$item_name', '$item_ass', '$job_cat', '$job_detail','$filename' )");
        return $result;
    }

    public function record_jobs($job_id)
    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM rith_jobcase WHERE job_id='$job_id'");
        return $result;
    }
    public function update_jobs($job_date, $user_name, $user_lastname, $user_sec, $user_mail, $item_name, $item_ass, $job_cat, $job_detail,  $job_charger, $job_status, $chk_re, $re_de1, $re_date1, $re_de2, $re_date2, $re_com, $job_id)
    {
        $result = mysqli_query($this->dbcon, "UPDATE rith_jobcase SET 
        job_date = '$job_date',
        user_name = '$user_name',
        user_lastname = '$user_lastname',
        user_sec = '$user_sec',
        user_mail = '$user_mail',
        item_name = '$item_name',
        item_ass = '$item_ass',
        job_cat = '$job_cat',        
        job_detail = '$job_detail',       
        job_charger = '$job_charger',       
        job_img = '$fileName',
        chk_re='$chk_re',
        re_de1='$re_de1',
        re_date1='$re_date1',
        re_de2='$re_de2',
        re_date2='$re_date2',
        job_status = '$job_status',    
        re_com='$re_com',    
        WHERE job_id = '$job_id'");
        return $result;
    }

    public function delete_jobs($job_id)
    {
        $delete_job = mysqli_query($this->dbcon, "DELETE FROM rith_jobcase WHERE job_id= '$job_id'");
        return $delete_job;
    }

    public function
    insert_reply($job_id, $chk_re, $re_de1, $re_date1, $re_de2, $re_date2,$job_status,$re_date3,$re_com)
    {
        $result = mysqli_query($this->dbcon, "INSERT INTO 
        rith_jobcase (job_id,chk_re,re_de1,re_date1,re_de2,re_date2,re_com,job_status) 
        VALUES ('$job_id','$chk_re','$re_de1','$re_date1','$re_de2','$re_date2','$job_status','$re_date3','$re_com')");
        return $result;
    }



    public function update_reply($job_charger,$chk_re, $re_de1, $re_date1, $re_de2, $re_date2, $job_status, $re_date3, $re_com, $job_id)
    {
        $result = mysqli_query($this->dbcon, "UPDATE rith_jobcase SET
        job_charger='$job_charger',
        chk_re='$chk_re',
        re_de1='$re_de1',
        re_date1='$re_date1',
        re_de2='$re_de2',
        re_date2='$re_date2',        
        job_status='$job_status',  
        re_date3='$re_date3',    
        re_com='$re_com'       
        WHERE  job_id = '$job_id'");

        return $result;
    }

    public function fetchdata_reply_case($chk_id)
    {
        if (isset($chk_id)) {
            $result = mysqli_query($this->dbcon, " SELECT *
        FROM rith_jobcase INNER JOIN case_reply ON rith_jobcase.job_id=case_reply.chk_id  WHERE chk_id = '$chk_id'");
            return $result;
        } else {
            $result = mysqli_query($this->dbcon, " SELECT *
        FROM rith_jobcase  WHERE job_id = '$chk_id'");
        }
    }





    //-------------------EQUIPMENTS--------------------//

    public function fetchdata_items()
    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM rith_item");
        return $result;
    }

    public function insert_items($item_reg, $item_cat, $item_type, $item_ass, $item_name, $item_charger, $item_sec, $item_area, $item_detail, $item_sup, $item_warrant, $fileName)
    {
        $result = mysqli_query($this->dbcon, "INSERT INTO rith_item(item_reg, item_cat, item_type,item_ass, item_name, item_charger, item_sec, item_area, item_detail, item_sup, item_war,item_img) 
        VALUES ('$item_reg', '$item_cat', '$item_type', '$item_ass', '$item_name', '$item_charger','$item_sec', '$item_area','$item_detail', '$item_sup', '$item_warrant','$fileName')");
        return $result;
    }
    public function record_item($item_name)
    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM rith_item WHERE item_name = '$item_name'");
        return $result;
    }
    public function update_items($item_reg, $item_cat, $item_type, $item_ass, $item_name, $item_charger, $item_sec, $item_area, $item_detail, $item_sup, $item_warrant, $fileName)
    {
        $item_detail = mysqli_real_escape_string($this->dbcon, $item_detail);

        $result = mysqli_query($this->dbcon, "UPDATE rith_item SET 
    item_reg = '$item_reg',
    item_cat = '$item_cat',
    item_type = '$item_type', 
    item_ass = '$item_ass',        
    item_charger = '$item_charger',
    item_sec = '$item_sec',       
    item_area = '$item_area',
    item_detail = '$item_detail',
    item_sup = '$item_sup',
    item_war ='$item_warrant',
    item_img = '$fileName'
    WHERE item_name = '$item_name'");

        return $result;
    }


    public function delete_items($item_name)
    {
        $delete_item = mysqli_query($this->dbcon, "DELETE FROM `rith_item` WHERE item_name = '$item_name'");
        return $delete_item;
       
    }

    //-------------------BORROWS--------------------//

    public function fetchdata_br_id_new()
    {
        $queryID = mysqli_query($this->dbcon, "SELECT * FROM rith_dborrow ORDER BY br_id DESC LIMIT 1");
        $lastID = $queryID->fetch_assoc();

        $currentDate = date('Ym'); // Get the current date in ym format

        if ($lastID == "") {
            $lastID = "BR-".$currentDate . "001";
        } else {
            $lastID = $lastID['br_id'];
            $lastIDDate = substr($lastID, 0, 4); // Extract ym from the last job ID

            if ($lastIDDate == $currentDate) {
                $lastIndex = intval(substr($lastID, -3)); // Extract the last 3 digits (index) and convert to an integer
                $newIndex = str_pad(($lastIndex + 1), 3, '0', STR_PAD_LEFT); // Increment the index and pad with leading zeros
                $lastID = "BR-".$currentDate . $newIndex;
            } else {
                $lastID = "BR-".$currentDate . "001";
            }
        }

        return $lastID;
    }


    public function fetchdata_br_id()

    {
        $queryID = mysqli_query($this->dbcon, "SELECT * FROM rith_dborrow  ORDER BY br_id DESC limit 1  ");
        $lastID = $queryID->fetch_assoc();

        isset($lastID['br_id']);
        if ($lastID == "") {
            $lastID = "BR-" . date('Ym') . "001";
        } else {
            $lastID = substr($lastID['br_id'], 3);
            $lastID = intval($lastID);
            $lastID = "BR-" . ($lastID + 1);
        }
        return $lastID;
    }

    public function fetch_br_id()
    {
        $queryID = mysqli_query($this->dbcon, "SELECT * FROM rith_dborrow ORDER BY br_id DESC limit 1");
        return $queryID;
    }

    public function fetchdata_br()
    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM rith_dborrow");
        return $result;
    }

    public function
    insert_br($br_id, $br_d, $rtp_d, $user_name, $user_lastname, $user_sec, $user_mail, $dv_name,$ar_u,$rm_b)    
    {
        $result = mysqli_query($this->dbcon, "INSERT INTO rith_dborrow(br_id, br_d, rtp_d, user_name, user_lastname, user_sec,user_mail, dv_name, ar_u, rm_b)
                VALUES ('$br_id','$br_d','$rtp_d' ,'$user_name', '$user_lastname', '$user_sec', '$user_mail', '$dv_name', '$ar_u', '$rm_b')");
        return $result;
    }

    public function record_br($br_id)
    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM rith_dborrow WHERE br_id='$br_id'");
        return $result;
    }


    public function user_return($name_r,$lname_r,$mail_r,$rt_d, $sts_r, $br_id)
    {
        $result = mysqli_query($this->dbcon, "UPDATE rith_dborrow SET 
        name_r = '$name_r',
        lname_r = '$lname_r',
        mail_r = '$mail_r',
        rt_d = '$rt_d',
        sts_r = '$sts_r'        
        WHERE br_id = '$br_id'");
        return $result;
    }

    public function up_device($dv_sts, $dv_name)
    {
        $result = mysqli_query($this->dbcon, "UPDATE dv_br SET   
        dv_sts = '$dv_sts'        
        WHERE dv_name = '$dv_name'");
        return $result;
    }

    public function up_sts_br($sts_r,$app_r,$app_rd, $br_id)
    {
        $result = mysqli_query($this->dbcon, "UPDATE rith_dborrow SET   
        sts_r = '$sts_r',
        app_r = '$app_r' ,
        app_rd = '$app_rd'        
        WHERE br_id = '$br_id'");
        return $result;
    }
    

    
    public function adm_approve($app_b,$sts_b, $app_bd,$sts_r ,$br_id)
    {
        $result = mysqli_query($this->dbcon, "UPDATE rith_dborrow SET 
        app_b = '$app_b',
        sts_b = '$sts_b',       
        app_bd = '$app_bd', 
        sts_r = '$sts_r' 
        WHERE br_id = '$br_id'");
        return $result;
    }

    public function delete_br($br_id)
    {
        $delete_job = mysqli_query($this->dbcon, "DELETE FROM rith_dborrow WHERE br_id= '$br_id'");
        return $delete_job;
    }

    public function
     approve_br($br_id,$app_b,$app_d, $sts_b )
    {
        $result = mysqli_query($this->dbcon, "INSERT INTO 
       rith_dborrow  (br_id,app_b,app_d,,sts_b)  
        VALUES ('$br_id','$app_b','$app_d','$sts_b')");
        return $result;
    }

    public function fetchdata_reply_br($chk_id)
    {
        if (isset($chk_id)) {
            $result = mysqli_query($this->dbcon, " SELECT *
        FROM rith_dborrow  INNER JOIN case_reply ON rith_dborrow .job_id=case_reply.chk_id  WHERE chk_id = '$chk_id'");
            return $result;
        } else {
            $result = mysqli_query($this->dbcon, " SELECT *
        FROM rith_dborrow   WHERE job_id = '$chk_id'");
        }
    }

//-----------------------------RETURN-----------------------------------//



public function
    insert_return($user_name, $user_lastname, $user_sec, $user_mail,$act_d,$e_name,$rm_rtp)
    {
        $result = mysqli_query($this->dbcon, "INSERT INTO 
        rith_dborrow(br_id,br_d,trp_d, user_name, user_lastname, user_sec, user_mail, e_name,ar_u,rm_b)
         VALUES ($user_name', '$user_lastname', '$user_sec', '$user_mail','$act_d','$e_name','$rm_rtp')");
        return $result;
    }
    public function update_rtp($act_d, $user_name, $user_lastname, $user_sec, $user_mail, $e_name,$br_id)
    {
        $result = mysqli_query($this->dbcon, "UPDATE rith_dborrow SET 
        act_d = '$act_d',       
        user_name = '$user_name',
        user_lastname = '$user_lastname',
        user_sec = '$user_sec',
        user_mail = '$user_mail',
        e_name = '$e_name',          
       
        WHERE br_id = '$br_id'");
        return $result;
    }

    //------------------------upload----------------------------//
    public function upload_pic($job_img)
    {


        date_default_timezone_set('Asia/Bangkok');
        $date = date("Ymd");
        $numrand = (mt_rand());
        $type = strrchr($_FILES['upload']['name'], ".");

        // File upload path
        $path_img = "..upload/job_img/";
        $fileName = $numrand . $date . $type;
        $targetFilePath = $path_img . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        if (isset($_POST['save']) && !empty($_FILES['upload']['name'])) {
            // Allow certain file formats
            $allowTypes = array('jpg', 'png', 'jpeg');
            if (in_array($fileType, $allowTypes)) {
                // Upload file to server
                if (move_uploaded_file($_FILES['upload']['tmp_name'], $targetFilePath)) {
                    // Insert image file name into database


                    $result = mysqli_query($this->dbcon, "INSERT INTO rith_jobcase('job_img') 
			VALUES('$fileName')") or die("Error in query: $result die(mysqli_error($this->dbcon))");

                    if ($result) {

                        echo "<script type='text/javascript'>";
                        echo "alert('The file has been uploaded successfully.');";
                        echo "window.location = 'upload.html'; ";
                        echo "</script>";
                    } else {
                        echo "<script type='text/javascript'>";
                        echo "alert('File upload failed, please try again.');";
                        echo "window.location = 'upload.html'; ";
                        echo "</script>";
                    }
                } else {
                    echo "<script type='text/javascript'>";
                    echo "alert('Sorry, there was an error uploading your file.');";
                    echo "window.location = 'upload.html'; ";
                    echo "</script>";
                }
            } else {

                echo "<script type='text/javascript'>";
                echo "alert('Sorry, only JPG, JPEG, PNG,  files are allowed to upload');";
                echo "window.location = 'upload.html'; ";
                echo "</script>";
            }
        } else {
            echo "<script type='text/javascript'>";
            echo "alert('Please select a file to upload.');";
            echo "window.location = 'upload.html'; ";
            echo "</script>";
        }
    }

//---------------------aSHOW DEVICES-------------------------------------------//


public function showDV() {
          $result = mysqli_query($this->dbcon, "SELECT * FROM dv_br ");
          return $result;
}

    //----------CART---------//
    function addToCart($user_id, $dv_name) {
    if (isset($_POST['add_to_cart'])) {
        $user_id = $_SESSION["ID"];
        $dv_name = $_POST['dv_name'];
      
        $select_cart = mysqli_query($this->dbcon, "SELECT * FROM 'rith_dborrow' WHERE dv_name = '$dv_name' AND user_name = '$user_id'") or die('query failed');

        if (mysqli_num_rows($select_cart) > 0) {
            $message[] = 'Product already added to cart!';
        } else {
            mysqli_query($this->dbcon, "INSERT INTO `rith_dborrow`(user_name, dv_name) VALUES ('$user_id', '$dv_name')") or die('query failed');
            $message[] = 'Product added to cart!';
        }
    }
    }


    function removeFromCart() {
    if (isset($_GET['remove'])) {
        $remove_id = $_GET['remove'];
        $remove_cart = mysqli_query($this->dbcon, "DELETE FROM `rith_dborrow` WHERE br_id = '$remove_id'") or die('query failed');
        return $remove_cart;
        header('location: brr_tbl.php');
    }
    }

    function deleteAllFromCart() {
    if (isset($_GET['delete_all'])) {
        $user_id = $_SESSION["ID"];
        $remove_all = mysqli_query($this->dbcon, "DELETE FROM `rith_dborrow` WHERE user_name = '$user_id'") or die('query failed');
        return $remove_all;
        header('location: brr_tbl.php');
            
    }
    }
    public function showCart()
    {
        $user_id = $_SESSION["ID"];
        $result = mysqli_query($this->dbcon, "SELECT * FROM rith_dborrow WHERE user_name= '$user_id'");
        return $result;
    }

    public function showDVByPage($start, $productsPerPage)
    {
        // Construct the SQL query using placeholders for dynamic values
        $query = "SELECT * FROM dv_br LIMIT ?, ?";

        // Prepare the statement
        $stmt = $this->dbcon->prepare($query);

        // Bind the dynamic values to the placeholders
        $stmt->bind_param("ii", $start, $productsPerPage);

        // Execute the query
        $stmt->execute();

        // Return the result
        return $stmt->get_result();
    }
  


}


// Display status message
