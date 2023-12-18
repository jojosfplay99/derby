<!-- Modal -->
<form id="submit_schedule">
<div class="modal fade" id="register" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Schedules</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="form-floating mb-3">
          <textarea type="text" class="form-control" id="title" name="title" placeholder="farmname" style="height:100px;"></textarea>
          <label for="floatingInput">Title</label>
        </div>
        <div class="form-floating mb-3">
          <textarea type="text" class="form-control" id="promoter" name="promoter" placeholder="farmname" style="height:100px;"></textarea>
          <label for="floatingInput">Promoter</label>
        </div>
        <div class="form-floating mb-3">
          <input type="text" class="form-control" id="location" name="location" placeholder="farmname">
          <label for="floatingInput">Location</label>
        </div>
        <div class="form-floating mb-3">
          <input type="date" class="form-control" id="date_schedule" name="date_schedule" placeholder="farmname">
          <label for="floatingInput">Schedule</label>
        </div>
        <div class="form-floating mb-3">
          <input type="number   " class="form-control" id="number" name="number" placeholder="farmname">
          <label for="floatingInput">Number of Fights</label>
        </div>
        <div class="form-floating">
          <select class="form-select mb-3" id="type" name="type" aria-label="Floating label select example">
            <option selected disabled>--Options--</option>
            <option value="Cock">Cock</option>
            <option value="Stag">Stag</option>
            <option value="Combo">Combo</option>
          </select>
          <label for="floatingSelect">Type</label>
        </div>
        <div class="form-floating mb-3">
          <input type="number" class="form-control" id="prize" name="prize" step="0.01" placeholder="farmname">
          <label for="floatingInput">Prize</label>
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

<!-- Modal -->
<form id="update_schedule">
<div class="modal fade" id="reschedule" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Re-Schedules</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="form-floating mb-3">
          <input type="text" class="form-control" name="scheduled_id" id="scheduled_id" placeholder="farmname" readonly>
          <label for="floatingInput">ID</label>
        </div>          
        <div class="form-floating mb-3">
          <input type="date" class="form-control" name="date_schedule" id="set_reschedule" placeholder="farmname">
          <label for="floatingInput">Schedule</label>
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
