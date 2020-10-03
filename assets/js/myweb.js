
window.addEventListener('DOMContentLoaded', () => {
	const rows = document.querySelectorAll("td[data-href]");
	rows.forEach(row => {
		row.addEventListener("click", () =>{
			window.location.href = row.dataset.href;
		});
	});
			
});

function redirct() {
	alert('hi');
}
function switchASS()
{
	var AssureCH = document.getElementById('AssureCH');
	var divAss  = document.getElementById('divAss');
	var divNASS  = document.getElementById('divNASS');

	if(AssureCH.value=='nom')
	{
		divAss.style.display='none';
		divNASS.style.display='none';
	}
	else
	{
		divAss.style.display='';
		divNASS.style.display='';

	}
	
}
function switchMUt(){
	var MuttCH = document.getElementById('MuttCH');
	var divMutt = document.getElementById('divMutt');
	var divNMutt = document.getElementById('divNMutt');

	if(MuttCH.value=='nom')
	{
		divMutt.style.display='none';
		divNMutt.style.display='none';
	}
	else
	{
		divMutt.style.display='';
		divNMutt.style.display='';

	}
}
function conf_supp(id)
{
	var x = 0;
	Swal.fire({
		title: 'Êtes-vous sûr?',
		text: "Vous ne pourrez pas revenir en arrière!",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Oui, supprimez-le!'
	  }).then((result) => {
		if (result.isConfirmed) {
			window.location.href='delete_patient.php?id='+id+''
		}
	  });

}
