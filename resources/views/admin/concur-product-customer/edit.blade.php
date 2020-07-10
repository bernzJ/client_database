@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.concur-product-customer.actions.edit', ['name' => $concurProductCustomer->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <concur-product-customer-form
                :action="'{{ $concurProductCustomer->resource_url }}'"
                :data="{{ $concurProductCustomer->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.concur-product-customer.actions.edit', ['name' => $concurProductCustomer->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.concur-product-customer.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </concur-product-customer-form>

        </div>
    
</div>

@endsection