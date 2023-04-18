<?php
session_start();
include('include/config.php');
if(!isset($_SESSION['id'])){
    header('Location: index.php');
}else{
    $id = $_SESSION['id'];
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Dashboard</title>
</head>

<body class="d-flex flex-column h-100 bg-light">
<?php include('include/headernavigation.php');?>

<main>
    <?php
        $sql = "select * from users where id = $id";

        $query = $dbh->prepare($sql);

        $query->execute();
        
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        if($query->rowCount() > 0){
            $username = $results[0]->UserName;
        }
    ?>

    <section class="py-5">
        <div class="container">
            <h2 class="display-6 fw-semibold text-center">Welcome User : <?php echo strtoupper($username);?></h2>
            
        </div>
    </section>
</main> 



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>
</body>

</html>


<?php
}//check if login is done
?>