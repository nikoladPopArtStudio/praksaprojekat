const form = document.getElementById('studentForm');
const formDelete = document.getElementById('deleteForm')

async function postData(url = "", data = {}) 
{
	const response = await fetch("http://localhost/praksaprojekat" + url, 
    {
		method: "POST",
		headers: {
			"Content-Type": "application/json",
		},
		body: JSON.stringify(data),
	});
	if (!response.ok)
    {
		throw new Error("Network response was not OK");
	}

	return response.json();
}


function deleteButtonClick(deleteButton) {
    deleteButton.addEventListener('click', (event) => {
        event.preventDefault();

        const studentId = deleteButton.parentElement.querySelector('.studentId').innerText;

        const xhr = new XMLHttpRequest();
        const url = 'http://localhost/praksaprojekat/delete.php';

        xhr.open('POST', url, true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

        xhr.onload = function () {
            if (xhr.status >= 200 && xhr.status < 400) {
                // Success!
                console.log(xhr.responseText);
                deleteButton.parentElement.parentElement.remove();
            } else {
                // We reached our target server, but it returned an error
                console.error('Error:', xhr.responseText);
            }
        };

        xhr.onerror = function () {
            // There was a connection error of some sort
            console.error('Network Error');
        };

        // Send the request
        xhr.send(`student_id=${studentId}`);
    });
}

form.addEventListener("submit", (e) => 
{
	e.preventDefault();
	console.log("prevented");

	const formInputs = form.querySelectorAll(".field");
	let formData = {};
	for (let input of formInputs) 
    {
		formData[input.name] = input.value;
	}

	/* Kad sumbitujemo formu na .loader dodajemo classu active */
	const loader = document.querySelector(".loader");
	loader.classList.add("active");



	postData("/create.php", formData)
		.then((data) => // data je u json formatu
        {
			// Proveravamo da li je json data objekat prazan
			// proverava se duzina objekta
			if(Object.keys(data).length !== 0)
			{
				loader.classList.remove("active");
				const parent = document.querySelector('.parent');
				const divRow = document.querySelector('.target_row')

				const liWraper = document.createElement('li');
				const prom = document.createElement('ul');
				const liId = document.createElement('li');
				const liImePrezime = document.createElement('li');
				const liOcena = document.createElement('li');
				const spanId = document.createElement('span');
				const buttonSubmit = document.createElement('button');

			
				buttonSubmit.type = 'submit';
				buttonSubmit.classList.add('deleteButton','btn','btn-danger');

				spanId.classList.add('studentId')
				
				liWraper.classList.add('col-md-6');
				liId.classList.add('list-group-item');
				liImePrezime.classList.add('list-group-item');
				liOcena.classList.add('list-group-item');
				
		
				// dodajemo podatke
				spanId.innerHTML += data.id;
				liId.innerHTML += 'Index: ';
				liImePrezime.innerHTML += 'Ime i Prezime: ' + data.ime + ' ' + data.prezime;
				liOcena.innerHTML += 'Prosecna Ocena: ' + data.ocena;
				buttonSubmit.innerHTML += 'Obrisi Studenta';

			
				
				prom.appendChild(liId);
				prom.appendChild(liImePrezime);
				prom.appendChild(liOcena);
				liId.appendChild(spanId);
				prom.appendChild(buttonSubmit);
				liWraper.appendChild(prom);
				divRow.appendChild(liWraper)
				const deleteButton = buttonSubmit;


				deleteButtonClick(deleteButton);
			
				
				parent.appendChild(divRow);
				console.log(data);
				form.reset();
			

			}
			else
			{
				console.log("There is not enough data")
			}
		
		})

		.catch((error) => 
        {
			console.error(error);
		})
		.finally(() => 
        {
			console.log("always called");
		});
})

