
<?php include('header.php') ?>
<?php include('db_connect.php');?>
<script>
    var abonne = document.getElementById('abonne');
    abonne.classList.add("active");

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
                    <h5 style="color: #009EFB;" ></h5>
                        <form  class="form-horizontal" action="insert-patient.php" method="POST"  >
                            <?php for($i=0;$i<6;$i++){?>
                                <!--start row-->
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label class="d-flex justify-content-center" >المنتج </label>
                                        <select  class="js-example-basic-single form-control " name="state">
                                            <option value="AL">أنبوب</option>
                                            <option value="WY">لللللل</option>
                                        </select>

                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>الكمية </label>
                                        <input style="direction: ltr;" id="nom" name="nom" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label> الثمن </label>
                                        <input  style="direction: ltr;" id="nom" name="nom" class="form-control" type="text">
                                    </div>
                                </div>
                            </div>
                            <!--end row-->
                            <?php }?>
                       
                           
                            
                        
                        
                    </div>
                </div>
                <br>
                            <div class=" text-center">
                                <button class="btn btn-primary submit-btn">اضافة تسعيرة</button>
                            </div>
                        </form>
			
        </div>

    <?php include('footer.php') ?>
    <script>
        $(document).ready(function() {
    $('.js-example-basic-single').select2();
    $('select').select2({
        dir: "rtl"
     })
        });
    </script>