@csrf

<h1 class="display-5"> Datos Generales</h1>


<div class="row mx-auto py-1 form-group">

  <label for="PICTURECAR" class="col-12 control-label">
    Foto Vehiculo:
    <div class="col-12 py-1">
      <img width="150px" src="{{ asset('storage/'.$car->avatarCar) }}">
    </div>
    
    <div class="col-12">
        {{-- <input type="file" name="avatarCar" id="PICTURECAR"
        class="@error('avatarCar') is-invalid
                @enderror"> --}}
        <input type="file" name="avatarCar" id="PICTURECAR"
        class="@error('avatarCar') is-invalid
                @enderror">

        @error('avatarCar')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

  </label>

</div>

{{-- Placa, Tarjeta de Propiedad, Configuracion y Color --}}

<div class="row mx-auto py-1">

  <div class="col-12 col-md-4 ">
    <label for="VEHPLACA">Placa<span class="star">*</span>:</label>
    <input class="form-control text-center form-control-sm
                @error('plate') is-invalid
                @enderror"
            type="text" name="plate"
            value="{{ old('plate',$car->plate)}}"
            onkeyup="javascript:this.value=this.value.toUpperCase();">

            @error('plate')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror

  </div>

  <div class="col-12 col-md-4 ">
    <label for="BRAND">MARCA<span class="star">*</span>:</label>
    <input class="form-control text-center form-control-sm
                @error('car_brand') is-invalid
                @enderror"
            type="text" name="car_brand"
            value="{{ old('car_brand',$car->car_brand)}}"
            onkeyup="javascript:this.value=this.value[0].toUpperCase() + this.value.toLowerCase() ;">
            @error('car_brand')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
  </div>

  <div class="col-12 col-md-4 ">
    <label for="CONFIG">TIPO DE VEHICULO<span class="star">*</span>:</label>
    <input class="form-control text-center form-control-sm
                @error('car_config') is-invalid
                @enderror"
            type="text" name="car_config"
            value="{{ old('car_config',$car->car_config)}}"
            onkeyup="javascript:this.value=this.value.toUpperCase();">

            @error('car_config')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
  </div>

</div>

<hr>

<h1 class="display-5">Propietario</h1>
{{-- Propietario--}}
<div class="row mx-auto py-1">

  <div class="col-12 ">
    <label for="NUMIDOWNER">Propietario<span class="star">*</span>:</label>
    <select class="form-control text-center form-control-sm
        @error('owner_id') is-invalid
        @enderror"
      type="number" name="owner_id"
      id="NUMIDOWNER"
      data-live-search="true">

        <option value=" ">Seleccione el propietario</option>
        @foreach ($owner_id as $owner)

          <option value="{{$owner->id}}"
            {{old('owner_id', $car->owner_id) == $owner->id ? 'selected' : ''}}>
            Cedula: {{$owner->doc_id}} -> {{$owner->name}} {{$owner->last_name}}
          </option>

        @endforeach

    </select>

</div>

{{-- Botones --}}

@include('partial.funcional.ButtonstoForms')