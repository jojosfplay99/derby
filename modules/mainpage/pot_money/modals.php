<?php

date_default_timezone_set('Asia/Manila');
$date_today = date('Y-m-d');
$entrance_num = date('Mdyhis');

?>

<form id="submit_form1">
<div class="modal fade" id="pot_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Pot Money</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
        <div class="input-group input-group mb-3">
          <span class="input-group-text" id="inputGroup-sizing" style="width:200px;">Search Farm</span>          
          <select class="js-example-basic-single form-control" name="search2" id="search2" aria-describedby="inputGroup-sizing" required></select>
        </div>

        <div class="input-group input-group mb-3">
          <span class="input-group-text" id="inputGroup-sizing" style="width:200px;">Search Schedule Code</span>          
          <select class="js-example-basic-single form-control" name="search3" id="search3" aria-describedby="inputGroup-sizing" required></select>
        </div>

        <div class="row">
          <div class="col">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" name="entry_id1" id="entry_id1" style="text-transform:uppercase" placeholder="name@example.com" autocomplete="off" readonly>
              <label for="floatingInput">Entry ID</label>
            </div>
          </div>
          <div class="col">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" name="schedule_code" id="schedule_code1" style="text-transform:uppercase" placeholder="name@example.com" autocomplete="off" readonly>
              <label for="floatingInput">Schedule Code</label>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" name="farm_name" id="farm_name1" style="text-transform:uppercase" placeholder="name@example.com" autocomplete="off" readonly>
              <label for="floatingInput">Farm Name</label>
            </div>
          </div>
          <div class="col">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" name="ownername1" id="ownername1" style="text-transform:uppercase" placeholder="name@example.com" autocomplete="off" readonly>
              <label for="floatingInput">Owner Name</label>
            </div>  
          </div>
        </div>

        <div class="row">
          <div class="col">
            <div class="form-floating mb-3">
              <input type="date" class="form-control" name="date_today" id="date_today" value="<?php echo $date_today;?>" style="text-transform:uppercase" placeholder="name@example.com"  autocomplete="off" readonly>
              <label for="floatingInput">Date Today</label>
            </div>
          </div>
          <div class="col">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" name="payor" id="payor1" style="text-transform:uppercase" placeholder="name@example.com" autocomplete="off" required>
              <label for="floatingInput">Payor</label>
            </div>
          </div>
        </div>

        <div class="form-floating mb-3">
          <input type="text" class="form-control" name="pot_money" id="pot_money" style="text-transform:uppercase" placeholder="name@example.com" autocomplete="off" required>
          <label for="floatingInput">Pot Money</label>
        </div>                      

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add Pot Money</button>
      </div>
    </div>
  </div>
</div>
</form>
        

<div class="modal fade" id="qr_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="form-floating mb-3">
          <input type="text" class="form-control" name="entrance_num" id="entrance_num2" style="text-transform:uppercase" placeholder="name@example.com">
          <label for="floatingInput">Entrance Number</label>
        </div>
        <div class="form-floating mb-3">
          <input type="date" class="form-control" name="date_today" id="date_today2" style="text-transform:uppercase" placeholder="name@example.com">
          <label for="floatingInput">Date Today</label>
        </div>
               
        <div class="text-center" id="qrcode2"></div>        

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success" id="print_qr">Print</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="raffle_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Raffle</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
              
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="submit_entrance">Add Entrance</button>
      </div>
    </div>
  </div>
</div>