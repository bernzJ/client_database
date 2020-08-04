<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">

            <li class="nav-title">{{ trans('brackets/admin-ui::admin.sidebar.content') }}</li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/dashboards') }}"><i
                        class="nav-icon icon-compass"></i> {{ trans('admin.dashboard.title') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/customers') }}"><i
                        class="nav-icon icon-puzzle"></i> {{ trans('admin.customer.title') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/notes') }}"><i class="nav-icon icon-star"></i>
                    {{ trans('admin.note.title') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/concur-products') }}"><i
                        class="nav-icon icon-compass"></i> {{ trans('admin.concur-product.title') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/credit-cards') }}"><i
                        class="nav-icon icon-magnet"></i> {{ trans('admin.credit-card.title') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/global-footprints') }}"><i
                        class="nav-icon icon-puzzle"></i> {{ trans('admin.global-footprint.title') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/stakeholders') }}"><i
                        class="nav-icon icon-compass"></i> {{ trans('admin.stakeholder.title') }}</a></li>


            @role('Administrator')
            <li class="nav-title">{{ trans('brackets/admin-ui::admin.sidebar.admin') }}</li>

            <li class="nav-item"><a class="nav-link" href="{{ url('admin/client-types') }}"><i
                        class="nav-icon icon-diamond"></i> {{ trans('admin.client-type.title') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/timezones') }}"><i
                        class="nav-icon icon-puzzle"></i> {{ trans('admin.timezone.title') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/industries') }}"><i
                        class="nav-icon icon-compass"></i> {{ trans('admin.industry.title') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/project-types') }}"><i
                        class="nav-icon icon-plane"></i> {{ trans('admin.project-type.title') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/financials') }}"><i
                        class="nav-icon icon-magnet"></i> {{ trans('admin.financial.title') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/hrs') }}"><i class="nav-icon icon-globe"></i>
                    {{ trans('admin.hr.title') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/countries') }}"><i
                        class="nav-icon icon-drop"></i> {{ trans('admin.country.title') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/employee-groups') }}"><i
                        class="nav-icon icon-graduation"></i> {{ trans('admin.employee-group.title') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/liabilities') }}"><i
                        class="nav-icon icon-globe"></i> {{ trans('admin.liability.title') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/card-programs') }}"><i
                        class="nav-icon icon-plane"></i> {{ trans('admin.card-program.title') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/states') }}"><i
                        class="nav-icon icon-graduation"></i> {{ trans('admin.state.title') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/segments') }}"><i
                        class="nav-icon icon-drop"></i> {{ trans('admin.segment.title') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/tmcs') }}"><i
                        class="nav-icon icon-umbrella"></i> {{ trans('admin.tmc.title') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/tmc-customers') }}"><i
                        class="nav-icon icon-drop"></i> {{ trans('admin.tmc-customer.title') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/payment-methods') }}"><i
                        class="nav-icon icon-puzzle"></i> {{ trans('admin.payment-method.title') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/concur-product-customers') }}"><i
                        class="nav-icon icon-graduation"></i> {{ trans('admin.concur-product-customer.title') }}</a>
            </li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/reimbursements') }}"><i
                        class="nav-icon icon-diamond"></i> {{ trans('admin.reimbursement.title') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/global-footprint-countries') }}"><i
                        class="nav-icon icon-compass"></i> {{ trans('admin.global-footprint-country.title') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/contact-methods') }}"><i
                        class="nav-icon icon-puzzle"></i> {{ trans('admin.contact-method.title') }}</a></li>
            @endrole

            {{-- Do not delete me :) I'm used for auto-generation menu items --}}

            <li class="nav-title">{{ trans('brackets/admin-ui::admin.sidebar.settings') }}</li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/admin-users') }}"><i
                        class="nav-icon icon-user"></i> {{ __('Manage access') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/translations') }}"><i
                        class="nav-icon icon-location-pin"></i> {{ __('Translations') }}</a></li>
            {{-- Do not delete me :) I'm also used for auto-generation menu items --}}
            {{--<li class="nav-item"><a class="nav-link" href="{{ url('admin/configuration') }}"><i
                class="nav-icon icon-settings"></i> {{ __('Configuration') }}</a></li>--}}
        </ul>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
