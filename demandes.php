<?php include('header.php')?>
<?php include('db_connect.php');?>
<script>
    var patients = document.getElementById('patients');
    patients.classList.add("active");
<?php 

		$sql1 = "SELECT * ,DATE_FORMAT(date_v, '%d/%m/%Y') as date_v FROM patient where 1=1 " ;
		

		$Nom=$_POST['Nom'];
		$Prenom=$_POST['Prenom'];
		$CIN=$_POST['CIN'];
		$Tele=$_POST['Tele'];
		$Email=$_POST['Email'];
		$Ville=$_POST['Ville'];
		
		$sql1.= ' and nom LIKE "%'.$Nom.'%" ' ;
		$sql1.= ' and Prenom LIKE "%'.$Prenom.'%" ' ;
		$sql1.= ' and CIN LIKE "%'.$CIN.'%" ' ;
		$sql1.= ' and Tele LIKE "%'.$Tele.'%" ' ;
		$sql1.= ' and Email LIKE "%'.$Email.'%" ' ;
		$sql1.= ' and Ville LIKE "%'.$Ville.'%" ' ;

		

		$sql1.=' ORDER BY idPatient DESC ';
		$result1 = mysqli_query($connect, $sql1);
		






?>
</script>
<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-sm-2 col-3">
			<a href="add-demande.php" class="btn btn-primary float-right btn-rounded"><i class="fa fa-plus"></i> اضافة طلب </a>
            </div>
            <div class="col-sm-10 col-9 text-right m-b-20">
				<h4 class="page-title">طلبات الاشتراك</h4>
                
            </div>
        </div>
        <div class="row filter-row">

			<div class="col-sm-4 col-md-4">
			<br>
                <strong style="padding: 5px;" class="chart-title">recherche avec date de visite</strong>
            </div>

		
            <div class="col-sm-4 col-md-2">
						<div class="form-group form-focus">
                            <label class="focus-label">de</label>
                            <div class="cal-icon">
                                <input class="form-control floating datetimepicker" type="text">
                            </div>
                        </div>
            </div>
            <div class="col-sm-4 col-md-2">
						<div class="form-group form-focus">
                            <label class="focus-label">à</label>
                            <div class="cal-icon">
                                <input class="form-control floating datetimepicker" type="text">
                            </div>
                        </div>
            </div>
            
        </div>
        <div class="row">
            <div class="col-md-12">
			<div class="table-responsive">
				
							<table id="yourTable" class="table table-border table-striped custom-table  mb-0">
								<thead>
									
									<tr>
										<th >Nom</th>
										<th>Prenom</th>
										<th>CIN</th>
										<th>Tele</th>
										<th>Email</th>
										<th>Ville</th>
										<th class="text-right">Action</th>
                                    </tr>
                                    
								</thead>
								<tbody>
									<div class="row">
										<form action="Patients.php" method="POST" autocomplete="off">
													<td>
														<input autocomplete="new-password"  value="<?php echo $Nom ?>" name="Nom" placeholder="Nom" type="text" class="form-control" >
													</td>
													<td>
														<input value="<?php echo $Prenom ?>" name="Prenom" placeholder="Prenom" type="text" class="form-control" >
													</td>
													<td>
														<input value="<?php echo $CIN ?>" name="CIN" placeholder="CIN" type="text" class="form-control" >
													</td>
													<td>
														<input value="<?php echo $Tele ?>" name="Tele" placeholder="Tele" type="text" class="form-control" >
													</td>
													<td>
														<input value="<?php echo $Email ?>" name="Email" placeholder="Email" type="text" class="form-control" >
													</td>
													<td>
														<input value="<?php echo $Ville ?>" name="Ville" placeholder="Ville" type="text" class="form-control" >
													</td>
													<td>
													<input class="btn btn-success btn-block" type="submit" value="Rechecher"  />
														
													</td>
												</form>
										</div>
											
										</tr>
									<?php while($row1=mysqli_fetch_array($result1)) {?>
											<tr clicable >
											<td  data-href="http://www.google.co.ma" >
												<a style="color:black;" href="#"><img width="28" height="28" src="assets/img/user.jpg" class="rounded-circle" alt=""> <h2 style='text-align: center;'><?php echo $row1['nom'] ?></h2></a>
											</td>
											<td style='text-align: center;'  data-href="http://www.google.co.ma" ><?php echo $row1['prenom'] ?></td>
											<td style='text-align: center;' data-href="http://www.google.co.ma" ><?php echo $row1['CIN'] ?></td>
											<td style='text-align: center;' data-href="http://www.google.co.ma" ><?php echo $row1['tele'] ?></td>
											<td style='text-align: center;' data-href="http://www.google.co.ma" ><?php echo $row1['email'] ?></td>
											<td style='text-align: center;' data-href="http://www.google.co.ma" ><?php echo $row1['ville'] ?></td>
											<td  class="text-right">
												<div class="dropdown dropdown-action">
													<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
													<div class="dropdown-menu dropdown-menu-right">
														<a class="dropdown-item" href="edit-employee.html"><i class="fa fa-pencil m-r-5"></i>Modifier</a>
														<a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_employee"><i class="fa fa-trash-o m-r-5"></i>Supprimer</a>
													</div>
												</div>
											</td>
										</tr>
									<?php }?>
									
								</tbody>
							</table>
						</div>
						
            </div>
        </div>
    </div>
</div>
		<div id="delete_patient" class="modal fade delete-modal" role="dialog">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-body text-center">
						<img src="assets/img/sent.png" alt="" width="50" height="46">
						<h3>Are you sure want to delete this Patient?</h3>
						<div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
							<button type="submit" class="btn btn-danger">Delete</button>
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</div>
	<script>
		var $tr = $('#yourTable tr.no-sort'); //get the reference of row with the class no-sort
var mySpecialRow = $tr.prop('outerHTML'); //get html code of tr
$tr.remove(); //remove row of table

$('#yourTable').dataTable({
    "fnDrawCallback": function(){
        //add the row with 'prepend' method: in the first children of TBODY
        $('#yourTable tbody').prepend(mySpecialRow);

    }                   
});
	</script>
	
	
<?php include('footer.php') ?>
	