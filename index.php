<!-- Developed by Sarvesh Raje -->
<?php 
    $messagestring = '';
    $loginstatus = '';
    include('include/config.php');
    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['userpassword'];

        //Sql Statement to find Username and Password
        $sql = "select * from users where UserName = '".$username."' and Password = '".$password."'";
        //Query to database
        $query = $dbh->prepare($sql);

        $query->execute();
        
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        if($query->rowCount() > 0){
            $messagestring =  "Login Successful";
            $loginstatus = "success";
            session_start();
            foreach($results as $row){
                $_SESSION['id'] = $row->id;
            }
            header('Location: dashboard.php');
        }else{
            $messagestring =  "Please check Username and Password";
            $loginstatus = "fail";
        }
    }

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Login File</title>
</head>
<<<<<<< HEAD
<body>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    
=======

<body class="bg-light">
    <section class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-4 p-3">
                    <div class="shadow border-0 rounded-3 mb-3 w-100 bg-white">
                        <h5 class="card-title bg-primary py-3 text-light rounded-3 text-center mb-3 fw-bold">Login Form
                        </h5>
                        <div class="card-body">
                            <form action="#" method="post">
                                <div class="mb-3">
                                    <label for="username" class="form-label">User Name</label>
                                    <input type="text" class="form-control" id="username" name="username"
                                        aria-describedby="usernameHelp" required>
                                    <div id="usernameHelp" class="form-text">We'll never share your details with anyone
                                        else.
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="userpassword" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="userpassword" name='userpassword'
                                        required>
                                </div>
                                <button type="submit" name="login" id="login"
                                    class="btn btn-primary d-block w-100">Login</button>
                            </form>
                            <div class="error-section mt-3">
                                <?php
                                    if($loginstatus == 'success'){
                                        echo '<div class="alert alert-success" role="alert">'.$messagestring.'</div>';
                                    }else if($loginstatus == 'fail'){
                                        echo '<div class="alert alert-danger" role="alert">'.$messagestring.'</div>';
                                    }
                                ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>
>>>>>>> 510f7d14ef32cc00c0a2b98fcebb6eefa08544b7
</body>

</html>