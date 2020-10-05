
<?php include('header.php') ?>
<?php include('db_connect.php');?>
<script>
    var visit = document.getElementById('visit');
    visit.classList.add("active");

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
                                        <label class="d-flex justify-content-center" > رقم طلب الاشتراك </label>
                                        <select  class="js-example-basic-single form-control " name="state">
                                             <option selected disabled value="0">رقم طلب الاشتراك</option>
                                            <option value="AL">01/2020</option>
                                            <option value="WY">02/2020</option>
                                            <option value="WY">03/2020</option>
                                        </select>

                                    </div>
                                </div>
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
                                    <div  class="form-group">
                                                <label>نوع الملك</label>
												<select onchange="owner()" id="type_owner" name="" class="form-control ">
													<option value="yes" >مالك</option>
													<option value="non">مكتري</option>
												</select>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>تاريخ المعاينة</span></label>
                                            <div sty class="cal-icon">
                                                <input style="direction: ltr;" id="date_n" name="date_n"  type="text" class="form-control datetimepicker">
                                            </div>
                                        </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>  رسوم المعاينة (درهم) </label>
                                        <input style="direction: ltr;" value='150' id="nom" name="nom" class="form-control" type="email">
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