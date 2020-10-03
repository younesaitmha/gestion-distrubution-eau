<?php include('header.php') ?>
<?php include('db_connect.php') ?>
<?php

    //get data for assurance
    $sql1= 'SELECT * FROM `assurance` where IDassurance > 0 ';
    $result1 = mysqli_query($connect, $sql1);
  //get data for mutuelle
    $sql2= 'SELECT * FROM `mutuelle` where IDmutuelle > 0 ';
    $result2 = mysqli_query($connect, $sql2);

    $id=$_GET['id'];
    $sql_patient= "SELECT * FROM patient WHERE idPatient='$id'";
    $result_patient = mysqli_query($connect, $sql_patient);

    $row_patient = mysqli_fetch_array($result_patient);
    //convert date
    $date_n = $row_patient['date_n'];
    $date_n= str_replace('-', '/', $date_n);
    $date_n = date("d-m-Y", strtotime($date_n)); 


?>
<div onload="switchMUt()" class="page-wrapper">
    <div class="content">
          <link rel="stylesheet" type="text/css" href="assets/css/user-info.css">
          <script>
            var patients = document.getElementById('patients');
            patients.classList.add("active");
          </script>
          <div class="card" style="padding:10px;" >
            <div class="row gutters-sm">
             <div class="col-md-3 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="assets/img/doctor-thumb-06.jpg" alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-3">
                      <h4>Ayoub Rachik</h4>
                      <p class="text-secondary mb-1">+212673392085</p>
                      <p class="text-muted font-size-sm">ayoub@myweb.ma</p>
                      <button class="btn btn-primary">Envoyer un e-mail</button>
                      <button class="btn btn-outline-primary">Envoyer un Message</button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card mt-3">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">Nombre de Visites</h6>
                    <span class="text-secondary">20</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">Nombre de Factures</h6>
                    <span class="text-secondary">6</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">Nombre de Rendez-vous </h6>
                    <span class="text-secondary">9</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">Nombre d'ordonnances</h6>
                    <span class="text-secondary">3</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">Prochain rendez-vous</h6>
                    <span class="text-secondary">23/06/2021</span>
                  </li>
                  
                </ul>
              </div>
            </div>


            <div class="col-md-8">
            
                         <div class="card-body">
                          <ul class="nav nav-tabs">
                              <li class="nav-item">
                                  <a class="nav-link active "  href="">Information</a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link " href="#">Rendez-vous</a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link" href="#">Facturs</a>
                              </li>

                          </ul>
                          <div class="d-flex justify-content-end">
                                  <button type="button" class="btn btn-primary"><i class="fa fa-edit"></i> Modifier Patient</button>
                              </div>
                         </div>
                              
                     
                         <h5 style="color: #009EFB;">Information personnelle</h5>
                <!--start row--> 
                <div class="row">
                                <div class="col-sm-4 ">
                                    <div class="form-group">
                                        <label>Prénom <span class="text-danger">*</span></label>
                                        <input value="<?php echo $row_patient['prenom'] ?>" id="prenom" name="prenom" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Nom <span class="text-danger">*</span> </label>
                                        <input value="<?php echo $row_patient['nom'] ?>" disabled id="nom" name="nom" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                                <label>sexe <span class="text-danger">*</span></label>
                                                <select id="sexe" name="sexe" class="form-control select">
                                                  <option value="Homme" <?php if($row_patient['sexe'] =='Homme') echo 'selected' ?> >Homme</option>
                                                  <option value="Femme" <?php if($row_patient['sexe'] =='Femme') echo 'selected' ?> >Femme</option>
                                                </select>
                                    </div>
                                </div>
                </div>
                <!--start row--> 
                <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>CIN </label>
                                        <input value="<?php echo $row_patient['CIN'] ?>" id="cin" name="cin"  class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Date de naissance</span></label>
                                        <div class="cal-icon">
                                            <input value="<?php echo $date_n ?>" id="date_n" name="date_n"  type="text" class="form-control datetimepicker">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                                <label>Etat civil </span></label>
											                          	<select id="Etat" name="Etat" class="form-control ">
                                                    <option value="single" <?php if($row_patient['etat'] =='single') echo 'selected' ?> >Célibataire</option>
                                                    <option value="married" <?php if($row_patient['etat'] =='married') echo 'selected' ?>>Marié</option>
                                                    <option value="widowed" <?php if($row_patient['etat'] =='widowed') echo 'selected' ?>>Veuf</option>
                                                    <option value="divorced" <?php if($row_patient['etat'] =='divorced') echo 'selected'?>>Divorcé</option>
                                                    <option value="other" <?php if($row_patient['etat'] =='other') echo 'selected' ?>> Autre</option>
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
                                                   <option value="non"  <?php if($row_patient['isDiabetique'] =='nom') echo 'selected'?> >Non</option>
                                                    <option value="oui" <?php if($row_patient['isDiabetique'] =='oui') echo 'selected'?> >Oui</option>
                                                </select>
                                     </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Groupe sanguin  </span></label>
											                  <select id="group_s" name="group_s" class="form-control">
                                            <option selected value="0" <?php if($row_patient['group_sang'] =='0') echo 'selected' ?> >Aucun</option>
                                            <option value="O-" <?php if($row_patient['group_sang'] =='O-') echo 'selected' ?> >O-</option>
                                            <option value="O+" <?php if($row_patient['group_sang'] =='O+') echo 'selected' ?> >O+</option>
                                            <option value="A-" <?php if($row_patient['group_sang'] =='A-') echo 'selected' ?> >A-</option>
                                            <option value="A+" <?php if($row_patient['group_sang'] =='A+') echo 'selected' ?> >A+</option>
                                            <option value="B-" <?php if($row_patient['group_sang'] =='B') echo 'selected' ?> >B-</option>
                                            <option value="B+" <?php if($row_patient['group_sang'] =='B+') echo 'selected' ?> >B+</option>
                                            <option value="AB-" <?php if($row_patient['group_sang'] =='AB-') echo 'selected' ?> >AB-</option>
                                            <option value="AB+" <?php if($row_patient['group_sang'] =='AB+') echo 'selected' ?> >AB+</option>
												                </select>
                                    </div>
                                </div>
                </div>
                <!--end row-->
                <h5 style="color: #009EFB;">Assurance et Mutuelle </h5>
                <!--start row--> 
                <div class="row">
                                 <div class="col-sm-4">
                                     <div class="form-group">
                                       <label>Assuré</span></label>
                                          <select onchange="switchASS()" id="AssureCH" name="AssureCH" class="form-control select">
                                            <option <?php if($row_patient['IDassurance'] =='0') echo 'selected' ?> value="nom">Non</option>
                                            <option <?php if($row_patient['IDassurance'] !='0') echo 'selected' ?> value="oui">Oui</option>
                                          </select>
                                     </div>
                                  </div>
                                  <div class="col-sm-4">
                                                <div id="divAss" class="form-group">
                                                    <label class="" >Assurance </label>
                                                        <select class="js-example-basic-single form-control " name='IDass'>
                                                        <option value="0"  selected disabled > choisissez une assurance </option>    
                                                        <?php while($row1= mysqli_fetch_array($result1)):;?>
                                                            <option value="<?php echo $row1['IDassurance'];?>" <?php if($row_patient['IDassurance'] ==$row1['IDassurance']) echo 'selected' ?>  > <?php echo $row1['Nomassurance'];?>  </option>
                                                            <?php endwhile;?>
                                                        </select>
                                                </div>
                                    </div>
                                    <div class="col-sm-4">
                                                 <div id="divNASS" class="form-group">
                                                        <label>N°affiliation  </label>
                                                        <input value="<?php echo $row_patient['N_aff_ASS'];?>" id="N_aff_Ass" name="N_aff_Ass"  class="form-control" type="text">
                                                </div>
                                        </div>
                </div>
                <!--end row-->
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
                <h5 style="color: #009EFB;">Information du contact </h5>
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

                </div>
                <!--end row-->
                <!--start row--> 
                <div class="row">
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
                          <div class="col-sm-4">
                            <div class="form-group">
                              <label for=""></label>
                            <button style="display: none;" type="button" class="btn btn-warning form-control"><i class="fa fa-save"></i> Enregistrer les Modifications</button>
                            </div>
                          </div>

                </div>
                <!--end row-->
                           
										    
            </div>
          </div>
        </div>
   
  </div>
</div>
                                                                                                            
<?php include('footer.php') ?>