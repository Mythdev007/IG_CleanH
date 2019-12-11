<!-- Right Sidebar -->
<aside id="rightsidebar" class="right-sidebar">
    <ul class="nav nav-tabs tab-nav-right" role="tablist">
        <li role="presentation" class="active"><a href="#settings"
                                                  data-toggle="tab">@lang('core::core.right_menu.settings')</a></li>
        <li role="presentation"><a href="#info" data-toggle="tab">@lang('core::core.right_menu.info')</a></li>

    </ul>
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane fade " id="info">
            <div class="info-side" style="margin: 10px;">
                <div class="card">
                    <div class="header">
                        <h2>
                            <div class="header-text">
                                Assistenza commerciale
                            </div> 
                        </h2>
                    </div>
                    <div class="body">
                        <ul class="list-group list-menu">
                            <li><i class="material-icons">phone</i><span class="icon-name">02 87.280.758</span></li>
                            <li><i class="material-icons">timelapse</i> <span class="icon-name"><span>dal Lunedì al Venerdì</span></span></li>
                            <li><i class="material-icons">schedule</i> <span class="icon-name">9.00-13.00 / 14.00-18.00</span></li>
                            <li><i class="material-icons">mail_outline</i><a class="icon-name" href="mailto:a.vacca@vaance.com">a.vacca@vaance.com</a></li>
                        </ul>
                    </div>
                </div>

                <div class="card">
                    <div class="header">
                        <h2>
                            <div class="header-text">
                                Assistenza tecnica
                            </div>
                        </h2>
                    </div>
                    <div class="body">
                        <ul class="list-group list-menu">
				    <li><i class="material-icons">phonelink_setup</i><span class="icon-name">02 87.280.718</span></li>
					<li><i class="material-icons">timelapse</i> <span class="icon-name">dal Lunedì al Venerdì</span></li>
                    <li><i class="material-icons">schedule</i> <span class="icon-name">9.00-13.00 / 14.00-18.00</span></li>
                    <li><i class="material-icons">mail_outline</i><a class="icon-name" href="mailto:assistenza@vaance.net">Assistenza@vaance.net</a></li>
			        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div role="tabpanel" class="tab-pane fade in active" id="settings">
            <div class="right-menu-settings">

                <ul class="setting-list">
                    @if(Session::has('original_user'))
                        <li>
                            <a href="{{ route('account.ghost-logout') }}">
                                <i class="material-icons">people_outline</i>
                                <span>@lang('core::core.right_menu.ghost_sign_out')</span>
                            </a>
                        </li>
                    @endif
                    <li>
                        <a href="{{ route('account.index') }}">
                            <i class="material-icons">person</i>
                            <span>@lang('core::core.menu.account')</span>
                        </a>
                    </li>
                    @can('company.settings')
                        <li>
                            <a href="{{ url('/settings') }}">
                                <i class="material-icons">settings</i>
                                <span>@lang('core::core.menu.settings')</span>
                            </a>
                        </li>
                    @endcan


                    <li>
                        <a href="{{ route('notifications.index') }}">
                            <i class="material-icons">notifications</i>
                            <span>@lang('core::core.menu.notifications')</span>
                        </a>
                    </li>


                    <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <i class="material-icons">input</i>
                            <span>@lang('core::core.menu.sign_out')</span>
                        </a>
                    </li>
                </ul>

            </div>
        </div>
    </div>
</aside>
<!-- #END# Right Sidebar -->