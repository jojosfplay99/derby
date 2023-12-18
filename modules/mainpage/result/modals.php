<div class="modal fade" id="declare_winner" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Declare Winner</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="fight_no" placeholder="name@example.com">
              <label for="fight_no">Fight No</label>
            </div>
          </div>
          <div class="col">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="schedule_code" placeholder="name@example.com">
              <label for="schedule_code">Fight No</label>
            </div>
          </div>
          <div class="col">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="schedule_fight" placeholder="name@example.com">
              <label for="schedule_fight">Scheduled Fight</label>
            </div>
          </div>
        
        </div>

        <div class="d-flex flex-row ">
          <div class="flex-fill mx-3">
            <table class="table table-bordered table-responsive" style="font-size: 12px;">
              <tr>
                <td>MATCH ID</td>
                <td class="text-center" id="match_a"></td>
              </tr>
              <tr>
                <td>REGISTRATION NO</td>
                <td class="text-center" id="regno_a"></td>
              </tr>
              <tr>
                <td>FARM NAME</td>
                <td class="text-center" id="farmname_a"></td>
              </tr>
              <tr>
                <td>OWNER NAME</td>
                <td class="text-center" id="ownername_a"></td>
              </tr>
              <tr>
                <td>WEIGHT</td>
                <td class="text-center" id="weight_a"></td>
              </tr>
              <tr>                  
                <td>BET</td>
                <td class="text-center" id="bet_a"></td>
              </tr>
            </table>
          </div>
          <div class="mx-3">VS</div>
          <div class="flex-fill mx-3">
            <table class="table table-bordered table-responsive" style="font-size: 12px;"> 
              <tr>                    
                <td class="text-center" id="match_b"></td>
                <td class="text-end">MATCH ID</td>
              </tr>
              <tr>                    
                <td class="text-center" id="regno_b"></td>
                <td class="text-end">REGISTRATION NO</td>
              </tr>
              <tr>                    
                <td class="text-center" id="farmname_b"></td>
                <td class="text-end">FARM NAME</td>
              </tr>
              <tr>                    
                <td class="text-center" id="ownername_b"></td>
                <td class="text-end">OWNER NAME</td>
              </tr>
              <tr>                    
                <td class="text-center" id="weight_b"></td>
                <td class="text-end">WEIGHT</td>
              </tr>
              <tr>                                      
                <td class="text-center" id="bet_b"></td>
                <td class="text-end">BET</td>
              </tr>
            </table>
          </div>
        </div>
        <div class="row mb-1">
          <div class="col">
            <button type="button" class="btn btn-primary form-control" id="declare_winner_a" value="A">Winner A</button>
          </div>
          <div class="col">
            <button type="button" class="btn btn-primary form-control" id="declare_winner_b" value="B">Winner B</button>
          </div>         
        </div>

        <div class="row">
          <div class="col">
            <button type="button" class="btn btn-success form-control" id="declare_winner_draw" value="DRAW">Draw</button>
          </div>
          <div class="col">
            <button type="button" class="btn btn-secondary form-control" id="declare_winner_nf" value="NF">No Fight</button>
          </div>         
        </div>

        

        <hr>
        <br class="mb-5">        
        <div class="text-center" style="font-size:36px;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;line-height:15px;" id="winner_farmname"></div>
        <div class="text-center" style="font-size:24px;font-family:'Times New Roman', Times, serif" id="winner"></div>
        <div class="text-center" style="font-size:14px;font-family:Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif">DECLARED WINNER</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!--------------------------------------------------------------------------->
<div class="modal fade" id="export_data" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Export Data</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       
      <table id="example2" class="table table-bordered display" style="font-size:13px;width:100%">
			  <thead>
		      <tr>
			     	<th>ID</th>
					  <th>MATCH ID</th>
						<th>ENTRY ID</th>
			      <th>FARM NAME</th>
			      <th>OWNERNAME</th>
            <th>OWNER'S BET</th>
						<th>ADDITIONAL BET</th>
						<th>TOTAL BET</th>
						<th>PAREHA</th>
			      <th>DEPERENSYA</th>
			      <th>ARIBA</th>
			      <th>MONTON</th>
						<th>STATUS</th>
						<th>FIGHT CODE</th>
			      <th>FIGHT NO</th>
			      <th>TRANSNUM</th>
			      <th>DATE CREATED</th>
						<th>MATCH TYPE</th>
		      </tr>
		    </thead>
        <tfoot>
		      <tr>
			     	<th>ID</th>
					  <th>MATCH ID</th>
						<th>ENTRY ID</th>
			      <th>FARM NAME</th>
			      <th>OWNERNAME</th>
            <th>OWNER'S BET</th>
						<th>ADDITIONAL BET</th>
						<th>TOTAL BET</th>
						<th>PAREHA</th>
			      <th>DEPERENSYA</th>
			      <th>ARIBA</th>
			      <th>MONTON</th>
						<th>STATUS</th>
						<th>FIGHT CODE</th>
			      <th>FIGHT NO</th>
			      <th>TRANSNUM</th>
			      <th>DATE CREATED</th>
						<th>MATCH TYPE</th>
		      </tr>
		    </tfoot>		    	
		  </table>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!--------------------------------------------------------------------------->
<form id="submit_edit_data">
<div class="modal fade" id="edit_data" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Monton</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">      
        <div class="form-floating mb-3">
          <input type="text" class="form-control" id="edit_result_id" placeholder="name@example.com">
          <label for="fight_no">Result ID</label>
        </div> 
        <div class="form-floating mb-3">
          <input type="text" class="form-control" id="edit_monton" placeholder="name@example.com">
          <label for="fight_no">Monton</label>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </div>
</div>
</form>