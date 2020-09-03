@csrf

<h1 class="display-5"> Datos Generales</h1>


<div class="row mx-auto py-1 form-group">

  <label for="PICTUREOWNER" class="col-12 control-label">
    <div class="col-12 py-1">
      <img width="150px" src="{{ asset('storage/'.$owner->avatarOwner) }}">
    </div>
    
    <div class="col-12">
        <input type="file" name="avatarOwner" id="PICTUREOWNER"
        class="@error('avatarOwner') is-invalid
                @enderror">

        @error('avatarOwner')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

  </label>

</div>

{{-- Id, tipoId, fecha --}}

<div class="row mx-auto py-1">

  <div class="col-12 col-md-6 ">
    <label for="NUMIDT">Identificación<span class="star">*</span>:</label>
    <input class="form-control text-center form-control-sm
                @error('doc_id') is-invalid
                @enderror"
            type="number" name="doc_id"
            value="{{ old('doc_id',$owner->doc_id)}}"
            onkeyup="javascript:this.value=this.value.toUpperCase();">

            @error('doc_id')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
  </div>

{{-- Telefono --}}

  <div class="col-12 col-md-6">
    <label for="TELEFONO">Telefono<span class="star">*</span>:</label>
    <input type="number" class="form-control form-control-sm text-center
        @error('phone') is-invalid
        @enderror"
    id="TELEFONO" name="phone"
    value="{{old('phone',$owner->phone)}}"
    onkeyup="javascript:this.value=this.value.toUpperCase();">

    @error('phone')
    <span class="invalid-feedback" role="alert">
      <strong>{{$message}}</strong>
    </span>
    @enderror
  </div>


  {{-- Nombres --}}
    <div class="col-12 col-md-6">
      <label for="NAME">Nombres<span class="star">*</span>:</label>
      <input type="text" class="form-control text-center form-control-sm
              @error('name') is-invalid
              @enderror"
              name="name" id="NAME"
              value="{{old('name',$owner->name)}}"
              onkeyup="javascript:this.value=this.value.toUpperCase();">

              @error('name')
              <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
              </span>
              @enderror
    </div>

    {{-- Apellidos --}}

  <div class="col-12 col-md-6">
    <label for="LASTNAME">Apellidos<span class="star">*</span>:</label>
    <input type="text" class="form-control text-center form-control-sm
            @error('last_name') is-invalid
            @enderror"
            name="last_name" id="LASTNAME"
            value="{{old('last_name',$owner->last_name)}}"
            onkeyup="javascript:this.value=this.value.toUpperCase();">

            @error('last_name')
            <span class="invalid-feedback" role="alert">
              <strong>{{$message}}</strong>
            </span>
            @enderror
  </div>

</div>


<hr> {{-- Separador --}}

{{-- Botones --}}

@include('partial.funcional.ButtonstoForms')