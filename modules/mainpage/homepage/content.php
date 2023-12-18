<div class="container-fluid" style="background-color:#EAEDED; height:100vh;">
	<div class="mb-5"><br><br></div>	
	
		<div class="card shadow p-1 mb-5 bg-body rounded">
		  <div class="card-header">
		    Homepage
		  </div>
		  <div class="card-body">
		    <h2 class="card-title text-center">ENTRANCE</h2>
			<div class="form-floating mb-3" style="width:50%;">
				<input type="date" class="form-control" name="date_filter" id="date_filter" style="width:50%;" value="<?php echo date('Y-m-d')?>" placeholder="name@example.com">
				<label for="floatingInput">Date</label>
			</div>
		    <table id="example" class="table table-bordered" style="width:100%">
		        <thead>
		            <tr>
		                <th>ID</th>
		                <th>ENTRANCE NUMBER</th>
		                <th>DATE</th>	
						<th>RAFFLE</th>	
						<th>STATUS</th>		                
		                <th>ACTION</th>
		            </tr>
		        </thead>
		        <tfoot>
		            <tr>
						<th>ID</th>
		                <th>ENTRANCE NUMBER</th>
		                <th>DATE</th>
						<th>RAFFLE</th>	
						<th>STATUS</th>		                	                		                
		                <th>ACTION</th>
		            </tr>
		        </tfoot>
		    </table>

			<hr>
			
			<div class="container-fluid" id="raffle_div" style="height:300px;">
          
        	</div>

		  </div>
		</div>
</div>