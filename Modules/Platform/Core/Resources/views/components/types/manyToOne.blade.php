@if($entity->$fieldName != null  )
    @if(isset($options['dont_translate']))
        {{
                    optional($entity->{$options['relation']})->{$options['column']}
        }}
    @else
        {{
            optional($entity->{$options['relation']})->{$options['column']}
        }}
    @endif
@endif
