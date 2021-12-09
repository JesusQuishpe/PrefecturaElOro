<h2>EDITAR CLIENTE</h2>
<form  id="client">
    <div>
        <label>Peso</label>
        <input type="text" id="peso" value="" maxlength="6"/> Ej: 75.1
    </div>
    <div>
        <label>Estatura</label>
        <input type="text"  id="estatura" value="" maxlength="6"/> Ej: 136
    </div>
    <div>
        <label>Temperatura</label>
        <input type="text"  id="temperatura" value="" maxlength="3"/>Ej: 37.2
    </div>
    <div>
        <label>Presion</label>
        <input type="text" id="presion" value="" maxlength="7"/> Ej: 100 / 70
    </div>
    <div>
        <label>T. Respiratoria</label>
        <input type="text"  id="t_resp" value="" /> Ej: Suero..
    </div>
    <div>
        <label>Discapacidad %</label>
        <input type="text"  id="discapacidad" value="" maxlength="3"/> Ej: 70
    </div>
    <div>
        <label>S. Embarazo</label>
        <input type="text"  id="embarazo" value="" /> Ej: 15
    </div>
    <div>
        <label>Inyeccion</label>
        <input type="text"  id="inyeccion" value="" /> Ej: 1
    </div>
    <div>
        <label>Curacion</label>
        <input type="text"  id="curacion" value="" /> Ej: 1
    </div>
    <div>
        <label>Tratante</label>
        <select  id="doctor">
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

    </div>
    <div>
        <label>Enfermera</label>
        <select  id="enfermera">
            <option>Mercy Jordan Suarez</option>
            <option>Ketty Mendoza Vargas</option>
            <option>Amelia Castillo Espinoza</option>
            <option>Eduardo Molina Rugel</option>
        </select>
    </div>
    
    <div class="modal-buttons-container">
        <button id="btn-save" type="button">Guardar</button>
        <button id="btn-cancel" type="button">Cancelar</button>
    </div>
</form>