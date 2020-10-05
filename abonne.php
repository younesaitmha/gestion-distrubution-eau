<?php include('header.php')?>
<?php include('db_connect.php');?>
<script>
    var abonne = document.getElementById('abonne');
    abonne.classList.add("active");
    </script>
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

<style>
	
    .form-horizontal * {
    direction: rtl;
    clear: both;
    }
    .dem-table{
		float:right;
		direction: rtl;
    }
    
</style>
<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-sm-2 col-3">
			<a href="add-abonn.php" class="btn btn-primary float-right btn-rounded"><i class="fa fa-plus"></i> اضافة مشترك </a>
            </div>
            <div class="col-sm-10 col-9 text-right m-b-20">
				<h4 class="page-title"> المشتركين</h4>
                
            </div>
        </div>
        <div class="row dem-table ">

			<div  class="col-sm-4 col-md-4 dem-table ">
			
				<strong style="padding: 5px;" class="chart-title">البحث عن طريق تاريخ طلب الاشتراك</strong>
            </div>

		
            <div class="col-sm-4 col-md-2">
						<div class="form-group form-focus">
                            <label class="focus-label">من</label>
                            <div class="">
                                <input class="form-control floating datetimepicker" type="text">
                            </div>
                        </div>
            </div>
            <div class="col-sm-4 col-md-2">
						<div class="form-group form-focus">
                            <label class="focus-label">الى</label>
                            <div >
                                <input class="form-control floating datetimepicker" type="text">
                            </div>
                        </div>
            </div>
            
        </div>
        <div class="dem-table">
			<form action="patients.php" method="POST" autocomplete="off">
							<table class="table table-border table-striped" id="example">
								<thead>
								<tr>
												
													<td>
														<input value="<?php echo $Prenom ?>" name="Prenom" placeholder="الاسم" type="text" class="form-control" >
													</td>
													<td>
														<input value="<?php echo $Nom ?>" name="Nom" placeholder="النسب" type="text" class="form-control" >
														
													</td>
													<td>
														<input value="<?php echo $CIN ?>" name="CIN" placeholder="رقم البطاقة الوطنية" type="text" class="form-control" >
													</td>
													<td>
														<input value="<?php echo $Tele ?>" name="Tele" placeholder="رقم الهاتف" type="text" class="form-control" >
													</td>
													<td>
														<input value="<?php echo $Email ?>" name="Email" placeholder="منطقة السكن" type="text" class="form-control" >
													</td>
													<td></td>
													<td>
													<input class="btn btn-success btn-block"  type="submit" value="بحث"  />
													<button class="btn btn-warning btn-block" onclick="window.location.href='patients.php'" type="button">الغاء</button>
													</td>
													
												
										</tr>
									<tr>
										<th lang="es" style='text-align: center;' >الاسم</th>
										<th style='text-align: center;'>النسب</th>
										<th style='text-align: center;'>رقم  ب.و</th>
										<th style='text-align: center;'>الهاتف</th>
										<th style='text-align: center;'> تاريخ تقديم الطلب </th>
										<th style='text-align: center;'>المنطقة</th>
										<th style='text-align: center;' class="text-right">اجراء</th>
									</tr>
									
								</thead>
								<tbody>
										
											
											<?php while($row1=mysqli_fetch_array($result1)) {?>
												
													<tr clicable >
													<td style='text-align: center;' data-href="edit-abonn.php?id=<?php echo $row1['idPatient'] ?>"><?php echo $row1['prenom'] ?></td>
													<td style='text-align: center;' data-href="edit-abonn.php?id=<?php echo $row1['idPatient'] ?>"><?php echo $row1['nom'] ?></td>
													<td style='text-align: center;' data-href="edit-abonn.php?id=<?php echo $row1['idPatient'] ?>"><?php echo $row1['CIN'] ?></td>
													<td style='text-align: center; direction: ltr;' data-href="edit-abonn.php?id=<?php echo $row1['idPatient'] ?>" ><?php echo $row1['tele'] ?></td>
													<td style='text-align: center;' data-href="edit-abonn.php?id=<?php echo $row1['idPatient'] ?>"><?php echo $row1['email'] ?></td>
													<td style='text-align: center;' data-href="edit-abonn.php?id=<?php echo $row1['idPatient'] ?>"><?php echo $row1['ville'] ?></td>
													<td  class="text-right">
														<div class="dropdown dropdown-action">
															<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
															<div class="dropdown-menu dropdown-menu-right">
																<a class="dropdown-item" href="devis.php?id=<?php echo $row1['idPatient'] ?>"><i class="fa fa-print m-r-5"></i> انشاء تسعيرة </a>
																<a class="dropdown-item" href="edit-abonn.php?id=<?php echo $row1['idPatient'] ?>"><i class="fa fa-pencil m-r-5"></i> تعديل المشترك </a>
																<a class="dropdown-item" type="button" onclick="conf_supp(<?php echo $row1['idPatient']?>)" href="" data-toggle="modal" data-target="#delete_employee"><i class="fa fa-trash-o m-r-5"></i> حذف المشترك </a>
																<a class="dropdown-item" href="edit-abonn.php?id=<?php echo $row1['idPatient'] ?>"><i class="fa fa-circle m-r-5"></i>  اعادة الربط </a>
																
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
		
	<script src="assets/datatable/jquery-3.5.1.js" ></script>
	<script src="assets/datatable/jquery.dataTables.min.js" ></script>


<script>
   $(document).ready(function() {
	$('#example').dataTable({
    
	"bLengthChange": false,
	"searching": false,
	"language": {
            "lengthMenu": "Display _MENU_ records per page",
            "zeroRecords": "لا توجد بيانات ",
            "info": "الصفحة _PAGE_ من _PAGES_",
			"infoEmpty": "لا توجد بيانات",
			"next": "التالي",
			"infoFiltered": "(filtered from _MAX_ total records)",
			"paginate": {
			  "previous": "السابق",
			  "next":"التالي",
    }
		},
		"paginate": {
        "first":      "الأول",
        "last":       "الاخير",
        "next":       "التالي",
        "previous":   "السابق"
    }
	
   
   
   });
});
</script>
	
<?php include('footer.php') ?>
	