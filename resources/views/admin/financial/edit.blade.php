@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.financial.actions.edit', ['name' => $financial->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <financial-form
                :action="'{{ $financial->resource_url }}'"
                :data="{{ $financial->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.financial.actions.edit', ['name' => $financial->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.financial.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </financial-form>

        </div>
    
</div>

@endsection