

@lang('account::account.api_key_explanation')
<br /><br />
<pre>

   @lang('account::account.your_api_key') = "{{ auth()->user()->api_key }}"

</pre>

<a class="btn btn-primary" href="{{ route('account.generate_api_key') }}">@lang('account::account.generate_api_key') </a>
