<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/lottery.min.css">
    <link rel="stylesheet" href="../../jquery_ui/jquery-ui.min.css">
    <!--<link rel="stylesheet" href="../../css/jquery.steps.css">-->
    <link rel="stylesheet" type="text/css" href="../../datatables/datatables.min.css">
    <link rel="stylesheet" type="text/css" href="../../datatables/Buttons-2.3.3/css/buttons.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="../../datatables/RowGroup-1.3.0/css/rowGroup.bootstrap.min.css">
    

    <link rel="stylesheet" href="../../fontawesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="../../select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="../../select2/select2-bootstrap-5-theme.min.css">
    <link rel="stylesheet" type="text/css" href="../../datatables/SearchPanes-2.1.0/css/searchPanes.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="../../datatables/ColReorder-1.6.1/css/colReorder.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../datatables/Select-1.5.0/css/select.dataTables.min.css"> 

    <link rel="stylesheet" href="style.css">

    
    <script type="text/javascript" src="../../jquery/jquery-3.6.3.min.js"></script>  
    <script type="text/javascript" src="../../jquery/jquery.maskMoney.min.js"></script>    
    <script type="text/javascript" src="../../jquery_ui/jquery-ui.min.js"></script>   
    <!--<script type="text/javascript" src="../../jquery/jquery-qrcode.js"></script>  -->
    <script type="text/javascript" src="../../jquery/jquery.qrcode.min.js"></script>       
    <script type="text/javascript" src="../../jquery/html5-qrcode.min.js"></script> 
    <script src="../../jquery/js.cookie.min.js"></script>
    <script src="../../jquery/jquery.view-engine.min.js"></script>
    <script type="text/javascript" src="../../datatables/datatables.min.js"></script>
    <script type="text/javascript" src="../../datatables/Buttons-2.3.3/js/buttons.bootstrap5.min.js"></script>
    <script type="text/javascript" src="../../datatables/Select-1.5.0/js/select.dataTables.min.js"></script>
    <script type="text/javascript" src="../../datatables/SearchPanes-2.1.0/js/searchPanes.bootstrap5.min.js"></script>
    <script type="text/javascript" src="../../datatables/DateTime-1.2.0/js/dataTables.dateTime.min.js"></script>
    <script type="text/javascript" src="../../datatables/RowGroup-1.3.0/js/dataTables.rowGroup.min.js"></script>
    <script type="text/javascript" src="../../datatables/ColReorder-1.6.1/js/colReorder.bootstrap.min.js"></script>
    <script type="text/javascript" src="../../jquery/datetime.js"></script>
    <script type="text/javascript" src="../../jquery/moment.min.js"></script>
    <script type="text/javascript" src="../../jquery/datetime-moment.js"></script>    
    <script type="text/javascript" src="../../popperjs/popper.min.js"></script>
    <!--<script type="text/javascript" src="../../js/autosize.js"></script>-->
    <!--<script type="text/javascript" src="../../jquery/jquery.steps.min.js"></script>-->
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/lottery.min.js"></script>
    <script type="text/javascript" src="../../swal2/sweetalert2@11.js"></script>
    <script type="text/javascript" src="../../select2/select2.min.js"></script>
    <script src="../../fontawesome/js/all.min.js"></script>
    <script src="../../tinymce/tinymce.min.js"></script>
</head>
<body>

<header>
    <div class="px-3 py-2 text-bg-primary fixed-top">
      <div class="container">
        <div class="d-flex flex-wrap align-items-center  justify-content-center justify-content-lg-start">
          <a href="index.php" class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-white text-decoration-none">
            <i class="fa-solid fa-globe"></i>
          </a>

          <ul class="nav col-lg-auto my-2 justify-content-center my-md-0 text-small">          
            <li>           
              <a href="index.php" class="nav-link text-white text-center">                    
                <i class="fa-solid fa-house"></i><br>Home
              </a>              
            </li>
            

            <li class="nav-item dropdown mx-1 btn-primary">
              <div class="d-flex flex-column">              
                <div class="text-center"><i class="fa-solid fa-calendar-days"></i></div>
                <div class="dropdown-center">                
                  <button class="btn text-white dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="height:100%;width:100%;">                  
                    Registrations
                  </button>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="schedule.php"><i class="fa-solid fa-calendar-days"></i> Schedules</a></li>
                    <li><a class="dropdown-item" href="registration.php"><i class="fa-solid fa-calendar-days"></i> Farm List</a></li>
                    <li><a class="dropdown-item" href="participant.php"><i class="fa-solid fa-calendar-days"></i> Participant List</a></li>                    
                  </ul>
                </div>
              </div>                            
            </li>

            <li class="nav-item dropdown mx-1 btn-primary">
              <div class="d-flex flex-column">              
                <div class="text-center"><i class="fa-solid fa-calendar-days"></i></div>
                <div class="dropdown-center">                
                  <button class="btn text-white dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="height:100%;width:100%;">                  
                    Match Options
                  </button>
                  <ul class="dropdown-menu">
                    <li><a href="pot_money.php" class="dropdown-item"><i class="fa-solid fa-coins"></i> Pot Money</a></li>
                    <li><a href="match.php" class="dropdown-item"><i class="fa-solid fa-handshake-simple"></i> Matching</a></li>
                    <li><a href="result.php" class="dropdown-item"><i class="fa-solid fa-square-poll-vertical"></i> Result</a></li>
                  </ul>
                </div>
              </div>                            
            </li>
                      
            

            <li>           
              <a href="cashbook.php" class="nav-link text-white text-center">                    
                <i class="fa-solid fa-file"></i><br>Ledger
              </a>              
            </li>
            
          </ul>
        </div>
      </div>
    </div>
    <?php include 'homepage/modals.php'?>
  </header>





