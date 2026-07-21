@props(
    [
        'id' ,
        'name',
        'type' => 'text',
        'value' => '',
        'placeholder' => '',
        'label' => '',
    ]
)
<label>{{ $label }}</label>
<input type= "{{$type}}" class = "form-control
@error($name) is-invalid 
@enderror
" placeholder= "{{ $placeholder }}" name = "{{$name}}" value = "{{ old($name , $value)}}">

@error($name)
<div class= "text-denger">
    {{ $message }}
</div>
@enderror