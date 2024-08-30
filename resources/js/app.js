import './bootstrap';
import '~resources/scss/app.scss';
import '~icons/bootstrap-icons.scss';
import * as bootstrap from 'bootstrap';

import axios from 'axios';

import.meta.glob([
    '../img/**'
])

import DataTable from 'datatables.net-dt';
import languageIT from 'datatables.net-plugins/i18n/it-IT.mjs';

// import.meta.glob(['../img/**']);
// recupero il pulsante dal dom
const button = document.getElementById('load-cars');

// dico al pulsante di rimanere in ascolto per un evento click da parte dell'utente
button.addEventListener('click', function(){
    // console.log(this);
    // effettuo la chiamata all'endpoint che ho creato
    axios.get('http://127.0.0.1:8000/api/cars/').then((response) => {
        // console.log(this);

        // salvo le auto in una variabile
        const cars = response.data.response;

        // recupero il contenitore in cui vado ad inserire le auto
        const car_container = document.getElementById('cars-container');
        
        // svuoto preventivamente il container
        car_container.innerHTML = '';

        // ciclo l'array delle auto
        cars.forEach((auto) => {
            let card = `<div class="col-12 col-md-6 col-lg-3">
                <div class="card p-3">
                    <div class="card-title">
                        <h3>
                            ${auto.model_name}
                        </h3>
                        <button class="detail-auto btn btn-sm btn-primary" data-slug="${auto.slug}">Visualizza auto</button>
                    </div>
                </div>
            </div>`;

            // appendo la card al contenitore delle auto
            car_container.innerHTML += card;
        });

        // recupero tutti i pulsanti con la classe detail-auto
        const detail_buttons = document.querySelectorAll('.detail-auto');
        
        // ciclo i pulsanti
        detail_buttons.forEach((button) => {
            // dico al pulsante di rimanere in ascolo dell'evento click
            button.addEventListener('click', function(){
                
                // recupero lo slug del pulsante cliccato per poter effettuare la chiamata api
                let slug = this.dataset.slug;
                
                // effettuo la chiamata api
                axios.get(`http://127.0.0.1:8000/api/cars/${slug}`).then((result) => {
                    // recupero l'elemento che dovrà contenere il dettaglio dell'auto cliccata
                    const detail_auto = document.getElementById('detail-auto');

                    // recupero i dati della risposta api
                    let car = result.data.response;
                    
                    // svuoto questo contenitore in maniera preventiva
                    detail_auto.innerHTML = '';

                    detail_auto.innerHTML = `<ul>
                        <li>${ car.model_name }</li>
                        <li>${ car.brand.name }</li>
                        <li>${ car.price }</li>
                        <li>${ car.transmission == 1 ? 'Manuale' : 'Automatico'}</li>
                    </ul>`
                });
            })
        });
    })

});


// recupero l'elenco dei pulsanti con javascript
const deleteButtons = document.querySelectorAll('.delete-button');

// ciclo l'array dei pulsanti
deleteButtons.forEach((button) => {
    // dico al pulsante di rimanere in attesa dell'evento click. Quando il pulsante viene cliccato, allora viene eseguita la funzione
    button.addEventListener('click', function(){
        
        // recupero i miei data attributes
        const id = button.getAttribute('data-id');
        const type = button.getAttribute('data-type');
        const name = button.getAttribute('data-name');

        console.log(name);

        // genero l'url della cancellazione
        const url = `${window.location.origin}/admin/${type}/${id}`;
        console.log(url);

        // recupero la form nella modale
        const form = document.getElementById('form-delete');

        // Inserisco un testo personalizzato con il nome dell'elemento da cancellare
        document.getElementById('text-modal').innerText = `Sei sicuro di voler cancellare l'elemento ${name}?`;

        form.setAttribute('action', url);
        
    })
});

const optionals_tab = new DataTable('#optionals-table', {
    responsive: true,
    language: languageIT,
    order: [[0, 'desc']]
})

const brand_tab = new DataTable('#brands-table', {
    responsive: true,
    language: languageIT,
    order: [[0, 'desc']]
})

const car_tab = new DataTable('#cars-table', {
    responsive: true,
    language: languageIT,
    order: [[0, 'desc']]
})
