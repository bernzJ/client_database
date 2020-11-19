@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.country-global-footprint.actions.edit', ['name' => $countryGlobalFootprint->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <country-global-footprint-form
                :action="'{{ $countryGlobalFootprint->resource_url }}'"
                :data="{{ $countryGlobalFootprint->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.country-global-footprint.actions.edit', ['name' => $countryGlobalFootprint->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.country-global-footprint.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </country-global-footprint-form>

        </div>
    
</div>

@endsection