<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>AOFSPL | Careers</title>
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

            <?php $query = mysqli_query($con, "SELECT * FROM `job` WHERE status = 1 AND id = '{$_GET['id']}' ");
                $row = mysqli_fetch_assoc($query);
                if(mysqli_num_rows($query) == 0) {
                    echo "<script>location.href='careers'</script>";
                }
            ?>

            <h3 class="SgCMr">
                <?php echo $row['title'] ?>
            </h3>

            <div class="HdH7O">
                <table>
                    <tr>
                        <td class="title-c">Salary :</td>
                        <td>₹<?php echo $row['min_salary'] ?> - ₹<?php echo $row['max_salary'] ?></td>
                    </tr>
                    <tr>
                        <td class="title-c">No Of Openings :</td>
                        <td><?php echo $row['vacancy'] ?></td>
                    </tr>
                    <tr>
                        <td class="title-c">Location :</td>
                        <td><?php echo $row['location'] ?></td>
                    </tr>
                    <tr>
                        <td class="title-c">Working Days :</td>
                        <td><?php echo $row['work_days'] ?></td>
                    </tr>
                    <tr>
                        <td class="title-c">Timings :</td>
                        <td><?php echo $row['timings'] ?></td>
                    </tr>
                    <tr>
                        <td class="title-c">Education :</td>
                        <td><?php echo $row['education'] ?></td>
                    </tr>
                    <tr>
                        <td class="title-c">Job Type :</td>
                        <td><?php echo $row['type'] ?></td>
                    </tr>
                    <tr>
                        <td class="title-c">Experience :</td>
                        <td><?php echo $row['experience'] ?></td>
                    </tr>
                    <tr>
                        <td class="title-c">Gender :</td>
                        <td><?php echo $row['gender'] ?></td>
                    </tr>
                    <tr>
                        <td class="title-c">Job Description :</td>
                        <td><?php echo $row['description'] ?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><button class="ICs6K" data-i="<?php echo $row['id'] ?>">Apply Now</button></td>
                    </tr>
                </table>
            </div>

            

        </div>
    </div>

    <?php 
        include("job-apply.php");
        include("layout/footer.php");
    ?>

</body>

</html>