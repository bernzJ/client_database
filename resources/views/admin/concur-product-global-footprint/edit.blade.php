@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.concur-product-global-footprint.actions.edit', ['name' => $concurProductGlobalFootprint->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <concur-product-global-footprint-form
                :action="'{{ $concurProductGlobalFootprint->resource_url }}'"
                :data="{{ $concurProductGlobalFootprint->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.concur-product-global-footprint.actions.edit', ['name' => $concurProductGlobalFootprint->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.concur-product-global-footprint.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </concur-product-global-footprint-form>

        </div>
    
</div>

@endsection