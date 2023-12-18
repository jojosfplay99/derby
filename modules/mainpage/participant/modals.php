<!-- Modal -->
<form id="submit_participant" class="was-validated">
<div class="modal fade" id="participant" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Registration</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="input-group input-group mb-3">
          <span class="input-group-text" id="inputGroup-sizing">Search</span>          
          <select class="js-example-basic-single form-control" name="search" id="search" aria-describedby="inputGroup-sizing" required></select>
        </div>
        <div class="form-floating mb-3">
          <input type="text" class="form-control"  name="farm_id" id="farm_id_participant" placeholder="farmname" readonly required>
          <label for="floatingInput">Farm ID</label>
        </div>
        <div class="form-floating mb-3">
          <input type="text" class="form-control"  name="regno" id="regno_participant" placeholder="farmname" style="height:50px;" required>
          <label for="floatingInput">Registration Number</label>
        </div>
        <div class="form-floating mb-3">
          <input type="text" class="form-control"  name="farm_name" id="farm_name_participant" placeholder="farmname" style="height:50px;" required>
          <label for="floatingInput">Farm Name</label>
        </div>
        <div class="form-floating mb-3">
          <input type="text" class="form-control"  name="ownername" id="ownername_participant" placeholder="farmname" style="height:50px;" required>
          <label for="floatingInput">Owner's Name</label>
        </div>
        <div class="input-group input-group mb-3">
          <span class="input-group-text" id="inputGroup-sizing">Schedule</span>          
          <select class="js-example-basic-single form-control" name="search_schedule" id="search_schedule" aria-describedby="inputGroup-sizing" required></select>
        </div>
        <div class="row">
          <div class="col">
            <div class="form-floating mb-3">
              <input type="date" class="form-control"  name="schedule_date" id="schedule_date_participant" placeholder="farmname" readonly required>
              <label for="floatingInput">Schedule</label>
            </div>    
          </div>
          <div class="col">
            <div class="form-floating mb-3">
              <input type="text" class="form-control"  name="schedule_code" id="schedule_code_participant" placeholder="farmname" readonly required>
              <label for="floatingInput">Schedule Code</label>
            </div>    
          </div>
        </div>        
        <hr>
        <div class="row">
          <div class="col">
            <div class="form-floating mb-3">
              <input type="text" class="form-control"  name="stagcock_no" id="stagcock_no" placeholder="farmname" autocomplete="off"  required>
              <label for="floatingInput">StagCock Number</label>
            </div>    
          </div>          
        </div>
        <div class="row">
          <div class="col">
            <div class="form-floating mb-3">
              <input type="text" class="form-control"  name="wingband" id="wingband" placeholder="farmname" autocomplete="off" required>
              <label for="floatingInput">Wingband</label>
            </div>    
          </div>
          <div class="col">
            <div class="form-floating mb-3">
              <input type="text" class="form-control"  name="legband" id="legband" placeholder="farmname" autocomplete="off" required>
              <label for="floatingInput">Legband</label>
            </div>    
          </div>          
        </div>
        <div class="row">
          <div class="col">
            <div class="form-floating mb-3">
              <input type="text" class="form-control"  name="weight" id="weight" placeholder="farmname" autocomplete="off" required>
              <label for="floatingInput">Weight</label>
            </div>    
          </div>
          <div class="col">
            <div class="form-floating mb-3">
              <input type="text" class="form-control"  name="bet" id="bet_currency" placeholder="farmname" autocomplete="off" required>
              <label for="floatingInput">Bet</label>
            </div>    
          </div>          
        </div>
      </div>      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" onclick="window.location.reload(true)">Close</button>
        <button type="submit" class="btn btn-primary" >Add Participant</button>
      </div>
    </div>
  </div>
</div>  
</form>


<!-- Modal -->
<form id="submit_edit" class="was-validated">
<div class="modal fade" id="edit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Registration</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">        
        <div class="form-floating mb-3">
          <input type="text" class="form-control"  name="id" id="id_edit" placeholder="farmname" readonly>
          <label for="floatingInput">ID</label>
        </div>
        <div class="row">
          <div class="col">
            <div class="form-floating mb-3">
              <input type="text" class="form-control"  name="stagcock_no" id="stagcock_no_edit" placeholder="farmname" autocomplete="off"  required>
              <label for="floatingInput">StagCock Number</label>
            </div>    
          </div>          
        </div>
        <div class="row">
          <div class="col">
            <div class="form-floating mb-3">
              <input type="text" class="form-control"  name="wingband" id="wingband_edit" placeholder="farmname" autocomplete="off" required>
              <label for="floatingInput">Wingband</label>
            </div>    
          </div>
          <div class="col">
            <div class="form-floating mb-3">
              <input type="text" class="form-control"  name="legband" id="legband_edit" placeholder="farmname" autocomplete="off" required>
              <label for="floatingInput">Legband</label>
            </div>    
          </div>          
        </div>
        <div class="row">
          <div class="col">
            <div class="form-floating mb-3">
              <input type="text" class="form-control"  name="weight" id="weight_edit" placeholder="farmname" autocomplete="off" required>
              <label for="floatingInput">Weight</label>
            </div>    
          </div>
          <div class="col">
            <div class="form-floating mb-3">
              <input type="text" class="form-control"  name="bet" id="bet_edit" placeholder="farmname" autocomplete="off" required>
              <label for="floatingInput">Bet</label>
            </div>    
          </div>          
        </div>
      </div>      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" onclick="window.location.reload(true)">Close</button>
        <button type="submit" class="btn btn-primary" >Add Participant</button>
      </div>
    </div>
  </div>
</div>  
</form>


