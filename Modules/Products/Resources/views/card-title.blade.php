<div class="header-text">

    @if($entity->id)
        @lang($language_file.'.module') - {{  $entity->name }} - @lang('core::core.crud.details')
        <small>@lang($language_file.'.module_description')</small>
    @else
        @lang($language_file.'.module') - @lang('core::core.crud.details')
        <small>@lang($language_file.'.module_description')</small>
    @endif
</div>
