<h2>@lang('tickets::tickets.pdf.company')</h2>
{{ $entity->from_company }} <br/>
@if(!empty($entity->from_tax_number))
    @lang('tickets::tickets.pdf.tax_number'): {{ $entity->from_tax_number }} <br/>
@endif
{{ $entity->from_street }}<br />
{{ $entity->from_city }} {{ $entity->from_state }} {{ $entity->from_zip_code }} <br />
{{ optional($entity->fromCountry)->name }}
