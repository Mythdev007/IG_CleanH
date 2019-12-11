<a href="{{ $options['href'] }}" target="_blank">
@if(is_array($entity->$fieldName))
    {!! implode(',',$entity->$fieldName)!!}
@else
    {{ $entity->$fieldName }}
@endif
</a>
