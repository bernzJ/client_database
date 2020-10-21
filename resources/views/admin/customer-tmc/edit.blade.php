@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.customer-tmc.actions.edit', ['name' => $customerTmc->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <customer-tmc-form
                :action="'{{ $customerTmc->resource_url }}'"
                :data="{{ $customerTmc->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.customer-tmc.actions.edit', ['name' => $customerTmc->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.customer-tmc.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </customer-tmc-form>

        </div>
    
</div>

@endsection