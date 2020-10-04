<?php include('header.php') ?>
<?php include('db_connect.php');?>
<style>
.form-horizontal * {
    direction: rtl;
    clear: both;
    }
    label,h5{
        float:right;
    }
</style>
<script>
    var patients = document.getElementById('patients');
    patients.classList.add("active");
</script>

<div  class="page-wrapper">
            <div class="container" style="padding: 20px;">
                

                                        
                
                <div class="row">
                    <div class="col-sm-12">
                    <h5 style="color: #009EFB;" >المعلومات الشخصية</h5>
                        <form  class="form-horizontal" action="insert-patient.php" method="POST"  >
                            <!--start row-->
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label> اسم و نسب المعني بالأمر </label>
                                        <input id="nom" name="nom" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label> رقم البطاقة الوطنية للمعني بالأمر </label>
                                        <input  style="direction: ltr;" id="nom" name="nom" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label > اسم و نسب تقني المعاينة </label>
                                        <input id="prenom" name="prenom" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                        <div class="form-group">
                                            <label> تاريخ المعاينة </span></label>
                                            <div sty class="cal-icon">
                                                <input style="direction: ltr;" id="date_n" name="date_n"  type="text" class="form-control datetimepicker">
                                            </div>
                                        </div>
                                </div>
                               
                            </div>
                            <!--end row-->
                            <!--start row-->
                            <div class="row">
                                <div class="col-sm-12">
                                        <div class="form-group">
                                            <label> تقرير المعاينة </span></label>
                                            <br>
                                            <textarea class="form-control" name="" id="" cols="30" rows="10"></textarea>
                                        </div>
                                </div>

                            </div>
                            <!--end row-->
                            <!--start row-->
                            <div class="row">
                                <div class="col-sm-4">
                                        <label> نتيجة المعاينة <span class="text-danger">*</span></label>
											<select id="sexe" name="sexe" class="form-control ">
												<option>مقبول </option>
												<option>مرفوض</option>
											</select>
                                </div>

                            </div>
                            <!--end row-->
                            
                       
                           
                            
                        
                        
                    </div>
                </div>
                <br>
                <div class=" text-center">
                                <button class="btn btn-primary submit-btn">تأكيد التقرير </button>
                            </div>
                            </form>
			
        </div>
<?php include('footer.php') ?>