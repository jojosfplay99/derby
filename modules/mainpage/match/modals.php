<!-----START------>
<form id="winner_form">
<div class="modal fade" id="set_winner" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Set Winner</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="form-floating mb-3">
          <input type="text" class="form-control" name="matching_id" id="matching_id" placeholder="name@example.com" readonly>
          <label for="floatingInput">Match ID</label>
        </div>
        <div class="list-group">
          <div class="row mb-2">
            <div class="col">
              <label class="list-group-item d-flex gap-2">
                <input class="form-check-input flex-shrink-0" type="radio" name="listGroupRadios" id="listGroupRadios1" value="MATCH_A" checked>
                <span>
                  Match A
                  <small class="d-block text-body-secondary"><span id="match_a_name"></span></small>
                </span>
              </label>
            </div>
            <div class="col">
              <label class="list-group-item d-flex gap-2">
                <input class="form-check-input flex-shrink-0" type="radio" name="listGroupRadios" id="listGroupRadios2" value="MATCH_B">
                <span>
                  Match B
                  <small class="d-block text-body-secondary"><span id="match_b_name"></span></small>
                </span>
              </label>
            </div>            
          </div>
          
          <div class="row">
            <div class="col">
              <label class="list-group-item d-flex gap-2">
                <input class="form-check-input flex-shrink-0" type="radio" name="listGroupRadios" id="listGroupRadios3" value="DRAW">
                <span>
                  Draw   
                  <small class="d-block text-body-secondary">Draw Fight</small>
                </span>               
              </label>
            </div>
            <div class="col">
              <label class="list-group-item d-flex gap-2">
                <input class="form-check-input flex-shrink-0" type="radio" name="listGroupRadios" id="listGroupRadios4" value="NO_FIGHT">
                <span>
                  No Fight
                  <small class="d-block text-body-secondary">No Fight</small>
                </span>
              </label>
            </div>            
          </div>
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
<!-----END------>
<!-----START------>
<div class="modal fade" id="set_fight" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Set Fight No.</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="form-floating mb-3">
          <input type="number" class="form-control" name="set_fight_no" id="set_fight_no" placeholder="name@example.com">
          <label for="floatingInput">Fight Number</label>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="submit_fight">Submit</button>
      </div>
    </div>
  </div>
</div>
<!-----END------>
<div class="modal fade" id="match_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Match Fight</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!----------BODY---------->
        <!-------ACCORDION-------->
        <div class="accordion" id="accordionExample1">
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
                Entry Listing
              </button>
            </h2>
            <div id="collapse1" class="accordion-collapse collapse show" data-bs-parent="#accordionExample1">
              <div class="accordion-body">
                <table id="example3" class="table table-bordered" style="width:100%;font-size: 12px;">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>FARM NAME</th>
                      <th>OWNERNAME</th>
                      <th>REGNO</th>
                      <th>SCHEDULE FIGHT</th>
                      <th>SCHEDULE CODE</th>
                      <th>STAGCOCK</th>
                      <th style="width:10%;">WINGBAND</th>
                      <th style="width:10%;">LEGBAND</th>
                      <th style="width:10%;">WEIGHT</th>
                      <th style="width:10%;">BET</th>
                      <th style="width:10%;">FIGHT NO</th>
                      <th>STATUS</th>
                    </tr>
                  </thead>  
                  <tfoot>
                    <tr>
                      <th>ID</th>
                      <th>FARM NAME</th>
                      <th>OWNERNAME</th>
                      <th>REGNO</th>
                      <th>SCHEDULE FIGHT</th>
                      <th>SCHEDULE CODE</th>
                      <th>STAGCOCK</th>
                      <th style="width:10%;">WINGBAND</th>
                      <th style="width:10%;">LEGBAND</th>
                      <th style="width:10%;">WEIGHT</th>
                      <th style="width:10%;">BET</th>
                      <th style="width:10%;">FIGHT NO</th>
                      <th>STATUS</th>
                    </tr>
                  </tfoot>          
                </table>                
              </div>
            </div>
          </div>
        </div>
        <!-------BREAK-------->
        <br> 
          <div class="position-relative top-0 start-50 translate-middle" style="border-bottom:solid 1px;width:90%"></div>                
        <br>
        <div class="d-flex flex-row">
          <div class="card flex-fill mx-2">
            <div class="card-header">
                Match A
            </div>
            <div class="card-body">
                <div class="input-group mb-3">
                      <span class="input-group-text" id="basic-addon1" style="width: 25%;">Match ID</span>
                      <input type="text" class="form-control" id="match_a" name="match_a" placeholder="Match A" aria-label="Username" aria-describedby="basic-addon1" readonly>
                </div>
                <div class="input-group mb-3">
                      <span class="input-group-text" id="basic-addon1" style="width: 25%;">Regno</span>
                      <input type="text" class="form-control" id="regno_a" name="regno_a" placeholder="Regno" aria-label="Username" aria-describedby="basic-addon1" readonly>
                </div>
                <div class="input-group mb-3">
                      <span class="input-group-text" id="basic-addon1" style="width: 25%;">Farm Name</span>
                      <input type="text" class="form-control" id="farmname_a" name="farmname_a" placeholder="Regno" aria-label="Username" aria-describedby="basic-addon1" readonly>
                </div>
                <div class="input-group mb-3">
                      <span class="input-group-text" id="basic-addon1" style="width: 25%;">Owner Name</span>
                      <input type="text" class="form-control" id="ownername_a" name="ownername_a" placeholder="Regno" aria-label="Username" aria-describedby="basic-addon1" readonly>
                </div>
                <div class="input-group mb-3">
                      <span class="input-group-text" id="basic-addon1" style="width: 25%;">Fight Code</span>
                      <input type="text" class="form-control" id="fightcode_a" name="fightcode_a" placeholder="Regno" aria-label="Username" aria-describedby="basic-addon1" readonly>
                </div>
                <div class="input-group mb-3">
                      <span class="input-group-text" id="basic-addon1" style="width: 25%;">Fight Schedule</span>
                      <input type="text" class="form-control" id="fightschedule_a" name="fightschedule_a" placeholder="Regno" aria-label="Username" aria-describedby="basic-addon1" readonly>
                </div>
                <div class="input-group mb-3">
                      <span class="input-group-text" id="basic-addon1" style="width: 25%;">Weight</span>
                      <input type="text" class="form-control" id="weight_a" name="weight_a" placeholder="Weight" aria-label="Username" aria-describedby="basic-addon1" readonly>
                </div>
                <div class="input-group mb-3">
                      <span class="input-group-text" id="basic-addon1" style="width: 25%;">Bet</span>
                      <input type="text" class="form-control" id="bet_a" name="bet_a" placeholder="Bet" aria-label="Username" aria-describedby="basic-addon1">
                </div>
            </div>          
          </div>
          <!-------BREAK-------->
          <div class="card flex-fill">
            <div class="card-header">
              Match B
            </div>
            <div class="card-body">
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1" style="width: 25%;">Match ID</span>
                <input type="text" class="form-control" id="match_b" name="match_b" placeholder="Match B" aria-label="Username" aria-describedby="basic-addon1">
              </div>
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1" style="width: 25%;">Regno</span>
                <input type="text" class="form-control" id="regno_b" name="regno_b" placeholder="Regno" aria-label="Username" aria-describedby="basic-addon1">
              </div>
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1" style="width: 25%;">Farm Name</span>
                <input type="text" class="form-control" id="farmname_b" name="farmname_b" placeholder="Farm Name" aria-label="Username" aria-describedby="basic-addon1" readonly>
              </div>                              
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1" style="width: 25%;">Owner Name</span>
                <input type="text" class="form-control" id="ownername_b" name="ownername_b" placeholder="Owner Name" aria-label="Username" aria-describedby="basic-addon1" readonly>
              </div>
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1" style="width: 25%;">Fight Code</span>
                <input type="text" class="form-control" id="fightcode_b" name="fightcode_b" placeholder="Fight Code" aria-label="Username" aria-describedby="basic-addon1" readonly>
              </div>
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1" style="width: 25%;">Fight Schedule</span>
                <input type="text" class="form-control" id="fightschedule_b" name="fightschedule_b" placeholder="Fight Schedule" aria-label="Username" aria-describedby="basic-addon1" readonly>
              </div>
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1" style="width: 25%;">Weight</span>
                <input type="text" class="form-control" id="weight_b" name="weight_b" placeholder="Weight" aria-label="Username" aria-describedby="basic-addon1">
              </div>
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1" style="width: 25%;">Bet</span>
                <input type="text" class="form-control" id="bet_b" name="bet_b" placeholder="Bet" aria-label="Username" aria-describedby="basic-addon1">
              </div>
            </div>
          </div>
        </div>
        
        <!----------BODY---------->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" id="match_fight" class="btn btn-primary" >Match</button>
      </div>
    </div>
  </div>
</div>
<!-----END------>
<div class="modal fade" id="bet_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Bet</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="accordion" id="accordionExample1">
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne1" aria-expanded="true" aria-controls="collapseOne">
                Add Bet
              </button>
            </h2>
            <div id="collapseOne1" class="accordion-collapse collapse" data-bs-parent="#accordionExample1">
              <div class="accordion-body">

                <div class="row">
                  <div class="col">
                    <div class="text-center" style="width: 400px" id="reader"></div>
                  </div>
                  <div class="col">
                    <form id="submit_additional_bet">
                      <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1" style="width: 30%;">Match ID</span>
                        <input type="text" class="form-control" name="match_id" id="match_id" placeholder="Entrance Number / Transnum" aria-label="Username" aria-describedby="basic-addon1">
                      </div>

                      <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1" style="width: 30%;">Entrance Number</span>
                        <input type="text" class="form-control" name="data1" id="data1" placeholder="Entrance Number / Transnum" aria-label="Username" aria-describedby="basic-addon1">
                      </div> 

                      <div class="input-group mb-3">                      
                        <span class="input-group-text" id="basic-addon1" style="width: 30%;">Additional Bet</span>
                        <input type="text" class="form-control" name="additional_bet" id="additional_bet" placeholder="Additional Bet" aria-label="Username" aria-describedby="basic-addon1" required>                  
                      </div>

                      <div class="form-floating mb-3">
                        <select class="form-select" name="match_type" id="match_type" aria-label="Floating label select example" required>
                          <option selected disabled>--OPTION--</option>
                          <option value="match_a">MATCH A</option>
                          <option value="match_b">MATCH B</option>                    
                        </select>
                        <label for="floatingSelect">Works with selects</label>
                      </div>
                        
                      <button class="btn btn-primary btn square btn-sm" type="submit" id="submit1" style="width: 20%;">Add Bet</button>
                    </form>
                  </div>                  
                </div>
                                                                
              </div>
            </div>


          </div>                  
        </div>

        <br> 

        <div class="d-flex flex-row">
          <!------FLEX BODY----->
          <div class="card flex-fill mx-1">
            <h5 class="card-header">Match A</h5>
            <div class="card-body">                                                                                                       

              <table id="example4" class="table table-bordered display" style="width:100%;">
                <thead>
                    <tr>
                      <th >ID</th>
                      <th >MATCH ID</th>                    
                      <th >TRANSNUM</th>
                      <th >BET</th> 
                      <th style="width: 10%;">ACTION</th>                    
                    </tr>
                </thead> 
                <tfoot>
                  <tr>
                    <th >ID</th>
                    <th >MATCH ID</th>                    
                    <th >TOTAL ADDITIONAL BET</th>
                    <th >BET</th> 
                    <th style="width: 10%;"></th>                    
                  </tr>
                </tfoot>           
              </table>

            </div>
          </div>
          <div class="card flex-fill">
            <h5 class="card-header">Match B</h5>
            <div class="card-body">
              
              
              <table id="example5" class="table table-bordered display" style="width:100%;">
                <thead>
                  <tr>
                    <th >ID</th>
                    <th >MATCH ID</th>                    
                    <th >TRANSNUM</th>
                    <th >BET</th> 
                    <th style="width: 10%;">ACTION</th>                    
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th >ID</th>
                    <th >MATCH ID</th>                    
                    <th >TOTAL ADDITIONAL BET</th>
                    <th >BET</th> 
                    <th style="width: 10%;"></th>                    
                  </tr>
                </tfoot>            
              </table>

            </div>
          </div>
          <!------FLEX BODY----->
        </div>
        <br>        


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success" id="print_bet_result">Print</button>
        <button type="button" class="btn btn-primary" id="print_bet_slip">Final Bet Slip</button>
      </div>
    </div>
  </div>
</div>
<!-----END------>

<div class="modal fade" id="winner_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Result</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div>          
          <h3 class="text-center" style="font-family:serif">WINNER</h3>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="fight_no" name="fight_number" placeholder="name@example.com">
            <label for="floatingInput">Fight Number</label>
          </div>
          <div class="d-flex flex-row">
            <button class="btn btn-primary form-control mx-1" id="button_match_a">MATCH A</button>
            <button class="btn btn-success form-control mx-1" id="button_draw">DRAW</button>
            <button class="btn btn-primary form-control mx-1" id="button_match_b">MATCH B</button>
          </div>
          
          <br>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
    </div>
  </div>
</div>

<form id="submit_edit_bet">
<div class="modal fade" id="edit_bet_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Owner's Bet</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="edit_matching_id" name="edit_matching_id" placeholder="name@example.com">
            <label for="floatingInput">MATCH ID</label>
          </div>
                                   
          <div class="row">
            <div class="col">
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="edit_match_id_a" name="match_id_a" placeholder="name@example.com">
                <label for="floatingInput">ENTRY ID</label>
              </div>
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="edit_farmname_a" name="farmname_a" placeholder="name@example.com">
                <label for="floatingInput">FARM NAME</label>
              </div>
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="edit_bet_owner_a" name="bet_owner_a" placeholder="name@example.com">
                <label for="floatingInput">BET</label>
              </div>
            </div>
            <div class="col-1"></div>
            <div class="col">
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="edit_match_id_b" name="match_id_b" placeholder="name@example.com">
                <label for="floatingInput">ENTRY ID</label>
              </div>
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="edit_farmname_b" name="farmname_b" placeholder="name@example.com">
                <label for="floatingInput">FARM NAME</label>
              </div>
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="edit_bet_owner_b" name="bet_owner_b" placeholder="name@example.com">
                <label for="floatingInput">BET</label>
              </div>
            </div>
          </div>
          
          <br>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Understood</button>
      </div>
    </div>
  </div>
</div>
</form>


<!-----START------>
<form id="submit_set_masyada">
<div class="modal fade" id="set_masyada" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Set Masyada</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="form-floating mb-3">
          <input type="number" class="form-control" name="set_matching_id_data" id="set_matching_id_data" placeholder="name@example.com">
          <label for="floatingInput">MATCHING ID</label>
        </div>
        <div class="form-floating mb-3">
          <input type="number" class="form-control" name="set_total_bet_a" id="set_total_bet_a" placeholder="name@example.com">
          <label for="floatingInput">TOTAL BET A</label>
        </div>
        <div class="form-floating mb-3">
          <input type="number" class="form-control" name="set_total_bet_b" id="set_total_bet_b" placeholder="name@example.com">
          <label for="floatingInput">TOTAL BET B</label>
        </div>
        <div class="form-floating mb-3">
          <input type="number" class="form-control" name="set_pareha_data" id="set_pareha_data" placeholder="name@example.com">
          <label for="floatingInput">PAREHA</label>
        </div>
        <div class="form-floating mb-3">
          <input type="number" class="form-control" name="set_deperensya_data" id="set_deperensya_data" placeholder="name@example.com">
          <label for="floatingInput">DEPERENSYA</label>
        </div>
        <div class="form-floating mb-3">
          <input type="number" class="form-control" name="set_masyada_data" id="set_masyada_data" placeholder="name@example.com">
          <label for="floatingInput">MASYADA</label>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" >Submit</button>
      </div>
    </div>
  </div>
</div>
</form>
<!-----END------>