
<div class="form-group">
    <label for="nombre" class="control-label">{{'Nombre'}}</label>
    <input type="text" class="form-control" name="nombre" id="nombre" required 
    value="{{isset($agencia->nombre) ? $agencia->nombre:""}}">
</div>


<div class="form-group">
    <label for="comision" class="control-label">{{'Comision'}}</label>
    <input type="number"  class="form-control" name="comision" id="comision" required step=".01" min="0" 
        value="{{isset($agencia->comision) ? $agencia->comision:"0"}}"
    >
</div>

{{-- <div class="form-group">
    <label for="invoice" class="control-label" >{{'Factura'}}</label>
    <input type="text" class="form-control" name="invoice" id="invoice" required 
        value="{{isset($agencia->invoice) ? $agencia->invoice:"No tiene"}}"
    >
</div> --}}


<input type="submit" class="btn btn-success" value="{{$Modo=="crear" ? "Agregar":"Modificar"}}">
<a class="btn btn-primary" href="{{ url('agencias')}}"> Regresar</a>
