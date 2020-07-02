@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.payroll.actions.edit', ['name' => $payroll->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <payroll-form
                :action="'{{ $payroll->resource_url }}'"
                :data="{{ $payroll->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.payroll.actions.edit', ['name' => $payroll->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.payroll.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </payroll-form>

        </div>
    
</div>

@endsection