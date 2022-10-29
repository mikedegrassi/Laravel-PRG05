import {forEach} from "lodash";

window.addEventListener('load', init);

let modalSelect;
let modal;
let numberOptions;
let serie;

function init(){

    modalSelect = document.querySelector('#audi-type');
    modal = modalSelect.options[modalSelect.selectedIndex]

    numberOptions = document.querySelectorAll('.number');
    serie = document.querySelector('#audi-serie');


    serie.addEventListener('click', selectionClickHandler);

}

function selectionClickHandler() {

    modal = modalSelect.options[modalSelect.selectedIndex]


    numberOptions.forEach(options => options.classList.remove("hidden"));

    switch (modal.innerHTML){
        case 'Q':
            numberOptions[0].classList.add('hidden');
            numberOptions[5].classList.add('hidden');
            numberOptions[8].classList.add('hidden');
            numberOptions[9].classList.add('hidden');
            numberOptions[10].classList.add('hidden');
            numberOptions[11].classList.add('hidden');
            numberOptions[12].classList.add('hidden');
            break
        case 'A':
            numberOptions[8].classList.add('hidden');
            numberOptions[9].classList.add('hidden');
            numberOptions[10].classList.add('hidden');
            numberOptions[11].classList.add('hidden');
            numberOptions[12].classList.add('hidden');
            break
        case 'e-tron':
            numberOptions[0].classList.add('hidden');
            numberOptions[1].classList.add('hidden');
            numberOptions[2].classList.add('hidden');
            numberOptions[3].classList.add('hidden');
            numberOptions[4].classList.add('hidden');
            numberOptions[5].classList.add('hidden');
            numberOptions[6].classList.add('hidden');
            numberOptions[7].classList.add('hidden');
            numberOptions[8].classList.add('hidden');
            numberOptions[10].classList.add('hidden');
            numberOptions[11].classList.add('hidden');
            break
        case 'TT':
            numberOptions[0].classList.add('hidden');
            numberOptions[1].classList.add('hidden');
            numberOptions[2].classList.add('hidden');
            numberOptions[3].classList.add('hidden');
            numberOptions[4].classList.add('hidden');
            numberOptions[5].classList.add('hidden');
            numberOptions[6].classList.add('hidden');
            numberOptions[7].classList.add('hidden');
            numberOptions[8].classList.add('hidden');
            numberOptions[9].classList.add('hidden');
            numberOptions[10].classList.add('hidden');
            numberOptions[11].classList.add('hidden');
            numberOptions[12].classList.add('hidden');
            break
        case 'S':
            numberOptions[1].classList.add('hidden');
            numberOptions[8].classList.add('hidden');
            numberOptions[9].classList.add('hidden');
            break
        case 'RS':
            numberOptions[0].classList.add('hidden');
            numberOptions[1].classList.add('hidden');
            numberOptions[7].classList.add('hidden');
            numberOptions[9].classList.add('hidden');
            numberOptions[10].classList.add('hidden');
            numberOptions[11].classList.add('hidden');
    }

}


