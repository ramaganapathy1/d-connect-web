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
    <a href="send.php">Push Notification</a>
    <a href="alert.php">Alert</a>
    <a href="recv.php">Analyse</a>
    <a href="#"></a>
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
    <div class="row border-right">
        <div class="col-lg-8">
            <label> <h2>Custom Notifications!</h2></label>
            <form role="form" action="scripts/addquestion.php" method="post">
                <div class="box-body">
                    <div class="form-group">
                        <br>
                        <label>Add the question to the center before you push!</label>
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
                            <option value="1">1</option>
                        </select>
                        <label></label>
                        <input class="form-control" name="question" placeholder="Type the new question here!">
                    </div>
                    <label>WHat Type?</label>
                    <select class="form-control" name="answer">
                        <option value="1">Yes / No Type</option>
                        <option value="0">Custom Answer</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="submit" name="addques" value="Add Question" class="btn btn-success">
                </div></div>

    </div>
</div>
</div>

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
