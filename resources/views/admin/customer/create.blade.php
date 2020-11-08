@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.customer.actions.create'))

@section('body')

<div class="container-xl">


    <customer-form :action="'{{ url('admin/customers') }}'" :industries="{{$industries->toJson()}}"
        :timezones="{{$timezones->toJson()}}" :project_types="{{$project_types->toJson()}}"
        :project_scopes="{{$project_scopes->toJson()}}" :client_types="{{$client_types->toJson()}}"
        :countries="{{$countries->toJson()}}" :states="{{$states->toJson()}}"
        :concur_products="{{$concur_products->toJson()}}" :tmcs="{{$tmcs->toJson()}}" v-cloak inline-template>

        <form class="form-horizontal form-create" method="post" @submit.prevent="onSubmit" :action="action" novalidate>

            <div class="header-page">
                <i class="fa fa-plus"></i> {{ trans('admin.customer.actions.create') }}
            </div>

            @include('admin.customer.components.form-elements')

            <div class="footer-page">
                <button type="submit" class="btn btn-primary" :disabled="submiting">
                    <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                    {{ trans('brackets/admin-ui::admin.btn.save') }}
                </button>
            </div>

        </form>

    </customer-form>

</div>


@endsection
