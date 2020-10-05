window.addEventListener('DOMContentLoaded', () => {
	const rows = document.querySelectorAll("td[data-href]");
	rows.forEach(row => {
		row.addEventListener("click", () =>{
			window.location.href = row.dataset.href;
		});
	});
			
});
function owner()
{
	var type_owner =document.getElementById('type_owner');
	var owner_app = document.getElementById('owner_app');
	if(type_owner.value=='yes')
	owner_app.style.display='none'
	else
	owner_app.style.display=''
	
}
