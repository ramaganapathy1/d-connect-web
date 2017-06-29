<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>DDU-GKY</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="dist/sweetalert-master/dist/sweetalert.css">
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
<body  id="main" class="img-responsive" style="background:whitesmoke;">
<div id="mySidenav" class="sidenav" onclick="closeNav()">
    <img src="dist/img/smartlogo.png" style="margin:0 0 0 10%;" class="img-responsive">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="index.php">Home</a>
    <a href="candidateSelection.php">Candidate Selection </a>
    <a href="send.php">Push Notification</a>
    <a href="alert.php">Alert</a>
    <a href="recv.php">Queries</a>

</div>
<span style="font-size:30px;color: #222;" class="fa fa-bars" onclick="openNav()"> Menu </span>
<br>
<br>
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
    <div class="row" onclick="closeNav()">
        <div class="col-md-3">
            <div class="small-box bg-purple-active">
                <div class="inner">
                    <h3><?php
                        $curl = curl_init("172.104.51.13:8080/stat/total");
                        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                        $result = curl_exec($curl);
                        $result=json_decode($result,1);
                        echo $result[0]['scount'];
                        #echo $result;
                        curl_close($curl);
                        ?><sup style="font-size: 20px"></sup></h3>

                    <p>Total Candidates</p>
                </div>
                <div class="icon">
                    <i class="fa fa-users"></i>
                </div>
                <p class="small-box-footer">
                </p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="small-box" style="background:#626262;color: snow;">
                <div class="inner">
                    <h3>
                        <?php
                        $curl = curl_init("172.104.51.13:8080/stat/inprogress");
                        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                        $result = curl_exec($curl);
                        $result = json_decode($result,1);
                        curl_close($curl);
                        echo $result[0]['scount'];
                        ?>
                        <sup style="font-size: 20px;"></sup></h3>

                    <p>In Progress</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <p class="small-box-footer">
                </p>
            </div>
        </div>
    <div class="col-md-3">
    <div class="small-box bg-purple-active">
        <div class="inner">
            <h3><?php
                $curl = curl_init("172.104.51.13:8080/stat/state");
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                $result = curl_exec($curl);
                curl_close($curl);
                $result = json_decode($result,true);
                echo sizeof($result);
                ?>
                <sup style="font-size: 20px"></sup></h3>

            <p>States Using This</p>
        </div>
        <div class="icon">
            <i class="fa fa-globe"></i>
        </div>
        <p class="small-box-footer">
        </p>
    </div>
    </div>

        <div class="col-md-3">
            <div class="small-box" style="background:#626262;color: snow;">
                <div class="inner">
                    <h3><?php $curl = curl_init("172.104.51.13:8080/stat/candidprogress");
                        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                        $result = curl_exec($curl);
                        $result=json_decode($result,1);
                        echo $result[0]['scount'];
                        curl_close($curl);
                        ?><sup style="font-size: 20px"></sup></h3>

                    <p>Candidates Undergoing Training</p>
                </div>
                <div class="icon">
                    <i class="fa fa-user"></i>
                </div>
                <p class="small-box-footer">
                </p>
            </div>
        </div>
</div>
    <div class="row">

    <div class="col-md-5">
        <div class="box-header">
            <h1>Progress</h1>
        </div>
        <div class="small-box" style="background:#626262;color: snow;">
        <div class="inner">
            <div id="curve_chart" style="width: 438px; height: 300px"></div>
         </div>
        <p class="small-box-footer">
        </p>
    </div>
    </div>
        <div class="col-md-7 ">
            <div class="box box-primary collapsed-box">
                <div class="box-header with-border">
                    <h3 class="box-title">Overview - Map</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div>

                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="inner">
                                <a href="map.html" class="btn btn-primary" >Go To The Map</a>
                                <div id="chart_div"></div>
                            </div>
                        </div>
                    </div>

                    <!-- /.box-body -->
                </div>
            </div>
        </div>

        <div class="col-md-7">
            <div class="box box-solid bg-purple-active ">
                <div class="box-header with-border">
                    <h3 class="box-title">Send Notifications</h3>

                    <div class="box-tools pull-right collapsed-box">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form role="form" action="scripts/sendNotif.php" method="post">
                        <label>Subject</label>
                        <input type="text" class="form-control" placeholder="Enter the subject " name="subject">
                        <label>Message</label>
                        <textarea name="content" col="10" row="10" class="form-control" placeholder="Type the message here!"></textarea>
                        <br>
                        <input type="submit" name="send" value="Send" class="btn btn-bitbucket">
                    </form>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
</div>
</div>
<footer class="user-footer" style="border-top:2px solid #222;padding:15px;width:100%;margin-top:5%; ">

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
    function initMap() {
        // Create a map object and specify the DOM element for display.
        var map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: -34.397, lng: 150.644},
            scrollwheel: false,
            zoom: 8
        });
    }

</script>
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
<script type='text/javascript' src='https://www.gstatic.com/charts/loader.js'></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAuiWaDmr6ky8kGCIousEjixrcMQv-TH0U&callback=initMap"
        type="text/javascript"></script>

<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Year', 'Candidates Registered'],
            <?php
             #   require ('scripts/dbcon.php');
            #$sql = "SELECT year,count(*) FROM candidate group by YEAR";
            #$result = $conn->query($sql);

            /*if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    $count=$row['count(*)'];
                    $year = $row['year'];
                    echo "['$year',$count],\n";
                }
            } else {
                echo "0 results";
            }
            $conn->close();*/
            ?>['2004',1500],
            ['2005',1000],
            ['2006',1200]
        ]);

        var options = {
            title: 'Scheme Progress',
            curveType: 'function',
            legend: { position: 'bottom' }
        };

        var chart = new google.visualization.BarChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
    }
    google.charts.load('current', {'packages': ['geochart']});
    google.charts.setOnLoadCallback(drawMarkersMap);

    function drawMarkersMap() {
        var data = google.visualization.arrayToDataTable([
            ['State','Registered Users',],
            
            <?php
            #$curl = curl_init("172.104.51.13:8080/stat/state");
            #curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            #$result = curl_exec($curl);
            #curl_close($curl);
            #$result = json_decode($result,true);
            #for($i=0;$i<sizeof($result);$i++)
            #{
             #   if($i!=sizeof($result)-1)
             #       echo "['",trim($result[$i]['state'],' '),"',",$result[$i]['scount'],"],\n";
              #  else
              #      echo "['",trim($result[$i]['state'],' '),"',",$result[$i]['scount'],"]\n";
            #}

            ?>['Mettupalayam',10],
['Ettimdai',1],            
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
<script>
    var customLabel = {
        restaurant: {
            label: 'C'
        },
        bar: {
            label: 'B'
        }
    };

    function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
            center: new google.maps.LatLng(-33.863276, 151.207977),
            zoom: 12
        });
        var infoWindow = new google.maps.InfoWindow;

        // Change this depending on the name of your PHP or XML file
        downloadUrl('https://storage.googleapis.com/mapsdevsite/json/mapmarkers2.xml', function(data) {
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName('marker');
            Array.prototype.forEach.call(markers, function(markerElem) {
                var id = markerElem.getAttribute('id');
                var name = markerElem.getAttribute('name');
                var address = markerElem.getAttribute('address');
                var type = markerElem.getAttribute('type');
                var point = new google.maps.LatLng(
                    parseFloat(markerElem.getAttribute('lat')),
                    parseFloat(markerElem.getAttribute('lng')));

                var infowincontent = document.createElement('div');
                var strong = document.createElement('strong');
                strong.textContent = name
                infowincontent.appendChild(strong);
                infowincontent.appendChild(document.createElement('br'));

                var text = document.createElement('text');
                text.textContent = address
                infowincontent.appendChild(text);
                var icon = customLabel[type] || {};
                var marker = new google.maps.Marker({
                    map: map,
                    position: point,
                    label: icon.label
                });
                marker.addListener('click', function() {
                    infoWindow.setContent(infowincontent);
                    infoWindow.open(map, marker);
                });
            });
        });
    }



    function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function() {
            if (request.readyState == 4) {
                request.onreadystatechange = doNothing;
                callback(request, request.status);
            }
        };

        request.open('GET', url, true);
        request.send(null);
    }

    function doNothing() {}
</script>
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
