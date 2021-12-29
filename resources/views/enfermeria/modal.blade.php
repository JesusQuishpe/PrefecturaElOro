{{-- <div class="modal-container">
    <div class="modal">;
        @include('enfermeria.clientForm')
    </div>
</div> --}}

<div class="modal fade" id="modal-enf-nuevo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ingresar datos</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                
            </div>
            <div class="modal-body">
                <div class="alert alert-primary" role="alert">
                    Los campos con <span class="text-danger">*</span> son obligatorios.
                </div>
                <form id="form-enfermeria">
                    @csrf
                    <div class="mb-3 row">
                        <div class="col">
                            <label for="peso" class="col-form-label">Peso en Kg <span class="text-danger">*</span> </label>
                            <input type="text" class="form-control" id="peso" name="peso">
                            <p class="d-none"></p>
                        </div>
                        <div class="col">
                            <label for="estatura" class="col-form-label">Estatura <span class="text-danger">*</span> </label>
                            <input type="text" class="form-control" id="estatura" name="estatura"></input>
                            <p class="d-none"></p>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col">
                            <label for="temperatura" class="col-form-label">Temperatura °C <span class="text-danger">*</span> </label>
                            <input type="text" class="form-control" id="temperatura" name="temperatura"></input>
                            <p class="d-none"></p>
                        </div>
                        <div class="col">
                            <label for="presion" class="col-form-label">Presión <span class="text-danger">*</span> </label>
                            <input type="text" class="form-control" id="presion" name="presion" placeholder="Ejem: 120/129"></input>
                            <p class="d-none"></p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label for="t_resp" class="col-form-label">T. Respiratoria <span class="text-danger">*</span> :</label>
                            <input type="text" class="form-control" id="t_resp" name="t_resp"></input>
                            <p class="d-none"></p>
                        </div>
                        <div class="col">
                            <label for="discapacidad" class="col-form-label">Discapacidad % <span class="text-danger">*</span> :</label>
                            <input type="text" class="form-control" id="discapacidad" name="discapacidad"></input>
                            <p class="d-none"></p>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <div class="col">
                            <label for="embarazo" class="col-form-label">S. embarazo <span class="text-danger">*</span> :</label>
                            <input type="text" class="form-control" id="embarazo" name="embarazo"></input>
                            <p class="d-none"></p>
                        </div>
                        <div class="col">
                            <label for="inyeccion" class="col-form-label">Inyeccion:</label>
                            <input type="text" class="form-control" id="inyeccion" name="inyeccion"></input>
                            <p class="d-none"></p>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col">
                            <label for="curacion" class="col-form-label">Curación:</label>
                            <input type="text" class="form-control" id="curacion" name="curacion"></input>
                            <p class="d-none"></p>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label">Doctor <span class="text-danger">*</span></label>
                        <select id="doctor" name="doctor" class="form-select" aria-label="Default select example">
                            <option selected>Selecciona un doctor</option>
                            <option>Patricia Loarte Villamagua</option>
                            <option>Tetyana Sidash</option>
                            <option>Vilma Poma</option>
                            <option>Robert Lopez</option>
                            <option>Mercy Jordan Suarez</option>
                            <option>Ketty Mendoza Vargas</option>
                            <option>Amelia Castillo Espinoza</option>
                            <option>Eduardo Molina Rugel</option>
                            <option>Luis Olmedo Abril</option>
                            <option>Emma Sanchez Ramirez</option>
                            <option>Dalila Pacheco Galabay</option>
                            <option>Gabriela Concha Munoz</option>
                            <option>Marllyn Barzola Mosquera</option>
                            <option>Gerardo Niebla</option>
                            <option>Mariana Tinoco</option>
                            <option>Kennya Penaranda Niebla</option>
                            <option>Gabriela Crespo Asanza</option>
                            <option>Alexei Suardia Dorta</option>
                            <option>Karen Ochoa Cely</option>
                            <option>Jorge Martinez</option>
                            <option>Ines Mosquera Ramon</option>
                        </select>
                        <p class="d-none"></p>
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label">Enfermera <span class="text-danger">*</span></label>
                        <select id="enfermera" name="enfermera" class="form-select" aria-label="Default select example">
                            <option selected>Selecciona una enfermera</option>
                            <option>Mercy Jordan Suarez</option>
                            <option>Ketty Mendoza Vargas</option>
                            <option>Amelia Castillo Espinoza</option>
                            <option>Eduardo Molina Rugel</option>
                        </select>
                        <p class="d-none"></p>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="btn-close" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button id="btn-save" type="button" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>
