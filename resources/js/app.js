import './bootstrap';
import '~resources/scss/app.scss';
import '~icons/bootstrap-icons.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])

import DataTable from 'datatables.net-dt';
import languageIT from 'datatables.net-plugins/i18n/it-IT.mjs';

// import.meta.glob(['../img/**']);

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
