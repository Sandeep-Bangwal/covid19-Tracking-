<!doctype html>
<html lang="en">

<head>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/996973c893.js" crossorigin="anonymous"></script>
    <title>COVID-19</title>
</head>


<body>
    
    <div class="container-fluid bg-light p-5 text-center my-3">
        <h1 class="">Covid-19 Tracker</h1>
        <h5 class="text-muted"> all the COVID-19 cases around the indian state .</h5>
    </div>
<!-- Logic -->
    <?php

// Json Data
$data = file_get_contents('https://api.covid19india.org/data.json');
$coranalive = json_decode($data, true);

$statescount = count($coranalive['statewise']);

// Total cases count 
$i=0;
if ($i < $statescount){
	?>
    <div class="container-fluid my-5">
        <div class="row text-center">
            <div class="col-4 text-warning">
                <h5>Confirmed</h5>
                <h3 class="counter"> <?php  echo $coranalive['statewise'][0]['confirmed'] ; ?> </h3>

            </div>
            <div class="col-4 text-success">
                <h5>Recovered</h5>
               <h3 class="counter" ><?php echo $coranalive['statewise'][0]['recovered']  ; ?> </h3>
            </div>
            <div class="col-4 text-danger">
                <h5>Active</h5>
               <h3 class="counter"> <?php  echo $coranalive['statewise'][0]['active'] ;?> </h3>
            </div>
        </div>
    </div>

    <?php  
}

?>
<!-- fatch data into table format -->
    <div class="container-fluid bg-light p-3 my-5 text-center">
        <h5 class="text-info">"Prevention is the Cure."</h5>
        <p class="text-muted">Stay Indoors Stay Safe.</p>
    </div>
    <div class="container-fluid">
        <div class="table-responsive">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col"> last updatime</th>
                        <th scope="col"> state</th>
                        <th scope="col"> confirmed</th>

                        <th scope="col"> active</th>
                        <th scope="col">recovered</th>
                        <th scope="col">deaths</th>

                    </tr>

                    <?php

$data = file_get_contents('https://api.covid19india.org/data.json');
$coranalive = json_decode($data, true);

$statescount = count($coranalive['statewise']);




$i=1;
while($i < $statescount){
?>
                    <tr>
                        <td><?php echo $coranalive['statewise'][$i]['lastupdatedtime'] ?></td>
                        <td><?php echo $coranalive['statewise'][$i]['state'] ?></td>
                        <td>
                            <?php echo $coranalive['statewise'][$i]['confirmed'] ?>
                            <small class="text-danger pl-3"><i
                                    class="fas fa-arrow-up"></i><?php echo $coranalive['statewise'][$i]['deltaconfirmed'] ?>
                            </small>

                        </td>

                        <td><?php echo $coranalive['statewise'][$i]['active'] ?></td>
                        <td><?php echo $coranalive['statewise'][$i]['recovered'] ?></td>
                        <td><?php echo $coranalive['statewise'][$i]['deaths'] ?></td>
                    </tr>
                   
                    <?php
  $i++;
}

?>
            </table>
        </div>
    </div>
    <footer class="footer mt-auto py-3 bg-dark">
        <div class="container-fluid text-center">
            <span class="text-muted">Copyright &copy;2020, <a>sandeep</a></span>
        </div>
    </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"
        integrity="sha256-jDnOKIOq2KNsQZTcBTEnsp76FnfMEttF6AV2DF2fFNE=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js"
        integrity="sha256-JtQPj/3xub8oapVMaIijPNoM0DHoAtgh/gwFYuN5rik=" crossorigin="anonymous"></script>
   
    <script>
     
    $('.counter').counterUp({
        delay: 10,
        time: 1000
    });
    </script>
</body>

</html>