<?php include('header.php') ?>
<?php include('db_connect.php');


$id=$_GET['id'];

$sql1= "DELETE FROM patient where IDpatient = '$id'";


$result1 = mysqli_query($connect, $sql1);
if($result1)
{
    echo "<script>
        location.replace('Patients.php');
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Your work has been saved',
            showConfirmButton: false,
            timer: 1500
          });
         </script>";
}
?>

<?php include('footer.php') ?>
<script>
    
</script>