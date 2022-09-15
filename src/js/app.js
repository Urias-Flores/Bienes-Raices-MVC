

let selectedMode = '';
document.addEventListener('DOMContentLoaded', function() {
    eventListeners();
    darkMode();
});

function darkMode(){
    const themeOption = window.matchMedia("(prefers-color-scheme: dark)");
    if(themeOption.matches === true){
        selectedMode = 'dark';
        document.body.classList.add('dark-mode');
    }else{
        selectedMode = 'light';
        document.body.classList.remove('dark-mode');
    }
    themeOption.addEventListener('change', function(){
        if(themeOption.matches === true){
            document.body.classList.add('dark-mode');
        }else{
            document.body.classList.remove('dark-mode');
        }
    });

    const darkModebutton = document.querySelector('.dark-mode-button');
    darkModebutton.addEventListener('click', function(){
        document.body.classList.toggle('dark-mode');
    });
}

function eventListeners(){
    const mobileMenu = document.querySelector(".mobile-menu");
    mobileMenu.addEventListener('click', navegacionResponsive);

    const typeContact = document.querySelectorAll('input[name="data[tipoContacto]"]');
    typeContact.forEach(input => {
        input.addEventListener('click', showTypeContact);
    });
}

function navegacionResponsive(){
    const navegacion = document.querySelector('.navegacion');
    navegacion.classList.toggle('active');
}

function showTypeContact(evt){
    const typeContent = document.querySelector('#contacto');
    if(evt.target.value === 'telefono'){
        typeContent.innerHTML = `
            <label for="Number">Teléfono</label>
            <input type="tel" placeholder="Telefono..." id="Number" name="data[Telefono]">
            
            <p>Elija la fecha y hora en la que desea ser contactado</p>
            
            <label for="Date">Fecha</label>
            <input type="date" id="Date" name="data[Fecha]">

            <label for="Time">Hora</label>
            <input type="Time" id="Time" min="09:00" max="18:00" name="data[Hora]">
        `;
    }else{
        typeContent.innerHTML = `
            <label for="Email">Email</label>
            <input type="email" placeholder="Correo..." id="Email" name="data[Email]">
        `;
    }
}