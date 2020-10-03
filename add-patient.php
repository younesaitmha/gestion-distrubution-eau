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
    <!--[if lt IE 9]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
    <![endif]-->
    <!-- sweetAleert -->
    <link rel="stylesheet" type="text/css" href="assets/sweetAlert/dist/sweetalert2.min.css">
     <!-- sweetAleert -->

</head>

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
    
    
</style>


        <div  class="page-wrapper">
            <div class="container" style="padding: 20px;">
                

                                        
                
                <div class="row">
                    <div class="col-sm-12">
                    <h5 style="color: #009EFB;" >Information personnelle</h5>
                        <form action="insert-patient.php" method="POST"  >
                            <!--start row-->
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Prénom <span class="text-danger">*</span></label>
                                        <input id="prenom" name="prenom" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Nom <span class="text-danger">*</span> </label>
                                        <input id="nom" name="nom" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                                <label>sexe <span class="text-danger">*</span></label>
												<select id="sexe" name="sexe" class="form-control select">
													<option>Homme</option>
													<option>Femme</option>
												</select>
                                    </div>
                                </div>
                            </div>
                            <!--end row-->
                            <!--start row-->
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>CIN  </label>
                                        <input id="cin" name="cin"  class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Date de naissance</span></label>
                                        <div class="cal-icon">
                                            <input id="date_n" name="date_n"  type="text" class="form-control datetimepicker">
                                        </div>
                                    </div>
                                </div>
                                
								<div class="col-sm-4">
                                    <div class="form-group">
                                                <label>Etat civil </span></label>
												<select id="Etat" name="Etat" class="form-control ">
                                                    <option value="single">Célibataire</option>
                                                    <option value="married">Marié</option>
                                                    <option value="widowed">Veuf</option>
                                                    <option value="divorced">Divorcé</option>
                                                    <option value="other">Autre</option>
												</select>
                                    </div>
                                </div>
                            </div>
                            <!--end row-->
                            <!--start row-->
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                                <label>Diabétique </span></label>
												<select id="isdiabetique" name="isdiabetique" class="form-control">
                                                    <option value="non">Non</option>
                                                    <option value="oui">Oui</option>
												</select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                                <label>Groupe sanguin  </span></label>
												<select id="group_s" name="group_s" class="form-control">
                                                    <option value="0" selected="selected" >Aucun</option>
                                                    <option value="O-">O-</option>
                                                    <option value="O+">O+</option>
                                                    <option value="A-">A-</option>
                                                    <option value="A+">A+</option>
                                                    <option value="B-">B-</option>
                                                    <option value="B+">B+</option>
                                                    <option value="AB-">AB-</option>
                                                    <option value="AB+">AB+</option>
												</select>
                                    </div>
                                </div>
                            </div>
                            <!--end row-->
                            <h5 style="color: #009EFB;" >Assurance </h5>
                            <!--start row-->
                            <div class="row">
                                        <div class="col-sm-4">
                                                <div class="form-group">
                                                        <label>Assuré</span></label>
                                                        <select onchange="switchASS()" id="AssureCH" name="AssureCH" class="form-control ">
                                                            <option  value="nom">Non</option>
                                                            <option selected value="oui">Oui</option>
                                                        </select>
                                                </div>
                                        </div>
                                        <div class="col-sm-4">
                                                <div id="divAss" class="form-group">
                                                    <label class="" >Assurance </label>
                                                        <select class="js-example-basic-single form-control select " name='IDassurance'>
                                                        <option value="0"  selected disabled > choisissez une assurance </option>    
                                                        <?php while($row1= mysqli_fetch_array($result1)):;?>
                                                            <option value="<?php echo $row1['IDassurance'];?>"> <?php echo $row1['Nomassurance'];?>  </option>
                                                            <?php endwhile;?>
                                                        </select>
                                                </div>
                                        </div>
                                        <div class="col-sm-4">
                                                 <div id="divNASS" class="form-group">
                                                        <label>N°affiliation  </label>
                                                        <input id="N_aff_Ass" name="N_aff_Ass"  class="form-control" type="text">
                                                </div>
                                        </div>
                            </div>
                            <!--end row-->
                            <h5 style="color: #009EFB;" >Muutuelle</h5>
                            <!--start row-->
                            <div class="row">
                                        <div class="col-sm-4">
                                                <div class="form-group">
                                                        <label>Dispose d’une mutuelle </span></label>
                                                        <select id="MuttCH" onchange="switchMUt()" name="MuttCH" class="form-control">
                                                            <option value="nom">Non</option>
                                                            <option selected value="oui">Oui</option>
                                                        </select>
                                                </div>
                                        </div>
                                        <div class="col-sm-4">
                                                <div id="divMutt" class="form-group">
                                                    <label class="" >Mutuelle </label>
                                                        <select name="IDmutuelle" class="js-example-basic-single form-control " name="state">
                                                            <option value="0" selected disabled > choisissez une Mutuelle </option>    
                                                            <?php while($row2= mysqli_fetch_array($result2)):;?>
                                                            <option value="<?php echo $row2['IDmutuelle'];?>"> <?php echo $row2['NOMmutuelle'];?>  </option>
                                                            <?php endwhile;?>
                                                        </select>
                                                </div>
                                        </div>
                                        <div class="col-sm-4">
                                                 <div id="divNMutt" class="form-group">
                                                        <label>N°affiliation </label>
                                                        <input id="N_aff_Mutt" name="N_aff_Mutt"  class="form-control" type="text">
                                                </div>
                                        </div>
                            </div>
                            <!--end row-->
                            <h5 style="color: #009EFB;" >Informations du contact</h5>
                            <!--start row-->
                            <div class="row">
                                        <div class="col-sm-4">
                                                <div class="form-group">
                                                        <label>Adresse  </label>
                                                        <input id="Adresse" name="Adresse"  class="form-control" type="text">
                                                </div>
                                        </div>
                                        <div class="col-sm-4">
                                                <div class="form-group">
                                                        <label>Ville </label>
                                                        <input id="ville" name="ville"  class="form-control" type="text">
                                                </div>
										</div>
										    <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="" >Pays </label>
                                                        <select id="pays" name="pays" class="js-example-basic-single form-control " name="pays">
                                                            <option value="AL">Maroc</option>
                                                        </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                                <div class="form-group">
                                                        <label>Téléphone </label>
                                                        <input id="tele" name="tele"  class="form-control" type="text">
                                                </div>
                                        </div>
                                        <div class="col-sm-4">
                                                <div class="form-group">
                                                        <label>Email  </label>
                                                        <input id="email" name="email"  class="form-control" type="text">
                                                </div>
                                        </div>
                            </div>
                            </div>
                            <!--end row--> 
                           
                            
                        
                        
                    </div>
                </div>
                <div class=" text-center">
                                <button class="btn btn-primary submit-btn">Create Patient</button>
                            </div>
                            </form>
			
        </div>

    <?php include('footer.php') ?>
    <script>
        $(document).ready(function() {
    $('.js-example-basic-single').select2();
        });
    </script>