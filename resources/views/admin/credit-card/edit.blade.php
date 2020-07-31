@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.credit-card.actions.edit', ['name' => $creditCard->id]))

@section('body')

<div class="container-xl">
    <div class="card">

        <credit-card-form :action="'{{ $creditCard->resource_url }}'" :data="{{ $creditCard->toJson() }}"
            :liabilities="{{ $liabilities->toJson() }}" :payment_methods="{{$payment_methods->toJson()}}"
            :card_programs="{{$card_programs->toJson()}}" :customers="{{$customers->toJson()}}"
            :countries="{{$countries->toJson()}}" v-cloak inline-template>

            <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action"
                novalidate>


                <div class="card-header">
                    <i class="fa fa-pencil"></i>
                    {{ trans('admin.credit-card.actions.edit', ['name' => $creditCard->id]) }}
                </div>

                <div class="card-body">
                    @include('admin.credit-card.components.form-elements')
                </div>


                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" :disabled="submiting">
                        <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                        {{ trans('brackets/admin-ui::admin.btn.save') }}
                    </button>
                </div>

            </form>

        </credit-card-form>

    </div>

</div>

@endsection
