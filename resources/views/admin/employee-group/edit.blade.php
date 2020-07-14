@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.employee-group.actions.edit', ['name' => $employeeGroup->name]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <employee-group-form
                :action="'{{ $employeeGroup->resource_url }}'"
                :data="{{ $employeeGroup->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.employee-group.actions.edit', ['name' => $employeeGroup->name]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.employee-group.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </employee-group-form>

        </div>
    
</div>

@endsection