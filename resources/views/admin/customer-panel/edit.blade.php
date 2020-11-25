@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.customer-panel.actions.edit', ['name' => $customerPanel->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <customer-panel-form
                :action="'{{ $customerPanel->resource_url }}'"
                :data="{{ $customerPanel->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.customer-panel.actions.edit', ['name' => $customerPanel->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.customer-panel.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </customer-panel-form>

        </div>
    
</div>

@endsection