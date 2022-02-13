

<fieldset class="wrap-input">
    <label for="{{$name}}-text">{{$label}}</label>
    <input  type="{{$type}}" class="form-control @error($name) is-invalid @enderror" 
    value="{{ old($name) }}" id="{{$name}}-text" name="{{$name}}" >
<br>
    @error($name)
        <span class="invalid-feedback bg-danger" role="alert">
            <li class="alert alert-danger">{{ $message }}</li>
        </span>
    @enderror
</fieldset>
