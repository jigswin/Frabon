<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Careers</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="image/favicon.png">
    <link rel="stylesheet" href="assets/css/main.css" />
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" type="text/css" href="admin/plugins/editors/quill/quill.snow.css">
</head>

<body>
  
    <?php include("layout/header.php"); ?>

    <div class="LBDsS">
        <div class="xoBaT">

            <?php $query = mysqli_query($con, "SELECT * FROM `job` WHERE status = 1 "); ?>

            <h3>
                Jobs (<?php echo mysqli_num_rows($query) ?>)
            </h3>

            <div class="HdH7O">

            <?php while($row = mysqli_fetch_assoc($query)) { ?>

                <div class="QtOC3">
                    <a href="job-details?id=<?php echo $row['id'] ?>">
                        <div class="G5GRk">
                            <h5 class="SgCMr"><?php echo $row['title'] ?></h5>
                            <p>₹<?php echo $row['min_salary'] ?> - ₹<?php echo $row['max_salary'] ?> | <?php echo $row['location'] ?></p>
                            <p>No Of Openings : <?php echo $row['vacancy'] ?></p>
                            <p>Description : </p>
                            <div class="RJrdh"><?php echo $row['description'] ?></div>
                            <a href="javascript:;"><button class="ICs6K" data-i="<?php echo $row['id'] ?>">Apply Now</button></a>
                        </div>
                    </a>
                </div>

            <?php } ?>

            </div>

            <?php if(mysqli_num_rows($query) == 0) {
                echo "<h5 align='center'>No Job Posted</h5>";
            } ?>

        </div>
    </div>

    <?php 
        include("job-apply.php");
        include("layout/footer.php");
    ?>

</body>

</html>