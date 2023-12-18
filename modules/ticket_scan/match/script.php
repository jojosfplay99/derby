<script type="text/javascript">
	$(document).ready(function () {
		function docReady(fn) {
        // see if DOM is already available
			if (document.readyState === "complete"
				|| document.readyState === "interactive") {
				// call on next available tick
				setTimeout(fn, 1);
			} else {
				document.addEventListener("DOMContentLoaded", fn);
			}
		}

		docReady(function () {
			var resultContainer = document.getElementById('qr-reader-results');
			var lastResult, countResults = 0;
			function onScanSuccess(decodedText, decodedResult) {
				$.ajax({
					method: "POST",
					url: "match/confirm_text.php",
					data: {decoded:decodedText},
					success: function(data) {	
						var result_data = JSON.parse(data);
						alert('PROCEED?')
						if(result_data.count == 0){
							$('#result').removeClass();
							$('#result').addClass("badge text-bg-danger");
							$('#entrance_num').html('');
							$('#entrance_num').html(decodedText);
							$('#result').html("NO MATCH FOUND");																	
						}
						else{							
							$('#entrance_num').html('');
							$('#entrance_num').html(decodedText);																								
							if(result_data.limit == 1){								
								$('#result').removeClass();
								$('#result').addClass("badge text-bg-danger");
								$('#result').html("ALREADY SCANNED!");																								
							}
							else{
								$('#result').removeClass();
								$('#result').addClass("badge text-bg-success");
								$('#result').html("VALID ENTRANCE!");
							}													
						}													
						
					}
				});	
			}

			

			var html5QrcodeScanner = new Html5QrcodeScanner(
				"qr-reader", { fps: 10, qrbox: 250 });
			html5QrcodeScanner.render(onScanSuccess);
		});
	
			/*
		function onScanSuccess(decodedText, decodedResult) {
						
			}
			
			var html5QrcodeScanner = new Html5QrcodeScanner(
			"reader", { fps: 10, qrbox: 480 });
					
			html5QrcodeScanner.render(onScanSuccess);
			
			function done_data(){
				html5QrcodeScanner.clear();
				rerender()
				
			}
			function rerender(){
				var html5QrcodeScanner1 = new Html5QrcodeScanner(
					"reader", { fps: 10, qrbox: 480 });
				html5QrcodeScanner1.render(onScanSuccess);
			}
			*/

			
	});
</script>