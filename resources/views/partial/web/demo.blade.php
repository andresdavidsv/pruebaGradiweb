@extends('layouts.layout')

@section('title')
    @lang('Index')
@stop

@section('content')

<div class="card" >
  <div class="container">
    <div class="row">
      <table border="1" class="table" id="tablaprueba">
        <thead class="thead-dark">
          <tr>
            <th>date</th>
            <th>AM/PM</th>
            <th>ID</th>
            <th>Price</th>
          </tr>
        </thead>
        <tbody></tbody>
      </table>
    </div>

      <div class="row py-2">
      <div class="col-12 col-md-6">
        <button type="button" class="btn btn btn-secondary btn-lg btn-block btn-lg btn-block" onclick="agregarFila()">Agregar Fila</button>
      </div>
      <div class="col-12 col-md-6">
        <button type="button" class="btn btn btn-danger btn-lg btn-block btn-lg btn-block" onclick="eliminarFila()">Eliminar Fila</button>
      </div>
      </div>
  </div>
</div>

<script>
  function agregarFila(){
  document.getElementById("tableDynamic").insertRow(-1).innerHTML = '<td><input type="date"></td>
  <td><input type="text"></td>
  <td><input type="text"></td>
  <td><input type="number"></td>';
}

function eliminarFila(){
  var table = document.getElementById("tableDynamic");
  var rowCount = table.rows.length;
  
  if(rowCount <= 1)
    alert('No se puede eliminar el encabezado');
  else
    table.deleteRow(rowCount -1);
}
</script>

@endsection