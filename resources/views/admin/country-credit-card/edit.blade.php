@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.country-credit-card.actions.edit', ['name' => $countryCreditCard->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <country-credit-card-form
                :action="'{{ $countryCreditCard->resource_url }}'"
                :data="{{ $countryCreditCard->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.country-credit-card.actions.edit', ['name' => $countryCreditCard->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.country-credit-card.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </country-credit-card-form>

        </div>
    
</div>

@endsection