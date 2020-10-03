<?php include('header.php')?>
<?php include('db_connect.php');?>
<script>
    var patients = document.getElementById('patients');
    patients.classList.add("active");
<?php 

		$sql1 = "SELECT * FROM patient where 1=1 " ;
		

		$Nom=$_POST['Nom'];
		$Prenom=$_POST['Prenom'];
		$CIN=$_POST['CIN'];
		$Tele=$_POST['Tele'];
		$Email=$_POST['Email'];
		$Ville=$_POST['Ville'];
		
		if($Nom!='')
		$sql1.= ' and nom LIKE "%'.$Nom.'%" ' ;
		if($Prenom!='')
		$sql1.= ' and Prenom LIKE "%'.$Prenom.'%" ' ;
		if($CIN!='')
		$sql1.= ' and CIN LIKE "%'.$CIN.'%" ' ;
		if($Tele!='')
		$sql1.= ' and Tele LIKE "%'.$Tele.'%" ' ;
		if($Email!='')
		$sql1.= ' and Email LIKE "%'.$Email.'%" ' ;
		if($Ville!='')
		$sql1.= ' and Ville LIKE "%'.$Ville.'%" ' ;

		

		$sql1.=" ORDER BY 'idPatient' DESC ";
		$result1 = mysqli_query($connect, $sql1);
		






?>
</script>
<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-sm-4 col-3">
                <h4 class="page-title">Patients</h4>
            </div>
            <div class="col-sm-8 col-9 text-right m-b-20">
                <a href="add-patient.php" class="btn btn-primary float-right btn-rounded"><i class="fa fa-plus"></i> Ajouter Patient</a>
            </div>
        </div>
     <!--   <div class="row filter-row">

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
            
        </div>-->
        <div class="row">
            <div class="col-md-12">
				<div class="table-responsive">
				<form action="patients.php" method="POST" autocomplete="off">
							<table class="table table-border table-striped" id="example">
								<thead>
								<tr>
												
													<td>
														<input value="<?php echo $Prenom ?>" name="Prenom" placeholder="Prenom" type="text" class="form-control" >
													</td>
													<td>
														<input value="<?php echo $Nom ?>" name="Nom" placeholder="Nom" type="text" class="form-control" >
														
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
													<input class="btn btn-success btn-block"  type="submit" value="Rechecher"  />
													<button class="btn btn-warning btn-block" onclick="window.location.href='patients.php'" type="button">Rafraîchir</button>
													</td>
													
												
										</tr>
									<tr>
										<th style='text-align: center;' >Prenom</th>
										<th style='text-align: center;'>Nom</th>
										<th style='text-align: center;'>CIN</th>
										<th style='text-align: center;'>Tele</th>
										<th style='text-align: center;'>Email</th>
										<th style='text-align: center;'>Ville</th>
										<th style='text-align: center;' class="text-right">Action</th>
									</tr>
									
								</thead>
								<tbody>
										
											
											<?php while($row1=mysqli_fetch_array($result1)) {?>
												
													<tr clicable >
													<td  data-href="patient_info.php?id=<?php echo $row1['idPatient'] ?>" >
														<a style="color:black;" href="#"><img width="28" height="28" src="assets/img/user.jpg" class="rounded-circle" alt=""> <h2 style='text-align: center;'><?php echo $row1['prenom'] ?></h2></a>
													</td>
													<td style='text-align: center;' data-href="patient_info.php?id=<?php echo $row1['idPatient'] ?>"><?php echo $row1['nom'] ?></td>
													<td style='text-align: center;' data-href="patient_info.php?id=<?php echo $row1['idPatient'] ?>"><?php echo $row1['CIN'] ?></td>
													<td style='text-align: center;' data-href="patient_info.php?id=<?php echo $row1['idPatient'] ?>" ><?php echo $row1['tele'] ?></td>
													<td style='text-align: center;' data-href="patient_info.php?id=<?php echo $row1['idPatient'] ?>"><?php echo $row1['email'] ?></td>
													<td style='text-align: center;' data-href="patient_info.php?id=<?php echo $row1['idPatient'] ?>"><?php echo $row1['ville'] ?></td>
													<td  class="text-right">
														<div class="dropdown dropdown-action">
															<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
															<div class="dropdown-menu dropdown-menu-right">
																<a class="dropdown-item" href="patient_info.php?id=<?php echo $row1['idPatient'] ?>"><i class="fa fa-pencil m-r-5"></i>Modifier</a>
																<a class="dropdown-item" type="button" onclick="conf_supp(<?php echo $row1['idPatient']?>)" href="" data-toggle="modal" data-target="#delete_employee"><i class="fa fa-trash-o m-r-5"></i>Supprimer</a>
																
															</div>
														</div>
													</td>
												</tr>
												
									<?php }?>
								</tbody>
							</table>
							</form>
								
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

	
	
	<script src="https://code.jquery.com/jquery-3.5.1.js" ></script>
	<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js" ></script>
<script>
   $(document).ready(function() {
$('#example').dataTable({
    
	"bLengthChange": false,
	"searching": false,
	"language": {
            "lengthMenu": "Display _MENU_ records per page",
            "zeroRecords": "Rien trouvé - désolé",
            "info": "Affichage de page _PAGE_ sur _PAGES_",
			"infoEmpty": "Aucun enregistrement disponible",
			"next": "Suivant",
			"infoFiltered": "(filtered from _MAX_ total records)",
			"paginate": {
			  "previous": "Précédent",
			  "next":"Suivant",
    }
		},
		"paginate": {
        "first":      "Premier",
        "last":       "Dernier",
        "next":       "Suivant",
        "previous":   "Précédent"
    }
	
   
   
   });
});
</script>
<?php include('footer.php') ?>
	