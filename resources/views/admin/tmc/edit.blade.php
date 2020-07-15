@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.tmc.actions.edit', ['name' => $tmc->name]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <tmc-form
                :action="'{{ $tmc->resource_url }}'"
                :data="{{ $tmc->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.tmc.actions.edit', ['name' => $tmc->name]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.tmc.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </tmc-form>

        </div>
    
</div>

@endsection