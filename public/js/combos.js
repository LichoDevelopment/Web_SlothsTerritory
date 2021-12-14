const dropArea = document.querySelector('.img-combo-drag');
const buttonImg = document.querySelector('#img-btn');
const inputImg = document.querySelector('#img-input');
const imgName = document.querySelector('#img-name');
const addComboBtn = document.querySelector('#add-combo-btn');
const addComboForm = document.querySelector('#add-combo-form');
const itinerary = document.querySelector('#itinerary');
const addItineraryBtn = document.querySelector('#add-itinerary-btn');
const newItineraryInput = document.querySelector('#new-itinerary-input');
const deleteComboBtns = document.querySelectorAll('.delete-combo-btn');


let file;
let itineraryArray = [];

if (buttonImg) {
    buttonImg.addEventListener('click', (evt) => {
        evt.preventDefault();
        inputImg.click();
    });
}

if (inputImg) {
    inputImg.addEventListener('change', (evt) => {
        evt.preventDefault();
        file = evt.target.files[0];
        
        dropArea.classList.add('active');
        showFile(file);
        dropArea.classList.remove('active');
    });
}

if (dropArea) {
    dropArea.addEventListener('dragover', (evt) => {
        evt.preventDefault();
        dropArea.classList.add('active');
    });

    dropArea.addEventListener('dragleave', (evt) => {
        evt.preventDefault();
        dropArea.classList.remove('active');
    });

    dropArea.addEventListener('drop', (evt) => {
        evt.preventDefault();
        file = evt.dataTransfer.files[0];
        dropArea.classList.remove('active');
        showFile(file);
    });
}


if (addItineraryBtn) {
    addItineraryBtn.addEventListener('click', addItinerary);
}

if (addComboBtn) {
    addComboBtn.addEventListener('click', sendCombo);
}

if (deleteComboBtns) {
    deleteComboBtns.forEach(btn => {
        btn.addEventListener('click', deleteCombo);
    });
}

itinerary.addEventListener('click', (evt) => {
    evt.preventDefault();

    if (evt.target.tagName === 'BUTTON') {
       const index = evt.target.dataset.id;
       itineraryArray.splice(index, 1);
       printItinerary();
    }
})

function addItinerary(evt) {
    evt.preventDefault();
    if(newItineraryInput.value === '') {
        swal.fire({
            icon: 'warning',
            title: 'Seleccione una hora'
        })
    } else {

        if (itineraryArray.includes(newItineraryInput.value)) {
            swal.fire({
            icon: 'warning',
            title: 'Ya se ha agregado esta hora'
        })
        } else {
            itineraryArray.push(newItineraryInput.value + ':00');
            printItinerary();
        }
        
    }
}

function printItinerary() {
    itinerary.innerHTML = '';

    itineraryArray.map((item, index) => {
        itinerary.innerHTML += `
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <span>${item}</span>
                <button class="fas fa-trash text-danger" data-id="${index}" ></button>
            </li>
        `
    })
}

function showFile(file) {
    const fileReader = new FileReader();

    fileReader.addEventListener('load', (evt) => {
        let fileUrl = fileReader.result;
        imgName.innerHTML = `
            <img src="${fileUrl}" alt="${file.name}" height="100">
            <span>${file.name}</span>

        `
    });

    fileReader.readAsDataURL(file);
    imgName.classList.add('mt-2');
}

function sendCombo(evt) {
    evt.preventDefault();
    evt.target.disabled = true;
    
    let adult_price = addComboForm['price.adults'].value
    let kid_price = addComboForm['price.kids'].value
    
    let es = {
        name:           addComboForm['es.name'].value,
        description:    addComboForm['es.description'].value,
        includes:       addComboForm['es.includes'].value,
        requirements:   addComboForm['es.requirements'].value,
        language:       'es',
    }
    
    let en = {
        name:           addComboForm['en.name'].value,
        description:    addComboForm['en.description'].value,
        includes:       addComboForm['en.includes'].value,
        requirements:   addComboForm['en.requirements'].value,
        language:       'en'
    }

    if (validator({es, en, adult_price, kid_price})) {

        en['adult_price'] = adult_price;
        en['kid_price'] = kid_price;
        en['itinerary'] = JSON.stringify(itineraryArray);

        es['adult_price'] = adult_price;
        es['kid_price'] = kid_price;
        es['itinerary'] = JSON.stringify(itineraryArray);

        const data = new FormData();

        data.append('en', JSON.stringify(en));
        data.append('es', JSON.stringify(es));
        data.append('file', file);

        if (isEditView()) {
            const id = location.pathname.split('/combos/ver/')[1];

            fetch(`/combos/update/${id}`, {
                method: 'POST',
                body: data
            }).then(() => {
                location.reload();
            })
        } else {
            fetch('/combos', {
                method: 'POST',
                body: data
            }).then(() => {
                location.reload();
            })
        }

    } else {
        evt.target.disabled = false;
    }
}

function deleteCombo(evt) {
    evt.preventDefault();

    swal.fire({
        icon: 'warning',
        title: '¿Estás seguro de eliminar este combo?',
        showCancelButton: true,
    })
    .then(({isConfirmed}) => {
        if (isConfirmed) {
            fetch(`/combos/${evt.target.dataset.id}`, {
                method: 'DELETE'
            })
            .then(() => {
                swal.fire({
                    icon: 'success',
                    title: 'Combo eliminado',
                    showConfirmButton: false,
                })

                setTimeout(() => {
                    location.reload();
                }, 1000);
            })
        }
    })
}

function validator({es, en, adult_price, kid_price}){

    if (!file && !isEditView()) {
        swal.fire({
            icon: 'warning',
            title: 'Seleccione una imagen'
        })
        return false;
    }

    if (isEditView() && !imgName.children[0].src) {
        swal.fire({
            icon: 'warning',
            title: 'Seleccione una imagen'
        })
        return false;
    }

    if (!adult_price) {
        swal.fire({
            icon: 'warning',
            title: 'Seleccione un precio para adultos'
        })
        return false;
    }

    if (!kid_price) {
        swal.fire({
            icon: 'warning',
            title: 'Seleccione un precio para niños'
        })
        return false;
    }

    if (itineraryArray.length === 0) {
        swal.fire({
            icon: 'warning',
            title: 'Seleccione una hora'
        })
        return false;
    }

    let response = true;

    Object.entries(es).map(([key, value]) => {
        if (value === '' && response) {
            swal.fire({
                icon: 'warning',
                title: 'Debe llenar el campo ' + espanishFieldsNames[key] + ' de la sección español'
            })
            response = false;
        }
    })
    Object.entries(en).map(([key, value]) => {
        if (value === '' && response) {
            swal.fire({
                icon: 'warning',
                title: 'Debe llenar el campo ' + espanishFieldsNames[key] + ' de la sección inglés'
            })
            response = false;
        }
    })


    return response;
}

function isEditView() {
    if (location.pathname === '/combos/ver' || location.pathname === '/combos/create') {
        return false;
    }
    return true;
}

if (isEditView()) {
    itineraryArray = JSON.parse(itinerary.dataset.list);
    printItinerary();
}

const espanishFieldsNames = {
    'name': 'Nombre',
    'description': 'Descripción',
    'includes': 'Que Incluye',
    'requirements': 'Que llevar',
    'adult_price': 'Precio Adultos',
    'kid_price': 'Precio Niños'
}

