<!DOCTYPE html>
<html lang="en">


<!-- add-patient24:06-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>Preclinic - Medical & Hospital - Bootstrap 4 Admin Template</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="assets/select2/select2.min">
    <!--[if lt IE 9]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>
<?php include('header.php') ?>
<script>
    var factures = document.getElementById('factures');
    factures.classList.add("active");
    

</script>



        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                
                    <div class="col-lg-8 offset-lg-2">
                        <h4 class="page-title">Ajouter une facture</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form>
                            <div class="row">
                                <div class="col-sm-2">
                                        <div class="form-group">
                                            <label class="d-flex justify-content-center" >FACTURE N°<span class="text-danger">*</span></label>
                                            <input value="1/2020" class="form-control text-center" type="text">
                                        </div>
                                </div>
                                

                            </div>
                            <div class="row">
                                 <div class="col-sm-2">
                                    <div class="form-group">
                                        <label class="d-flex justify-content-center" >A <span class="text-danger">*</span></label>
                                        <select class="selectpicker form-control" data-show-subtext="true" data-live-search="true">
                                            <option data-subtext="M.">M.</option>
                                            <option data-subtext="Mr">Mr</option>
                                            <option data-subtext="Mme">Mme</option>
                                            <option data-subtext="Mlle">Mlle</option>
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label class="d-flex justify-content-center" >Nom <span class="text-danger">*</span></label>
                                        <select class="js-example-basic-single form-control " name="state">
                                        <option value="0" selected disabled>choisissez un patient</option>
                                            <option value="AL">Ahmed Ahmed</option>
                                            <option value="WY">Carl jhon</option>
                                            <option value="WY">Hajib jhon</option>
                                        </select>

                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label class="d-flex justify-content-center" >lieu<span class="text-danger">*</span></label>
                                        <input value="Beni Mellal" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                     <div class="form-group">
                                        <label class="d-flex justify-content-center" >Date <span class="text-danger">*</span></label>
                                        <div class="cal-icon">
                                            <input type="text" class="form-control datetimepicker">
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                          <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="d-flex justify-content-center" >Dents<span class="text-danger">*</span></label>
                                            <input value="" class="form-control" type="text">
                                        </div>
                                     </div>
                                     <div class="col-sm-8">
                                        <div class="form-group">
                                            <label class="d-flex justify-content-center" >Actes<span class="text-danger">*</span></label>
                                            <textarea name="" class="form-control" id="" cols="30" rows="5"></textarea>
                                        </div>
                                     </div>
                                     <div class="col-sm-3">
                                        <div class="form-group">
                                            <label class="d-flex justify-content-center" >Coef<span class="text-danger">*</span></label>
                                            <input value="" class="form-control" type="text">
                                        </div>
                                     </div>
                                     <div class="col-sm-3">
                                        <div class="form-group">
                                            <label class="d-flex justify-content-center" >montant<span class="text-danger">*</span></label>
                                            <input value="" class="form-control" type="text">
                                        </div>
                                     </div>
                                     <div class="col-sm-3">
                                        <div class="form-group">
                                            <label class="d-flex justify-content-center" >payé<span class="text-danger">*</span></label>
                                            <input value="" class="form-control" type="text">
                                        </div>
                                     </div>
                                     <div class="col-sm-3">
                                        <div class="form-group">
                                            <label class="d-flex justify-content-center" >reste<span class="text-danger">*</span></label>
                                            <input value="" class="form-control" type="text">
                                        </div>
                                     </div>

                            </div>
                            
                           
                            <div class="m-t-20 text-center">
                                <button class="btn btn-primary submit-btn">Créer une facture</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
			
        </div>
    </div>
    <?php include('footer.php') ?>
    <script>
        $(document).ready(function() {
    $('.js-example-basic-single').select2();
        });
    </script>


