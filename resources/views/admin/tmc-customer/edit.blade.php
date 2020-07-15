@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.tmc-customer.actions.edit', ['name' => $tmcCustomer->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <tmc-customer-form
                :action="'{{ $tmcCustomer->resource_url }}'"
                :data="{{ $tmcCustomer->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.tmc-customer.actions.edit', ['name' => $tmcCustomer->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.tmc-customer.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </tmc-customer-form>

        </div>
    
</div>

@endsection