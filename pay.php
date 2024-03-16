//card
<script>
	function cardtype()
	{
		var str = document.getElementById('cardnumber').value;
		var res = str.substring(0, 1);
		var res2 = str.substring(0,2);
											 
		if(res==4)
		{
			document.getElementById('cardtype').innerHTML = "VISA";
			document.getElementById('cType').value = "VISA";
		}
		else if(res2 == 51 || res2 == 52 || res2 == 53 || res2 == 54 || res2 == 55 || res2 == 50)
		{
			document.getElementById('cardtype').innerHTML = "MASTERCARD";
			document.getElementById('cType').value = "MASTERCARD";
		}
		else
		{
		document.getElementById('cardtype').innerHTML = "Please use a valid card";
		document.getElementById('cType').value = "Please use a valid card";
		}
	}
</script>

//input
<div class="row">
									<div class="col-xl-6">
										<div class="form-label-group">
											<label for="number">Card Number</label>
											<input type="text" placeholder="1234 1234 1234 1234"required class="form-control" name="number" id="cardnumber" onkeyup="cardtype()" maxlength="19" minlength="16" onkeypress="inputnumber(event)" onkeydown="this.value=this.value.replace(/(\d{4})(?=\d)/,'$1 ') ">
											<span style="color:red; font-style:italic;" id="enumber"></span>									
									</div>
									</div>
									<div class="col-xl-6">
										<div class="form-label-group">
											<label for="number">Card Type</label>
											<div style="position: relative; border:1px solid silver; height:50px;padding-top:5px;padding-left:10px;border-radius:3px">
												<span id="cardtype" ></span>
											</div>
											 <input type="hidden" name="card_type"  onkeyup="validcard()" id="cType" />
										  <span id="cctype" style="color:red;font-style:italic;"></span>
									  </div>	
										</div>
									</div>
									

//date
$ndate=date_create($start);
$newstart=date_format($ndate,"Y-m");

<div class="row">
									<div class="col-xl-12">
										<div class="form-label-group">
											<label for="exp">Expired Month/ Year</label>
											<input type="month" name="exp" min="<?php echo $newstart; ?>" value="<?php echo date('Y-m');?>" class="form-control" required>

										</div>
									</div>
								</div>
								
								
								
								
//in php date

		$year = date('Y', strtotime($_POST["exp"]));
		$month = date('m', strtotime($_POST["exp"]));