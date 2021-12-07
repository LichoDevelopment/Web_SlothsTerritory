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

buttonImg.addEventListener('click', (evt) => {
    evt.preventDefault();
    inputImg.click();
});

inputImg.addEventListener('change', (evt) => {
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
    let file = evt.dataTransfer.files[0];
    dropArea.classList.remove('active');
    showFile(file);
});

addItineraryBtn.addEventListener('click', (evt) => {
    evt.preventDefault();
    if(newItineraryInput.value === '') {
        alert('Seleccione una hora');
    } else {
        console.log(newItineraryInput.value);
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
    let formData = new FormData();

    const es = {
        name:           addComboForm['es.name'].value,
        description:    addComboForm['es.description'].value,
        includes:       addComboForm['es.includes'].value,
        requirements:   addComboForm['es.requirements'].value,
        adult_price:    addComboForm['price.adults'].value,
        kid_price:      addComboForm['price.kids'].value,
        language:       'es',
    }

    const en = {
        name:           addComboForm['en.name'].value,
        description:    addComboForm['en.description'].value,
        includes:       addComboForm['en.includes'].value,
        requirements:   addComboForm['en.requirements'].value,
        adult_price:    addComboForm['price.adults'].value,
        kid_price:      addComboForm['price.kids'].value,
        language:       'en'
    }

    console.log(es);

    console.log(en);
});

