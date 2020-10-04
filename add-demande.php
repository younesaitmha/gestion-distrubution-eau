
<?php include('header.php') ?>
<?php include('db_connect.php');?>
<script>
    var patients = document.getElementById('patients');
    patients.classList.add("active");

</script>
<?php

    $sql1= 'SELECT * FROM `assurance` where IDassurance > 0 ';
    $result1 = mysqli_query($connect, $sql1);

    $sql2= 'SELECT * FROM `mutuelle` where IDmutuelle > 0 ';
    $result2 = mysqli_query($connect, $sql2);






?>
<style>
    .form-horizontal * {
    direction: rtl;
    clear: both;
    }
    label,h5{
        float:right;
    }
    
</style>


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
                                        <label >الاسم <span class="text-danger">*</span></label>
                                        <input id="prenom" name="prenom" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>النسب <span class="text-danger">*</span> </label>
                                        <input id="nom" name="nom" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                                <label>الجنس <span class="text-danger">*</span></label>
												<select id="sexe" name="sexe" class="form-control ">
													<option>ذكر</option>
													<option>انثى</option>
												</select>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label> رقم البطاقة الوطنية <span class="text-danger">*</span> </label>
                                        <input  style="direction: ltr;" id="nom" name="nom" class="form-control" type="text">
                                    </div>
                                </div>
                            </div>
                            <!--end row-->
                            <!--start row-->
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label >العنوان </label>
                                        <input id="prenom" name="prenom" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                                <label>منطفة السكن </label>
												<select id="sexe" name="sexe" class="form-control ">
													<option>01-أدوز</option>
													<option>02-البام</option>
												</select>
                                    </div>
                                </div>
                                
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label> رقم الهاتف </label>
                                        <input style="direction: ltr;" id="nom" name="tele" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label> البريد الالكتروني </label>
                                        <input style="direction: ltr;" id="nom" name="nom" class="form-control" type="email">
                                    </div>
                                </div>
                            </div>
                            <!--end row-->
                            <!--start row-->
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                                <label>نوع الملك</label>
												<select id="sexe" name="sexe" class="form-control ">
													<option>مالك</option>
													<option>مكتري</option>
												</select>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>تاريخ تقديم الطلب</span></label>
                                            <div sty class="cal-icon">
                                                <input style="direction: ltr;" id="date_n" name="date_n"  type="text" class="form-control datetimepicker">
                                            </div>
                                        </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>  رسوم تقديم الطلب (درهم) </label>
                                        <input style="direction: ltr;" value='150' id="nom" name="nom" class="form-control" type="email">
                                    </div>
                                </div>
                            </div>
                            <!--end row-->
                            <h5 style="color: #009EFB;" >المرفقات</h5>
                            <!--start row-->
                            <div class="row">
                                <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>البطافة الوطنية</label>
                                            <div class="profile-upload">
                                                <div class="upload-input">
                                                    <input type="file" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                <div class="col-sm-4">
                                        <div class="form-group">
                                            <label> الملكية او موافقة المالك </label>
                                            <div class="profile-upload">
                                                <div class="upload-input">
                                                    <input type="file" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                <div class="col-sm-4">
                                        <div class="form-group">
                                            <label> التصميم </label>
                                            <div class="profile-upload">
                                                <div class="upload-input">
                                                    <input type="file" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                            <!--end row-->
                       
                           
                            
                        
                        
                    </div>
                </div>
                <br>
                <div class=" text-center">
                                <button class="btn btn-primary submit-btn">اضافة طلب</button>
                            </div>
                            </form>
			
        </div>

    <?php include('footer.php') ?>
    <script>
        $(document).ready(function() {
    $('.js-example-basic-single').select2();
        });
    </script>