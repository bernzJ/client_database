@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.card-program.actions.edit', ['name' => $cardProgram->name]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <card-program-form
                :action="'{{ $cardProgram->resource_url }}'"
                :data="{{ $cardProgram->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.card-program.actions.edit', ['name' => $cardProgram->name]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.card-program.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </card-program-form>

        </div>
    
</div>

@endsection