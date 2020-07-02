@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.frequency.actions.edit', ['name' => $frequency->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <frequency-form
                :action="'{{ $frequency->resource_url }}'"
                :data="{{ $frequency->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.frequency.actions.edit', ['name' => $frequency->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.frequency.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </frequency-form>

        </div>
    
</div>

@endsection