const dropArea = document.querySelector('.img-combo-drag');
const buttonImg = document.querySelector('#img-btn');
const inputImg = document.querySelector('#img-input');
const imgName = document.querySelector('#img-name');
const addComboBtn = document.querySelector('#add-combo-btn');
const addComboForm = document.querySelector('#add-combo-form');
const itinerary = document.querySelector('#itinerary');
const addItineraryBtn = document.querySelector('#add-itinerary-btn');
const newItineraryInput = document.querySelector('#new-itinerary-input');


let file;
let itineraryArray = [];

buttonImg.addEventListener('click', (evt) => {
    evt.preventDefault();
    inputImg.click();
});

inputImg.addEventListener('change', (evt) => {
    evt.preventDefault();
    file = evt.target.files[0];
    
    dropArea.classList.add('active');
    showFile(file);
    dropArea.classList.remove('active');
});

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

addItineraryBtn.addEventListener('click', (evt) => {
    evt.preventDefault();
    if(newItineraryInput.value === '') {
        alert('Seleccione una hora');
    } else {

        if (itineraryArray.includes(newItineraryInput.value)) {
            aler
        } else {

            if (itineraryArray.includes(newItineraryInput.value)) {
                alert('Ya se ha agregado esta hora');
            } else {
                itineraryArray.push(newItineraryInput.value + ':00');

                itinerary.innerHTML = '';

                itineraryArray.map(item => {
                    itinerary.innerHTML += `
                        <li class="list-group-item">${item}</li>
                    `
                })
            }
        }
    }

})

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


addComboBtn.addEventListener('click', (evt) => {
    evt.preventDefault();
    
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

        const formData = new FormData();

        formData.append('en', JSON.stringify(en));
        formData.append('es', JSON.stringify(es));
        formData.append('file', file);

        fetch('/combos', {
            method: 'POST',
            body: formData
        }).then(() => {
            location.reload();
        })

    }
});


function validator({es, en, adult_price, kid_price}){

    if (!file) {
        alert('Seleccione una imagen');
        return false;
    }

    if (itineraryArray.length === 0) {
        alert('Seleccione una hora');
        return false;
    }

    if (!adult_price) {
        alert('Seleccione un precio para adultos');
        return false;
    }

    if (!kid_price) {
        alert('Seleccione un precio para niños');
        return false;
    }

    let response = true;

    Object.entries(es).map(([key, value]) => {
        if (value === '' && response) {
            alert('Debe llenar el campo ' + espanishFieldsNames[key] + ' de la sección español');
            response = false;
        }
    })
    Object.entries(en).map(([key, value]) => {
        if (value === '' && response) {
            alert('Debe llenar el campo ' + espanishFieldsNames[key] + ' de la sección inglés');
            response = false;
        }
    })


    return response;
}


const espanishFieldsNames = {
    'name': 'Nombre',
    'description': 'Descripción',
    'includes': 'Que Incluye',
    'requirements': 'Que llevar',
    'adult_price': 'Precio Adultos',
    'kid_price': 'Precio Niños'
}
