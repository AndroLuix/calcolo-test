@extends('layouts.app')

@section('content')

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
                    <form class="needs-validation" method="POST" novalidate>
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
                                    <input name="tsc" type="text" value="0.00" class="form-control" placeholder=""
                                        step="0.01" required>
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

                        <button id="calculate-btn" class="btn btn-success w-100 mt-5">Calcola</button>

                        <!-- risultato -->
                        <div class="kxpo-container my-4 p-4 text-center border rounded bg-light">
                            <div id="kxpo-value" 
                            class="kxpo-value display-4 text-success font-weight-bold"></div>
                        </div>

                        <div class="alert alert-danger hidden" id="error-messages" >

                        </div>


                    </form>
                </div>





            </div>



            <script src="{{ asset('js/app.js') }}"></script>




            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
                $(document).ready(function() {
                   

                    $('#calculate-btn').on('click', function(e) {
                        e.preventDefault();

                        $('#error-messages').addClass('hidden')

                        let formData = {
                            _token: $('input[name="_token"]').val(),
                            revision: $('input[name="revision"]').val(),
                            shipyard: $('input[name="shipyard"]').val(),
                            site: $('input[name="site"]').val(),
                            power: $('input[name="power"]').val(),
                            frequency: $('input[name="frequency"]').val(),
                            hull: $('input[name="hull"]').val(),
                            length: $('input[name="length"]').val(),
                            tsc: $('input[name="tsc"]').val(),
                            verticalPosition: $('input[name="verticalPosition"]').val(),
                            CGH: $('input[name="CGH"]').val(),
                            radiante: $('input[name="radiante"]').val(),
                            AngularAccelerationPitch: $('input[name="AngularAccelerationPitch"]').val(),
                        };

                        //console.log(formData)

                        $.ajax({
                            url: "{{ route('calculate.kxpo') }}",
                            method: "POST",
                            data: formData,
                            success: function(response) {
                                $('#kxpo-value').text(response.kxpo);
                            },
                            error: function(xhr, status, error) {
                                console.error("Error occurred: ", error);
                               
                                const errors = xhr.responseJSON.details;

                                $('#error-messages').removeClass('hidden')
                                $.each(errors, function(field, messages) {
                                    messages.forEach(function(message) {
                                        $('#error-messages').append(
                                            `<li>${message}</li>`);
                                    });
                                });
                            }
                        });
                    });
                });
            </script>
    </body>
@endsection
