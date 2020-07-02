@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.fiscal-year.actions.edit', ['name' => $fiscalYear->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <fiscal-year-form
                :action="'{{ $fiscalYear->resource_url }}'"
                :data="{{ $fiscalYear->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.fiscal-year.actions.edit', ['name' => $fiscalYear->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.fiscal-year.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </fiscal-year-form>

        </div>
    
</div>

@endsection