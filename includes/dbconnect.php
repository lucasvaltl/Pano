<?php
// Please select DB Connection and make corresponding change in config.php

// OPTION 1: Connection to Azure /////////////////////////////////

define("DB_USERNAME", "b55e2163643140");
  define("DB_PASS", "94533d90");
  define("DB_NAME", "app_pano_database");
  define("DB_HOST", "br-cdbr-azure-south-b.cloudapp.net");
  define("DB_PORT", "3306");
  //$link = mysqli_init();
  $conn = mysqli_connect(
    // $link,
     DB_HOST,
     DB_USERNAME,
     DB_PASS,
     DB_NAME//,
     //DB_PORT
  );
  //test if connection occured
  if(mysqli_connect_errno()) {
      die("Database connection failed: " .
          mysqli_connect_error() .
          " (" . mysqli_connect_errno() . ")"
      );
  }


// OPTION 2: Connection to local DB /////////////////////////////////
/*
    define("DB_USERNAME", "root");
    define("DB_PASS", "root");
    define("DB_NAME", "Pano");
    define("DB_HOST", "localhost");
    define("DB_PORT", "8889");

    //$link = mysqli_init();
    $conn = mysqli_connect(
      // $link,
       DB_HOST,
       DB_USERNAME,
       DB_PASS,
       DB_NAME,
       DB_PORT
    );

    //test if connection occured
    if(mysqli_connect_errno()) {
        die("Database connection failed: " .
            mysqli_connect_error() .
            " (" . mysqli_connect_errno() . ")"
        );
    }
*/


/*
    $FirstName = 'Li';
    $LastName = 'Xie';
    $UserName = 'Likoliko';
    $EmailAddress = 'li@mail.com';
    $Password = 'Password';
    $Location = 'London';
    $ShortDescrip = 'This is a short description';

    */
    /*

    function NewUser() {
        $FirstName = $_POST['FirstName'];
        $LastName = $_POST['LastName'];
        $UserName = $_POST['UserName'];
        $EmailAddress = $_POST['EmailAddress'];
        $Password = $_POST['Password'];
        $Location = $_POST['Location'];
        $ShortDescrip = $_POST['ShortDescrip'];

        $query = "INSERT INTO user (FirstName, LastName, UserName, EmailAddress, Password, Location, ShortDescrip)
        VALUES ('$FirstName', '$LastName', '$UserName', '$EmailAddress', '$Password', '$Location', '$ShortDescrip')";

        if (mysqli_query($conn, $query)) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }
    }

    function SignUp() {
        if (!empty($_POST['UserName'])) {
            $query = mysqli_query("SELECT * FROM user WHERE UserName = '$_POST['user']' AND Password = '$_POST['Password']'")

            if (!$row = mysqli_fetch_array($query)) {
                NewUser();
            } else {
                echo "You've already registered!";
            }
        }
    }

    if (isset($_POST['submit'])) {
        SignUp();
    }

    */


/*


//    $sql = "INSERT INTO user (FirstName, LastName, UserName, EmailAddress, Password, Location, ShortDescrip)
//    VALUES ('Li', 'Xie','Liko', 'li@mail.com', 'Password', 'London', 'This is a short description')";

    $sql = "INSERT INTO user (FirstName, LastName, UserName, EmailAddress, Password, Location, ShortDescrip)
    VALUES ('$FirstName', '$LastName', '$UserName', '$EmailAddress', '$Password', '$Location', '$ShortDescrip')";

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

*/

?>

<?php
 //Close database connection
//mysqli_close($conn);
 ?>
