<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
      <style type="text/css">
         .{
             margin:0;
             padding: 0;
             outline: 0;
         } 
         body{
            background-image:url("002.png");
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
            font-family:sans-serif;
            margin-top: 40px;
        }
        h1{
            padding: 5px;
            background-color: rgba(88, 112, 190,0.6);
            color: aqua;
            box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
            border-radius: 10px;
        }
        table{
            border-radius: 10px;
            border-width: 0px;
            border-collapse: collapse;
            border-spacing: 0;
            text-align: center;
            overflow: hidden;
            box-shadow: 0 12px 12px rgba(32,32,32,0.3);
        }
        td{
            color: black;
        }
        th{
            border-width: 0px;
            background-color: rgba(166, 133, 222,0.4);
;
        }
      </style>
    <title>Policy Data</title>
</head>
<body>
    <div class="container">
        <div class="col-lg-12">
            <h1 class="text-center">Policy Data</h1><br>
            <table class="table table-border table-hover table-stripped">
                <tr>
                    <th>Policy No</th>
                    <th>Coverage</th>
                    <th>Date of Issue</th>
                    <th>Term Price</th>
                    <th>Deduction</th>
                    <th>No. of Policy Holders</th>
                    <th>Delete</th>
                    <th>Update</th>
                </tr>
                <?php 
                include 'conn.php';
                $q="select * from policy";
                $query=mysqli_query($con,$q);
                while($res=mysqli_fetch_array($query)) {
                ?>
                <tr>
                <?php 
                    $n=$res['policy_no']; 
                    $q2="select count(*) from policy p, customer c where c.policy_no=p.policy_no and p.policy_no=$n";
                    $q22=mysqli_query($con,$q2);
                    $res1=mysqli_fetch_array($q22);
                    ?>
                    <td><?php echo $res['policy_no']; ?></th>
                    <td><?php echo $res['coverage']; ?></th>
                    <td><?php echo $res['issue_date']; ?></th>
                    <td><?php echo $res['term_price']; ?></th>
                    <td><?php echo $res['deduciton']; ?></th>
                    <td><?php echo $res1['count(*)']; ?></th>
                    <td><button class="btn-danger btn" name="del"><a href="pdelete.php?id=<?php echo $res['policy_no']; ?>" class="text-white">Delete</a></button></td>
                    <td><button class="btn-primary btn"><a href="pupdate.php?id=<?php echo $res['policy_no']; ?>" class="text-white">Update</a></button></td>
                </tr>
             <?php  } ?>

            </table> 
        </div>
    </div>
    
</body>
</html>