<?php include('header.php') ?>
<?php include('db_connect.php');


        $prenom=$_POST['prenom'];
        $prenom= ucfirst(strtolower($prenom));
        $nom=$_POST["nom"];
        $nom=strtoupper($nom);
        $sexe=$_POST['sexe'];
        $cin=$_POST['cin'];
        $date_n=$_POST['date_n'];
        $etat=$_POST['Etat'];
        $isdiabetique=$_POST['isdiabetique'];
        $group_s=$_POST['group_s'];
        $N_aff_Ass=$_POST['N_aff_Ass'];
        $IDmutuelle=$_POST['IDmutuelle'];
        $N_aff_Mutt=$_POST['N_aff_Mutt'];
        $Adresse=$_POST['Adresse']; 
        $ville=$_POST['ville']; 
        $pays=$_POST['pays']; 
        $tele=$_POST['tele'];
        $email=$_POST['email'];
        $IDassurance=$_POST['IDassurance'];

       /* echo  'gggggggggggggggggggggggggggggg '. '</br>' ;
        echo  'gggggggggggggggggggggggggggggg '. '</br>' ;
        echo  'gggggggggggggggggggggggggggggg '. '</br>' ;
        echo  'gggggggggggggggggggggggggggggg '. '</br>' ;
        echo  'gggggggggggggggggggggggggggggg '.$_POST['IDass'] .'</br>' ;
        echo  'gggggggggggggggggggggggggggggg '.$IDassurance .'</br>' ;*/
        
        
        

    //get adhesion ID
        $sql_patient= "select idPatient from patient ORDER BY idPatient DESC LIMIT 1 ";
        $result_patient = mysqli_query($connect, $sql_patient);
        $row_patient= mysqli_fetch_array($result_patient);
        $ID_patient=$row_patient['idPatient']+1;
    
    //get date n
        $date_n= str_replace('/', '-', $date_n);
        $date_n = date("Y-m-d", strtotime($date_n)); 
    //req
    
    $sql1="INSERT INTO `patient`(`idPatient`, `prenom`, `nom`, `sexe`, `CIN`, `date_n`, `etat`, `isDiabetique`, `group_sang`, `IDassurance`, `N_aff_ASS`, `IDmutuelle`, `N_aff_Mut`, `adr`, `ville`, `pays`, `tele`, `email`)
    VALUES ('$ID_patient','$prenom','$nom','$sexe','$cin','$date_n','$etat','$isdiabetique','$group_s','$IDassurance','$N_aff_Ass','$IDmutuelle','$N_aff_Mutt','$Adr','$ville','$pays','$tele','$email')";

            $result= mysqli_query($connect,$sql1);

          //  echo  'gggggggggggggggggggggggggggggg '.$sql1 .'</br>' ;
            if($result)
            { echo "<script>
                
                  location.replace('Patients.php');
                </script>";
            }
?>
<?php include('footer.php') ?>