<div class="main">
  <h2>DIAGNÓSTICOS</h2>
  <section>
    <h5>PLANES DE DIAGNÓSTICO, TERAPEUTICO Y EDUCACIONAL</h5>
    <div class="flex-container">
      <div class="subcontainer disabled">
        <h5>En caso de seleccionar "Otros"</h5>
        <textarea name="" id="ta_plan" cols="30" rows="5"></textarea>
      </div>
      <div class="subcontainer">
        <h5>Seleccione un plan</h5>
        <div id="radio-container-plan" class="radio-container">
          @foreach ($planes as $plan)
          <div class="check-flex">
            <input type="radio" id={{$plan->id."-plan"}} value={{$plan->id}} name="grupo-plan" />
            <label for={{$plan->id."-plan"}}>{{$plan->nombre}}</label>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </section>
  <section>
    <div class="pre-container">
      <span>PRE: PRESUNTIVO</span>
      <span>DEF: DEFINITIVO</span>
    </div>
  </section>
  <section>
    <div class="tb-diag-container">
      <div class="actions-container">
        <button id="btn-nuevo-diag" class="btn">Nuevo</button>
        <button id="btn-edit-diag" class="btn">Editar</button>
        <button id="btn-elim-diag" class="btn">Eliminar</button>
      </div>
      <table id="tb-diag">
        <thead>
          <tr>
            <th>Diagnóstico</th>
            <th>CIE</th>
            <th>Tipo</th>
          </tr>
        </thead>
        <tbody>
          
        </tbody>
      </table>
    </div>
  </section>
</div>
