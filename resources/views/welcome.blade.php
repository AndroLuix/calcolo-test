<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon"
        href="https://scontent.fnap2-1.fna.fbcdn.net/v/t39.30808-6/462000917_1198221264736796_7924378957723651720_n.jpg?_nc_cat=111&ccb=1-7&_nc_sid=6ee11a&_nc_ohc=nPiUeuZ9IB8Q7kNvgHh4kCx&_nc_ht=scontent.fnap2-1.fna&_nc_gid=AycTUuUnZcXGfydNuF3pYoS&oh=00_AYC4CWw5X5st-iNiZ1m-3yyM1ZXE9TbRLTO11_gGdtTyuQ&oe=670F4B3E">
    <title>Calcolo KXPO</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/checkout/">



   

    <style>
        label span {
            color: red;
        }
    </style>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body class="bg-light" onload="pitchAngle()">
    <div class="container">
        <div class="py-5 text-center">
            <img class="d-block mx-auto mb-4"
                src="https://scontent.fnap2-1.fna.fbcdn.net/v/t39.30808-6/462000917_1198221264736796_7924378957723651720_n.jpg?_nc_cat=111&ccb=1-7&_nc_sid=6ee11a&_nc_ohc=nPiUeuZ9IB8Q7kNvgHh4kCx&_nc_ht=scontent.fnap2-1.fna&_nc_gid=AycTUuUnZcXGfydNuF3pYoS&oh=00_AYC4CWw5X5st-iNiZ1m-3yyM1ZXE9TbRLTO11_gGdtTyuQ&oe=670F4B3E"
                alt="" width="125" height="125">
            <h2>Calcolo del Fattore KXPO</h2>
        </div>

        <div class="row">
            <div class="order-md-2 mb-4">
                <form class=" needs-validation" novalidate>
                    @csrf
                    <div class="col-md-12 order-md-1 ">
                        <h4 class="mb-3">Ship Data</h4>
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Revision</span>
                                    </div>
                                    <input name="revision" type="number" class="form-control" placeholder="">
                                    <div class="invalid-feedback">Inserisci una revisione valida.</div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex flex-row d-flex justify-content-between border border-secondary my-4 p-4">
                            <div class="col-md-4 mb-3 mx-2">
                                <label for="lastName"> cantiere navale</label>
                                <input type="text" name="shipyard" class="form-control" id="lastName" placeholder=""
                                    value="">
                                <div class="invalid-feedback">Inserisci il cantiere navale.</div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="lastName"> Luogo di installazione</label>
                                <input type="text" name="site" class="form-control" placeholder="" value="">
                                <div class="invalid-feedback">Inserisci il luogo di installazione.</div>
                            </div>
                        </div>

                        <div
                            class="d-flex flex-row d-flex justify-content-center mt-4 border border-secondary p-4 flex-wrap">
                            <div class="col-md-4 mb-3 ms-auto">
                                <div class="d-flex align-items-center">
                                    <label for="power-input" class="input-group-text me-2"> Alimentazione [V]</label>
                                    <input name="power" type="number" class="form-control" id="power-input"
                                        placeholder="Inserisci il voltaggio">
                                    <div class="invalid-feedback">Inserisci il voltaggio.</div>
                                </div>
                            </div>

                            <div class="col-md-4 mb-3 ms-auto">
                                <div class="d-flex align-items-center">
                                    <label for="power-input" class="input-group-text me-2"> Frequenza
                                        principale</label>
                                    <input name="frequency" type="number" class="form-control"
                                        placeholder="Inserisci la frequenza">
                                    <div class="invalid-feedback">Inserisci la frequenza.</div>
                                </div>
                            </div>

                            <div class="col-md-4 mb-3 mx-2">
                                <div class="d-flex align-items-center">
                                    <label for="naval-register" class="input-group-text"> Registro Nav.
                                        <span>*</span></label>
                                    <select class="form-select" aria-label="Default select example">
                                        <option value="RINA">RINA</option>
                                    </select>
                                </div>
                                <div class="invalid-feedback">Seleziona un registro navale.</div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <div class="d-flex align-items-center">

                                    <label for="" class="input-group-text">Scafo</label>
                                    <input name="hull" type="text" class="form-control" placeholder="">
                                </div>
                                <div class="invalid-feedback">Inserisci lo scafo.</div>
                            </div>
                        </div>



                        <!-- dati obbligatori -->
                        <div
                            class="d-flex flex-row d-flex justify-content-between flex-wrap border border-success my-4 p-4">

                            <div class="col-md-4 mb-3">
                                <label for="">Lunghezza [m] <span>*</span></label>
                                <input name="length" type="number" onkeyup="CGHCalculation(event)"value="0.00"
                                    class="form-control" placeholder="" step="0.01" required>
                                <div class="invalid-feedback">Inserisci la lunghezza in metri</div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="">Tsc [m] - Pescaggio a Pieno Carico <span>*</span></label>
                                <input name="tsc" type="text" value="0.00" class="form-control"
                                    placeholder="" step="0.01" required>
                                <div class="invalid-feedback">Inserire Valore T_sc.</div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <!-- VerticalShift -->
                                <label for="verticalPosition">Posizione Verticale Ascensore<span>*</span></label>
                                <input name="verticalPosition" value="0.0000" type="number" class="form-control"
                                    placeholder="" step="0.01" required>
                                <div class="invalid-feedback">Inserire Posizione verticale (numero decimale).</div>
                            </div>

                        </div>



                        <div
                            class="d-flex flex-row d-flex justify-content-between flex-wrap border border-secondary my-4 p-4">

                            <div class="col-md-4 mb-3">

                                <label for="">Altezza Centro Gravità <span>*</span></label> <br>
                                <small>[m]</small>
                                <input name="CGH" readonly type="number" value="0.00" class="form-control"
                                    step="0.01" required>

                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="">Angolo di Pitch. <span>*</span></label> <br>
                                <small>Grado</small>

                                <input name="grado" id="grado" readonly type="number" value="7.50"
                                    class="form-control" placeholder="" step="0.01">
                                <small>Radiante</small>

                                <!-- PitchAngle -->
                                <input name="radiante" readonly type="number" value="7.50" class="form-control"
                                    placeholder="" step="0.01">
                                <div class="invalid-feedback"></div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="AngularAccelerationPitch">Accellerazione Angolare Pitch
                                    <span>*</span></label>
                                <br>
                                <!-- AngularAccelerationPitch -->
                                <small>Rad/s²</small>
                                <input name="AngularAccelerationPitch" id="AngularAccelerationPitch" readonly
                                    value="0.105" type="number" class="form-control" placeholder=""
                                    step="0.01" required>
                            </div>

                        </div>


                    </div>

                    <button class="btn btn-success w-100 mt-5">Calcola</button>


                </form>
            </div>


        </div>

        <footer class="my-5 pt-5 text-muted text-center text-small">
            <p class="mb-1">© {{ date('Y') }} Luigi Iadicola</p>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="#">Privacy</a></li>
                <li class="list-inline-item"><a href="#">Terms</a></li>
                <li class="list-inline-item"><a href="#">Support</a></li>
            </ul>
        </footer>

        <script>

            // Validazione dei dati tramite browser 
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
                console.log(CGH)

                return document.querySelector('input[name="CGH"]').value = CGH.toFixed(2);

            };


            //ritorna il radiante del grado

            const pitchAngle = () => {
                const inputGrado = convertInFloat(document.getElementById('grado').value)
                console.log(inputGrado)

                const radians = degreesToRadians(inputGrado);
                console.log(radians)
                const radiansNew = radians.toFixed(5)
                console.log(radiansNew);

                return document.querySelector('input[name="radiante"]').value = radiansNew

            }

            // funzioni utili 
            const convertInFloat = (el) => {
                return parseFloat(el);
            }

            const degreesToRadians = (degrees) => {
                return degrees * (Math.PI / 180);
            }
        </script>
</body>

</html>
