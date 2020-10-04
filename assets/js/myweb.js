window.addEventListener('DOMContentLoaded', () => {
	const rows = document.querySelectorAll("td[data-href]");
	rows.forEach(row => {
		row.addEventListener("click", () =>{
			window.location.href = row.dataset.href;
		});
	});
			
});