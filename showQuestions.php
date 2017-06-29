<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>DDU-GKY</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="dist/sweetalert-master/dist/sweetalert.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
    <link rel="stylesheet" href="dist/css/custom/custom.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <link href="https://fonts.googleapis.com/css?family=Baloo+Bhaina|Catamaran:100|Exo:100|Lato|Quicksand:300" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body  id="main">

<div id="mySidenav" class="sidenav" onclick="closeNav()">
    <img src="dist/img/smartlogo.png" style="margin:0 0 0 10%;" class="img-responsive">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="index.php">Home</a>
    <a href="candidateSelection.php">Candidate Selection </a>
    <a href="send.php">Push Notification</a>
    <a href="alert.php">Alert</a>
    <a href="recv.php">Queries</a>

</div>
<br>
&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-size:30px;cursor: pointer;" class="fa fa-bars" onclick="openNav()"> Menu </span><br><br>
<div class="container" onclick="closeNav()">
    <div class="row">
        <div class="col-md-6">
            <div class="small-box bg-purple-active">
                <div class="inner">
                    <h1 style="font-family: 'Quicksand', sans-serif;">D Connect</h1>
                    <div class="icon">
                        <i class="fa fa-connectdevelop"></i>
                    </div>
                    <br>
                    <!--<p>Hello!</p>-->
                </div>
                <p class="small-box-footer">
                </p>
            </div>
        </div>
        <div class="col-md-4">
            <img src="dist/img/smartlogo.png" class="img-responsive" style="margin: 0 0 0 45%;">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <h1>Question for Training Center ID : <?php echo $_POST['tcid']; ?></h1>
    </div>
        <div class="col-lg-7">
            <form role="form" action="scripts/sendQuestions.php" method="post">
                <label>Training Centre Id</label>
            <input type="text" name="tcid" readonly value="<?php echo $_POST['tcid'];?>">
                <table id="candidate" class="table table-bordered table-striped" style="border: 1px grey solid;">
                <thead>
                <tr>
                    <th>Question</th>
                    <th>Type</th>
                    <th>Category</th>
                    <th>Question Rank</th>
                    <th>Toggle</th>

                </tr>
                </thead>
                <tbody >
                <?php
                require ('scripts/dbcon.php');
                $tcid = $_POST['tcid'];
                $sql = "SELECT * FROM question where tcid = '$tcid' order by score ASC";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>".$row['question']."</td>";
                                if($row['type']==0) {
                                    echo "<td>Yes / No Type</td>";
                                }
                                else {
                                   echo "<td>Yes / No</td>";
                                }
                                $tog="";
                                $tog.=$row['id'];
                        echo "<td>".$row['category']."</td><td>".$row['score']."/5</td><td>
                                <select name='$tog'class='form-control' name=$tog>
                                <option value='true' selected>Send</option>
                                <option value='false'>Dont Send</option>
                            </select>
                              </td>
                              </tr>";
                            }
                    }
                $conn->close();
                ?>
                </tbody>
                <thead>
                <tr>
                    <th>Question</th>
                    <th>Type</th>
                    <th>Category</th>
                    <th>Question Rank</th>
                    <th>Toggle</th>

                </tr>
                </thead>
            </table>
        </div>
        <div class="col-lg-6">
            <input type="submit" name="sendq" class="form-control btn btn-primary" value="Send">
        </div>
        </form>
</div>

<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add Queation</h4>
            </div>
            <div class="modal-body">
                <div class="row border-right">
                    <div class="col-lg-8 col-lg-offset-2">
                        <label> <h2>Custom Notifications!</h2></label>
                        <form role="form" action="scripts/addquestion.php" method="post">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Add the question to the center before you push!</label>
                                    <br>
                                    <label>Training Centre</label>
                                    <select class="form-control" name="tcid">
                                        <?php
                                        $curl = curl_init("172.104.51.13:8080/tcentre/all");
                                        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                                        $result = curl_exec($curl);
                                        $result = json_decode($result,1);
                                        curl_close($curl);
                                        for ($i=0;$i<sizeof($result);$i++)
                                        {
                                            $id = $result[$i]['id'];
                                            $name = $result[$i]['name'];
                                            echo "<option value = $id>$name</option>\n";

                                        }
                                        ?>
                                    </select>

                                    <input class="form-control" name="question" placeholder="Type the new question here!">
                                </div><div class="form-group">
                                <label>What Type?</label>
                                <select class="form-control" name="answer">
                                    <option value="0">Yes / No Type</option>
                                    <option value="1">Custom Answer</option>
                                </select>
                                </div></div>
                            <div class="form-group">
                                <input type="submit"  name="addques" value="Add Question" class="form-control btn btn-success">
                            </div></div></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
    <footer class="user-footer" style="border-top:2px solid #222;padding:15px;width:100%;bottom: 0;position: fixed;">

        <!--Footer Links-->
        <div class="container-fluid">
            <div class="row">

                <!--First column-->
                <div class="col-md-4" >
                    MoRD
                    <a href="http://rural.nic.in/"> <img src="dist/img/mord-logo.png" class="img-responsive"></a>
                </div>
                <!--/.First column-->
                <div class="col-md-4">
                    The National Portal Of India
                    <a href="http://india.gov.in/"> <img src="dist/img/india-gov-logo.jpg" class="img-responsive"></a>
                </div>
                <!--Second column-->
                <div class="col-md-4">

                </div>
                <!--/.Second column-->
                <div class="col-md-3">
                    <img src="dist/img/smartlogo.png" class="img-responsive">
                </div>
            </div>
        </div>
        <!--/.Footer Links-->

        <!--Copyright-->
        <div class="footer-copyright">
            <div class="container-fluid">
                Developed & Maintained by GeekSquad
            </div>
        </div>
        <!--/.Copyright-->

    </footer>
</body>
<script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
        document.getElementById("main").style.marginLeft = "250px";
        document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        document.getElementById("main").style.marginLeft = "0";
        document.body.style.backgroundColor = "whitesmoke";
    }
</script>
<!-- ./wrapper -->
<script src="dist/sweetalert-master/dist/sweetalert-dev.js"></script>

<?php
if($_GET['id']!=""){
    if($_GET['id']=="success"){
        echo  "<script>swal(\"You have successfully added it!\", 'Success', \"success\")</script>";
    }
    else
    {
        echo  "<script>swal(\"Cancelled\", \"The question was not saved!\", \"error\");</script>";
    }
}
?>
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>

<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="plugins/morris/morris.min.js"></script>
<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="plugins/knob/jquery.knob.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="plugins/fastclick/fastclick.js"></script>
<script src="dist/js/app.min.js"></script>
<script src="dist/js/pages/dashboard.js"></script>
<script src="dist/js/demo.js"></script>
</body>
</html>
