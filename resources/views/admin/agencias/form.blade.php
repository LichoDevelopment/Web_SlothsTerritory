
<div class="form-group">
    <label for="name" class="control-label">{{'Nombre'}}</label>
    <input type="text" class="form-control" name="name" id="name" required 
    value="{{isset($agencia->name) ? $agencia->name:""}}">
</div>


<div class="form-group">
    <label for="commission" class="control-label">{{'Comision'}}</label>
    <input type="number"  class="form-control" name="commission" id="commission" required step=".01" min="0" 
        value="{{isset($agencia->commission) ? $agencia->commission:"0"}}"
    >
</div>

<div class="form-group">
    <label for="invoice" class="control-label" >{{'Factura'}}</label>
    <input type="text" class="form-control" name="invoice" id="invoice" required 
        value="{{isset($agencia->invoice) ? $agencia->invoice:"No tiene"}}"
    >
</div>


<input type="submit" class="btn btn-success" value="{{$Modo=="crear" ? "Agregar":"Modificar"}}">
<a class="btn btn-primary" href="{{ url('agencias')}}"> Regresar</a>
