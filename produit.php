<?php include('header.php')?>
<?php include('db_connect.php');?>
<script>
    var produit = document.getElementById('produit');
    produit.classList.add("active");
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
			<a href="add-produit.php" class="btn btn-primary float-right btn-rounded"><i class="fa fa-plus"></i> اضافة منتج </a>
            </div>
            <div class="col-sm-10 col-9 text-right m-b-20">
				<h4 class="page-title"> المنتجات</h4>
                
            </div>
        </div>
        
        <div class="dem-table">
			<form action="patients.php" method="POST" autocomplete="off">
							<table class="table table-border table-striped" id="example">
								<thead>
								<tr>
												
													<td>
														<input value="<?php echo $Prenom ?>" name="Prenom" placeholder="اسم المنتج" type="text" class="form-control" >
													</td>
													<td>
														<input value="<?php echo $Nom ?>" name="Nom" placeholder="رقم التعريفي" type="text" class="form-control" >
														
													</td>
													<td>
														<input value="<?php echo $CIN ?>" name="CIN" placeholder="الكمية" type="text" class="form-control" >
													</td>
													<td>
														<input value="<?php echo $Tele ?>" name="Tele" placeholder="ثمن الوحدة" type="text" class="form-control" >
													</td>
													
													
													<td>
													<input class="btn btn-success btn-block"  type="submit" value="بحث"  />
													<button class="btn btn-warning btn-block" onclick="window.location.href='patients.php'" type="button">الغاء</button>
													</td>
													
												
										</tr>
									<tr>
										<th lang="es" style='text-align: center;' >اسم المنتج</th>
										<th style='text-align: center;'>رقم التعريفي</th>
										<th style='text-align: center;'>الكمية</th>
										<th style='text-align: center;'>ثمن الوحدة</th>
										<th style='text-align: center;' class="text-right">اجراء</th>
									</tr>
									
								</thead>
								<tbody>
										
											
											
												
													<tr clicable >
													<td style='text-align: center;' data-href="patient_info.php?id=<?php echo $row1['idPatient'] ?>">أنبوب</td>
													<td style='text-align: center;' data-href="patient_info.php?id=<?php echo $row1['idPatient'] ?>">DE45457</td>
													<td style='text-align: center;' data-href="patient_info.php?id=<?php echo $row1['idPatient'] ?>">50</td>
													<td style='text-align: center; direction: ltr;' data-href="patient_info.php?id=<?php echo $row1['idPatient'] ?>" >20</td>
													
													<td  class="text-right">
														<div class="dropdown dropdown-action">
															<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
															<div class="dropdown-menu dropdown-menu-right">
																<a class="dropdown-item" href="patient_info.php?id=<?php echo $row1['idPatient'] ?>"><i class="fa fa-pencil m-r-5"></i> تعديل المنتج </a>
																<a class="dropdown-item" type="button" onclick="conf_supp(<?php echo $row1['idPatient']?>)" href="" data-toggle="modal" data-target="#delete_employee"><i class="fa fa-trash-o m-r-5"></i> حذف المنتج </a>
																
															</div>
														</div>
													</td>
												</tr>
												
									
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
	