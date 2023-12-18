<!-- Modal -->
<form id="submit_registration">
<div class="modal fade" id="register" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Registration</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="form-floating mb-3">
          <textarea type="text" class="form-control" id="floatingInput" name="farm_name" placeholder="farmname" style="height:100px;"></textarea>
          <label for="floatingInput">Farm Name</label>
        </div>
        <div class="form-floating mb-3">
          <textarea type="text" class="form-control" id="floatingInput" name="ownername" placeholder="farmname" style="height:100px;"></textarea>
          <label for="floatingInput">Owner's Name</label>
        </div>
        <div class="form-floating mb-3">
          <input type="text" class="form-control" id="floatingInput" name="address" placeholder="farmname">
          <label for="floatingInput">Address</label>
        </div>
        <div class="form-floating mb-3">
          <input type="text" class="form-control" id="floatingInput" name="contactno" placeholder="farmname">
          <label for="floatingInput">Contact Number</label>
        </div>
        <div class="form-floating mb-3">
          <input type="date" class="form-control" id="floatingInput" name="date_registered" placeholder="farmname" value="<?php echo date('Y-m-d')?>">
          <label for="floatingInput">Date Registered</label>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Understood</button>
      </div>
    </div>
  </div>
</div>  
</form>
