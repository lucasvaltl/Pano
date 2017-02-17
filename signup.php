<html>

<head>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <script src="https://use.fontawesome.com/ed51c90fe4.js"></script>
    <link rel="stylesheet" href="css/offset.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/animate.css">
    <title>Pano - Sign Up</title>
</head>

<body id="gradhome">

    <?php

    include('includes/dbconnect.php');

    function NewUser($conn) {
        $FirstName = mysqli_real_escape_string($conn, $_POST['FirstName']);
        $LastName = mysqli_real_escape_string($conn, $_POST['LastName']);
        $UserName = mysqli_real_escape_string($conn, $_POST['UserName']);
        $EmailAddress = mysqli_real_escape_string($conn, $_POST['EmailAddress']);
        $Password = mysqli_real_escape_string ($conn, $_POST['Password']);
        $Password = password_hash($Password, PASSWORD_DEFAULT);
        $Location = mysqli_real_escape_string($conn, $_POST['Location']);
        $ShortDescrip = mysqli_real_escape_string($conn, $_POST['ShortDescrip']);

        $query = "INSERT INTO user (FirstName, LastName, UserName, EmailAddress, Password, Location, ShortDescrip)
        VALUES ('$FirstName', '$LastName', '$UserName', '$EmailAddress', '$Password', '$Location', '$ShortDescrip')";

        if (mysqli_query($conn, $query)) {
            echo "New record created successfully";

            header("Location: home.php");

        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }
    }

    function SignUp($conn) {
        if (!empty($_POST['UserName'])) {
            $query = mysqli_query($conn, "SELECT * FROM user WHERE UserName = '$_POST[UserName]'");
            if (!$row = mysqli_fetch_array($query)) {
                NewUser($conn);
            } else {
                echo "The username you have selected already exists!";
            }
        }
    }

    if (isset($_POST['submit'])) {
        SignUp($conn);
    }

    mysqli_close($conn);
    ?>


    <div id="left"></div>
    <div id="right"></div>
    <div id="top"></div>
    <div id="bottom"></div>
    <br />
    <br />
    <div class="container content">
        <div>
            <div class="row vertical-align">
                <div class="logo animated zoomIn">
                    <img src="images/logo.png" class="png" id="signuplogo">
                </div>
                <br />

                <div class="form-group questionnaire animated slideInLeft">
                    <h3>Welcome to Pano! </h3>

                    <h3>  Please answer these questions to get started:</h3>
                    <br />
                    <div class="row">
                        <form action="signup.php" method="post" class="form-group">
                            <label class="signupform" for="usr">What  do you want to be called on Pano?</label>
                            <input type="text" class="form-control" id="usr" name="UserName" placeholder="User Name">
                            <br />
                            <label for="pwd">Please enter a password!</label>
                            <input type="password" class="form-control" id="pwd" name="Password" placeholder="Password">
                            <br />
                            <label class="signupform" for="usr">What  is you email address?</label>
                            <input type="text" class="form-control" id="usr" name="EmailAddress" placeholder="Email Address">
                            <br />
                            <label class="signupform" for="fname">What  is your first name?</label>
                            <input type="text" class="form-control" id="fname" name="FirstName" placeholder="First Name">
                            <br />
                            <label class="signupform" for="lname">What  is your last name?</label>
                            <input type="text" class="form-control" id="lname" name="LastName" placeholder="Last Name">
                            <br />
                            <label class="signupform" for="location">Where do you live?</label>
                            <input type="text" class="form-control" id="location" name="Location" placeholder="Location">
                            <br />
                            <label class="signupform" for="description">Tell us a bit about yourself:</label>
                            <textarea type="selection" class="form-control" rows="5" maxlength="150" id="description" name="ShortDescrip" placeholder="Who are you? What is it that makes you you?"></textarea>
                            <!--<a href="home.html" type="button" class="btn btn-default lv-button ">Sign Up</a>
                            -->
                            <input type="submit" name="submit" class="btn btn-default lv-button" value="Sign Up" />
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>



</html>
