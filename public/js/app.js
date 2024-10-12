// Validazione dei dati tramite JS 
(function() {
    'use strict';

    window.addEventListener('load', function() {

        var forms = document.getElementsByClassName('needs-validation');

        var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);
})();

//valore di Altezza del centro di gravità

const CGHCalculation = (e) => {
    const inputhLength = e.target.value
    let CGH = 10;
    if (inputhLength > 200.00) {

        CGH = 15;
    }
   // console.log(CGH)

    return document.querySelector('input[name="CGH"]').value = CGH.toFixed(2);

};


//ritorna il radiante del grado

const pitchAngle = () => {
    const inputGrado = convertInFloat(document.getElementById('grado').value)
  //  console.log(inputGrado)

    const radians = degreesToRadians(inputGrado);
    //console.log(radians)
    const radiansNew = radians.toFixed(5)
    //console.log(radiansNew);

    return document.querySelector('input[name="radiante"]').value = radiansNew

}

// funzioni utili 
const convertInFloat = (el) => {
    return parseFloat(el);
}

const degreesToRadians = (degrees) => {
    return degrees * (Math.PI / 180);
}