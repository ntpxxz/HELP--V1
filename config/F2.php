
    public function LoginSystem() {
    session_start(); // Starting Session
    $error = ''; // Variable To Store Error Message
    if (!isset($_POST['login'])) {
      if (empty($_POST['user_id']) || empty($_POST['user_pass'])) {
        $error = "Username or Password is invalid";
      }
    } else {
      include 'config/dbconnect.php';
      // Define $username and $password
      $username = $_POST['user_id'];
      $password = $_POST['user_pass'];
      // SQL query to fetch information of registerd users and finds user match.
      $query = "SELECT user_id, user_pass FROM rith_user WHERE user_id=? AND user_pass=? LIMIT 1";
      // To protect MySQL injection for Security purpose
      $stmt = $connect->prepare($query);
      $stmt->bind_param("ss", $username, $password);
      $stmt->execute();
      $stmt->bind_result($username, $password);
      $stmt->store_result();
      if($stmt->fetch()) { //fetching the contents of the row 
        $_SESSION['user_id'] = $username; // Initializing Session
        session_start(); 
      }
      
    }
      
  }
  public function SessionVerify() {
    if(isset($_SESSION['user_id'])){
    header("location: config/checkuser.php"); // Check user session and role
    }
  }
  public function SessionCheck() {
    global $connect;
    session_start();// Starting Session
    // Storing Session
    $user_check = $_SESSION['user_id'];
    // SQL Query To Fetch Complete Information Of User
    $query = "SELECT * FROM rith_user WHERE user_id = '$user_check'";
    $ses_sql = mysqli_query($connect, $query);
    $row = mysqli_fetch_assoc($ses_sql);
    $_SESSION['user_id'] = $row['user_id'];
    $_SESSION['name'] = $row['user_name'] . $row['user_lastname'];
    $_SESSION['role'] = $row['user_type'];
  }
  public function UserType() {
    session_start();
    //if user role is 1, redirect to admin page
    if ($_SESSION['role'] = 'admin') {
      header("Location:admin/user_tbl.php");
      exit; 
    }
    //if user role is 0, redirect to user page
    else {
      header("Location:index.php");
      exit; 
    }
  }
}

class UserFunctions{
  public function UserName() {
    $username = $_SESSION['name'];
    echo $username;
  }
}
?>