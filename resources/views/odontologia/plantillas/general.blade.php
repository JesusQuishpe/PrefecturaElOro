<div class="main">
  <h2>INFORMACIÓN GENERAL</h2>
    <!--<section>
      <h5>RANGO DE EDAD</h5>
      <select name="" id="sel_rango">
        <option>MENOR DE 1 AÑO</option>
        <option>1-4 AÑOS</option>
        <option>5-9 AÑOS PROGRAMADO</option>
        <option>5-14 AÑOS NO PROGRAMADO</option>
        <option>15-19 AÑOS</option>
        <option>20-34 AÑOS</option>
        <option>35-49 AÑOS</option>
        <option>50-64 AÑOS</option>
        <option>65 +</option>
      </select>
    </section>
    <section>
      <h5>MOTIVO DE LA CONSULTA</h5>
      <textarea name="" id="ta_motivo"></textarea>
    </section>

    <section>
      <h5>ENFERMEDAD O PROBLEMA ACTUAL</h5>
      <textarea name="" id="ta_enfermedad"></textarea>
    </section>-->

    <section>
      <h5>ANTECEDENTES PERSONALES Y FAMILIARES</h5>
      <div class="flex-container">
        <div class="subcontainer">
          <h5>Describir los antecedentes</h5>
          <textarea name="" id="ta_antecedentes"></textarea>
        </div>
        <div class="subcontainer">
          <h5>Seleccione los antecedentes</h5>
          <div id="check-antecedentes" class="check-container">
            @foreach ($antecedentes as $ant)
              <div class="check-flex">
                <input type="checkbox" id={{$ant->id."-ant"}} value={{$ant->id}} class="check" />
                <label for={{$ant->id."-ant"}}>{{$ant->nombre}}</label>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </section>

    <section>
      <h5>EXAMEN DEL SISTEMA ESTOMATOGMÁTICO</h5>
      <div class="flex-container">
        <div class="subcontainer">
          <h5>Describir la patología</h5>
          <textarea id="ta_patologia"></textarea>
        </div>
        <div class="subcontainer">
          <h5>Seleccione una patología</h5>
          <div id="check-patologias" class="check-container">
            @foreach ($patologias as $pat)
              <div class="check-flex">
                <input type="checkbox" id={{$pat->id."-pat"}} value={{$pat->id}} class="check" />
                <label for={{$pat->id."-pat"}}>{{$pat->nombre}}</label>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </section>
    
</div>
