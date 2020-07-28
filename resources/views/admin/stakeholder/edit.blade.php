@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.stakeholder.actions.edit', ['name' => $stakeholder->name]))

@section('body')

<div class="container-xl">
    <div class="card">

        <stakeholder-form :action="'{{ $stakeholder->resource_url }}'" :data="{{ $stakeholder->toJson() }}"
            :customers="{{ $customers->toJson() }}" :timezones="{{ $timezones->toJson() }}"
            :contact_methods="{{ $contact_methods->toJson() }}" v-cloak inline-template>

            <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action"
                novalidate>


                <div class="card-header">
                    <i class="fa fa-pencil"></i>
                    {{ trans('admin.stakeholder.actions.edit', ['name' => $stakeholder->name]) }}
                </div>

                <div class="card-body">
                    @include('admin.stakeholder.components.form-elements')
                </div>


                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" :disabled="submiting">
                        <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                        {{ trans('brackets/admin-ui::admin.btn.save') }}
                    </button>
                </div>

            </form>

        </stakeholder-form>

    </div>

</div>

@endsection
