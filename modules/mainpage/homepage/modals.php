<?php

date_default_timezone_set('Asia/Manila');
$date_today = date('Y-m-d');
$entrance_num = date('Mdyhis');

?>

<div class="modal fade" id="entrance_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Entrance Number</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="form-floating mb-3">
          <input type="text" class="form-control" name="entrance_num" id="entrance_num" value="<?php echo $entrance_num;?>" style="text-transform:uppercase" placeholder="name@example.com">
          <label for="floatingInput">Entrance Number</label>
        </div>
        <div class="form-floating mb-3">
          <input type="date" class="form-control" name="date_today" id="date_today" value="<?php echo $date_today;?>" style="text-transform:uppercase" placeholder="name@example.com">
          <label for="floatingInput">Date Today</label>
        </div>
        <div class="form-floating mb-3">
          <select class="form-select" name="status_entry" id="status_entry" aria-label="Floating label select example">
            <option selected disabled>---SELECT HERE-</option>
            <option value="PARTICIPANT">PARTICIPANT</option>
            <option value="GENERAL ADMISSION">GENERAL ADMISSION</option>
          </select>
          <label for="floatingSelect">Status</label>
        </div>      
        <div class="text-center" id="qrcode"></div>        

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="submit_entrance">Add Entrance</button>
      </div>
    </div>
  </div>
</div>


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
