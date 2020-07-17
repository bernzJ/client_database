@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.global-footprint.actions.edit', ['name' => $globalFootprint->id]))

@section('body')

<div class="container-xl">
    <div class="card">

        <global-footprint-form :action="'{{ $globalFootprint->resource_url }}'" :data="{{ $globalFootprint->toJson() }}"
            :reimbursements="{{ $reimbursements->toJson() }}" :countries="{{ $countries->toJson() }}"
            :concur_products="{{ $concur_products->toJson() }}" v-cloak inline-template>

            <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action"
                novalidate>


                <div class="card-header">
                    <i class="fa fa-pencil"></i>
                    {{ trans('admin.global-footprint.actions.edit', ['name' => $globalFootprint->id]) }}
                </div>

                <div class="card-body">
                    @include('admin.global-footprint.components.form-elements')
                </div>


                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" :disabled="submiting">
                        <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                        {{ trans('brackets/admin-ui::admin.btn.save') }}
                    </button>
                </div>

            </form>

        </global-footprint-form>

    </div>

</div>

@endsection
