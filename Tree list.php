<?php
    //connect to db
//    include('config/db_connect.php');
//        
//    $sql = 'SELECT * FROM tree_info ORDER BY category';
//
//    $result = mysqli_query($conn, $sql);
//
//    $trees = mysqli_fetch_all($result, MYSQLI_ASSOC);
//
//    //free result from memory
//    mysqli_free_result($result);
//
//    //close connection
//    mysqli_close($conn);

    $conn_string = "host=ec2-54-225-72-238.compute-1.amazonaws.com port=5432 dbname=dd6mqv3gs2odmu user=fyfjbkmagcjdqy password=1c408f7c3644b0db91d4c3f70ed00eae5cd328dd7d8eab2e6a5f9cd08e1d9abb";
    $conn = pg_connect($conn_string);

    if(!$conn){
        echo 'Connection error: ' . mysqli_connect_error();
    }

    $result = pg_query($conn, "SELECT * FROM tree_info ORDER BY category");
    if (!$result) {
        echo "An error occurred.\n";
    }

    $trees = pg_fetch_all($result, PGSQL_ASSOC);

    pg_free_result($result);

    pg_close($conn);
?>

<!DOCTYPE html>
<html>

<head>
    <title>PlantATree Tree List</title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <meta name="robots" content="follow, index" />
    <meta property="og:site_name" content="PlantAtree" />
    <meta property="og:type" content="Article" />
    <meta property="og:title" content="PlantAtree" />

    <link rel="shortcut icon" type="image/x-icon" href="symbol_icon.jpg" />
    <link rel="stylesheet" href="bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="https://www.southernwoods.co.nz/libraries/jquery/css/smoothness/jquery-ui.css" type="text/css" />
    <link rel="stylesheet" type="text/css" href="stysheet1.css" />
    <link rel="stylesheet" type="text/css" href="stylesheet2.css" />
    <link rel="stylesheet" href="https://www.southernwoods.co.nz/includes/icomoon.css?1557354655" type="text/css" />
    <link rel="stylesheet" href="stylesheet.css" type="text/css" />
    <link rel="stylesheet" href="https://www.southernwoods.co.nz/includes/styles.css?1557354655" type="text/css" />
    <link rel="stylesheet" href="https://www.southernwoods.co.nz/includes/skins/flat/green.css" type="text/css" />
    <script type="text/javascript" src="https://www.southernwoods.co.nz/libraries/jquery/jquery.js"></script>
    <script type="text/javascript" src="https://www.southernwoods.co.nz/libraries/jquery/jquery-ui.js"></script>
    <script type="text/javascript" src="https://www.southernwoods.co.nz/includes/jquery.customSelect.js"></script>
    <script type="text/javascript" src="https://www.southernwoods.co.nz/libraries/jquery/galleria.js"></script>
    <script type="text/javascript" src="https://www.southernwoods.co.nz/includes/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://www.southernwoods.co.nz/includes/template.js?1557354655"></script>
    <script type="text/javascript" src="https://www.southernwoods.co.nz/includes/icheck.js"></script>
</head>
<h4 class="center gray-text">Tree list</h4>

<div class="container">
    <div class="row">
        <?php foreach($trees as $trees){ ?>
        <div class="col s6 md3">
            <div class="card z-depth-0">
                <div class="card content center">
                    <?php 
                    switch($trees['name']){
                        case "White Agapanthus":
                            break;
                        case "Pink Abelia":
                            echo '<img src="images/pink_abelia_full" alt="PinkAbelia" width="200" height="200" />';
                            break;
                    }
                    ?>
                    <h5>Tree Name: <?php echo $trees['name']; ?></h5>
                    <h5>Category: <?php echo htmlspecialchars($trees['category']);?></h5>
                    <h5>Soil Drainage Condition: <?php echo htmlspecialchars($trees['soil_drainage']);?></h5>
                    <h5>Sunlight Condition: <?php echo htmlspecialchars($trees['sun']);?></h5>
                    <h5>Maintainence Requirements: <?php echo htmlspecialchars($trees['maint_req']);?></h5>
                    <h5>Max Height of Mature Tree: <?php echo htmlspecialchars($trees['max_height']);?></h5>
                    <h5>Growth Rate: <?php echo htmlspecialchars($trees['growth_rate']);?></h5>
                    <h5>Price: $<?php echo htmlspecialchars($trees['price']);?></h5>
                    <a class="brand-text" href="#">more info</a>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>


</div>

</html>
