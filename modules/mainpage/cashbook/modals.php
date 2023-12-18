<form id="submit_new_ledger1">
<div class="modal fade" id="cashbook_modals" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Ledger</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="form-floating mb-3">
          <textarea type="text" class="form-control" id="payee" name="payee" placeholder="name@example.com" rows="5" required></textarea>
          <label for="fight_no">PAYEE</label>
        </div>

        <div class="row">
          <div class="col">
            <h3 class="text-center" style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">CREDIT</h3>
            <div class="form-floating mb-3">
              <textarea type="text" class="form-control" id="credit_transaction" name="credit_transaction" placeholder="name@example.com" style="height:100px;"></textarea>
              <label for="fight_no">TRANSACTION</label>
            </div>
            <div class="form-floating mb-3">
              <input type="number" class="form-control" id="credit_amount" name="credit_amount" step="0.01" placeholder="name@example.com">
              <label for="fight_no">AMOUNT</label>
            </div>
          </div>
          <div class="col">
            <h3 class="text-center" style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">DEBIT</h3>
              <div class="form-floating mb-3">
                <textarea type="text" class="form-control" id="debit_transaction" name="debit_transaction" placeholder="name@example.com" style="height:100px;"></textarea>
                <label for="fight_no">TRANSACTION</label>
              </div>
              <div class="form-floating mb-3">
                <input type="number" class="form-control" id="debit_amount" name="debit_amount" step="0.01" placeholder="name@example.com">
                <label for="fight_no">AMOUNT</label>
              </div>
          </div>
        </div>

        <div class="form-floating mb-3">
          <textarea type="text" class="form-control" id="remarks" name="remarks" placeholder="name@example.com" style="height:200px;"></textarea>
          <label for="fight_no">REMARKS</label>
        </div>

        <div class="form-floating mb-3">
          <input type="date" class="form-control" id="date_created" name="date_created" value="<?php echo date('Y-m-d')?>" placeholder="name@example.com">
          <label for="fight_no">DATE CREATED</label>
        </div>
       

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Submit</button>
      </div>
    </div>
  </div>
</div>
</form>


<form id="submit_edit_ledger1">
<div class="modal fade" id="edit_cashbook_modals" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Ledger</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="form-floating mb-3">
          <input type="text" class="form-control" id="edit_id" name="edit_id" placeholder="name@example.com" rows="5" readonly>
          <label for="fight_no">ID</label>
        </div>

        <div class="form-floating mb-3">
          <input type="text" class="form-control" id="edit_payee" name="edit_payee" placeholder="name@example.com" rows="5" required>
          <label for="fight_no">PAYEE</label>
        </div>

        <div class="row">
          <div class="col">
            <h3 class="text-center" style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">CREDIT</h3>
            <div class="form-floating mb-3">
              <textarea type="text" class="form-control" id="edit_credit_transaction" name="edit_credit_transaction" placeholder="name@example.com" style="height:100px;"></textarea>
              <label for="fight_no">TRANSACTION</label>
            </div>
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="edit_credit_amount" name="edit_credit_amount" placeholder="name@example.com">
              <label for="fight_no">AMOUNT</label>
            </div>
          </div>
          <div class="col">
            <h3 class="text-center" style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">DEBIT</h3>
              <div class="form-floating mb-3">
                <textarea type="text" class="form-control" id="edit_debit_transaction" name="edit_debit_transaction" placeholder="name@example.com" style="height:100px;"></textarea>
                <label for="fight_no">TRANSACTION</label>
              </div>
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="edit_debit_amount" name="edit_debit_amount" placeholder="name@example.com">
                <label for="fight_no">AMOUNT</label>
              </div>
          </div>
        </div>

        <div class="form-floating mb-3">
          <textarea type="text" class="form-control" id="edit_remarks" name="edit_remarks" placeholder="name@example.com" style="height:200px;"></textarea>
          <label for="fight_no">REMARKS</label>
        </div>

        <div class="form-floating mb-3">
          <input type="date" class="form-control" id="edit_date_created" name="edit_date_created" placeholder="name@example.com">
          <label for="fight_no">DATE CREATED</label>
        </div>
       

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Submit</button>
      </div>
    </div>
  </div>
</div>
</form>