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
<body  id="main" class="img-responsive "  >

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
<span style="font-size:30px;cursor: pointer;" class="fa fa-bars" onclick="openNav()"> Menu </span><br><br>
<div onclick="closeNav()">

</div>
<div class="container" onclick="closeNav()" >
    <div class="row">
        <div class="col-md-6 col-lg-offset-3">
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
    </div>

    <div class="row" style="margin: 0 0 0 5%;">
        <div class="col-md-5 col-lg-offset-3">
            <form role="form" method="post" action="candidateSelection.php">
                <label for="State">State</label>
                <select id="state" class="form-control" name="state">
                    <option value="tamil%20nadu">Tamil Nadu</option>
                    <option value="kerala">Kerala</option>
                </select>
                <label for="State">Center</label>
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
                        echo "<option value = $name>$name</option>\n";
                    }
                    ?>
                </select>
                <br>
                <input type="submit" name="userfetch" class="form-control btn-bitbucket" value="Fetch User">
            </form>
        </div>
    </div>

        <?php
            if(isset($_POST['userfetch']))
            {
                $state = $_POST['state'];
                $for = $_POST['tcid'];
                #echo $state;
                #echo "172.16.10.112:5000/cselection/$state";
                $curl = curl_init("172.16.10.112:5000/cselection/$state");
                if($state == "tamil%20nadu"){
                    $state="tamil nadu";
                }
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                $result = curl_exec($curl);
                #print_r($result);
                $result1=json_decode($result,1);
                #echo "Name = >",$result1[0][name];
               # print_r($result1);
                curl_close($curl);
                    echo "<div class=\"row\">
        <br><br> <label><h2>Selected Candidates from $state for $for </h2></label>
        <br>";$i=0;
                  #  echo "Result => ",sizeof($result1);
                for ($i=0;$i<sizeof($result1);$i++)
                {
                    $name=$result1[$i]['name'];
                 #   echo $name;
                    $aadharno=$result1[$i]['aadharno'];
                    $mob=$result1[$i]['mobileno'];
                   echo "<div class=\"col-md-4\">
                        <!-- Widget: user widget style 1 -->
                        <div class=\"box box-widget widget-user-2\">
                            <!-- Add the bg color to the header using any of the bg-* classes -->
                            <div class=\"widget-user-header bg-purple-active\">
                                <div class=\"widget-user-image\">
                                    <img class=\"img-circle\" src=\"dist/img/avatar.png\" alt=\"User Avatar\">
                                </div>
                                <!-- /.widget-user-image -->
                                <h3 class=\"widget-user-username\">$name</h3>
                                <h5 class=\"widget-user-desc\">10</h5>
                            </div>
                            <div class=\"box-footer no-padding\">
                                <ul class=\"nav nav-stacked\">
                                    <li>><a>Aadhar No <span class=\"pull-right badge bg-blue\">$aadharno</span></a></li>
                                    <li><a>Mobile<span class=\"pull-right badge bg-red\">$mob</span></a></li>
                                </ul>
                            </div>
                        </div>
                        </div>
                        <!-- /.widget-user -->
                    ";
                }
            }
        ?></div>
<footer class="user-footer" style="border-top:2px solid #222;padding:15px;width:100%;margin: 5% 0 0 0;bottom: 0;">

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
        document.body.style.backgroundColor = "whitesmoke";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        document.getElementById("main").style.marginLeft = "0";
        document.body.style.backgroundColor = "whitesmoke";
    }
</script>
<script type='text/javascript' src='https://www.gstatic.com/charts/loader.js'></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAuiWaDmr6ky8kGCIousEjixrcMQv-TH0U&callback=initMap"
        type="text/javascript"></script>

<script type="text/javascript">
    google.charts.load('current', {'packages': ['geochart']});
    google.charts.setOnLoadCallback(drawMarkersMap);

    function drawMarkersMap() {
        var data = google.visualization.arrayToDataTable([
            ['State','Registered Users'],
            <?php
            $curl = curl_init("172.104.51.13:8080/stat/state");
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            $result = curl_exec($curl);
            curl_close($curl);
            $result = json_decode($result,true);
            for($i=0;$i<sizeof($result);$i++)
            {
                if($i!=sizeof($result)-1)
                    echo "['",trim($result[$i]['state'],' '),"',",$result[$i]['scount'],"],\n";
                else
                    echo "['",trim($result[$i]['state'],' '),"',",$result[$i]['scount'],"]\n";
            }

            ?>
        ]);

        var options = {
            region: 'IN',
            colorAxis: {colors: ['#626262','purple']},
            backgroundColor: '#81d4fa',
            defaultColor: '#f5f5f5',
            displayMode: 'markers'
        };

        var chart = new google.visualization.GeoChart(document.getElementById('chart_div'));
        chart.draw(data, options);
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
