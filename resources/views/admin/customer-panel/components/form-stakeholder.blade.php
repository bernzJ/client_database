<div class="card">
    <div class="mt-5"></div>
    <div class="card-block">

        <div class="form-group row align-items-center">
            <label for="role"
                class="col-form-label text-md-right col-md-2">{{ trans('admin.stakeholder.columns.role') }}</label>
            <div class="col-md-9 col-xl-8">
                <input type="text" class="form-control" id="role" name="role"
                    placeholder="{{ trans('admin.stakeholder.columns.role') }}">
            </div>
        </div>

        <div class="form-group row align-items-center">
            <label for="name"
                class="col-form-label text-md-right col-md-2">{{ trans('admin.stakeholder.columns.name') }}</label>
            <div class="col-md-9 col-xl-8">
                <input type="text" class="form-control" id="name" name="name"
                    placeholder="{{ trans('admin.stakeholder.columns.name') }}">
            </div>
        </div>

        <div class="form-group row align-items-center">
            <label for="email"
                class="col-form-label text-md-right col-md-2">{{ trans('admin.stakeholder.columns.email') }}</label>
            <div class="col-md-9 col-xl-8">
                <input type="text" class="form-control" id="email" name="email"
                    placeholder="{{ trans('admin.stakeholder.columns.email') }}">

            </div>
        </div>

        <div class="form-group row align-items-center">
            <label for="phone"
                class="col-form-label text-md-right col-md-2">{{ trans('admin.stakeholder.columns.phone') }}</label>
            <div class="col-md-9 col-xl-8">
                <input type="text" class="form-control" id="phone" name="phone"
                    placeholder="{{ trans('admin.stakeholder.columns.phone') }}">
            </div>
        </div>

        <div class="form-group row align-items-center">
            <label for="contact_method"
                class="col-form-label text-md-right col-md-2">{{ trans('admin.stakeholder.columns.contact_method_id') }}</label>
            <div class="col-md-9 col-xl-8">
                <multiselect :options="[{'id':0,name:'test'}]" :multiple="false" track-by="id" label="name"
                    tag-placeholder="{{ __('Select Contact Method') }}" placeholder="{{ __('Contact Method') }}">
                </multiselect>
            </div>
        </div>

        <div class="form-group row align-items-center">
            <label for="timezone"
                class="col-form-label text-md-right col-md-2">{{ trans('admin.stakeholder.columns.timezone_id') }}</label>
            <div class="col-md-9 col-xl-8">
                <multiselect :options="[{'id':0,name:'test'}]" :multiple="false" track-by="id" label="name"
                    tag-placeholder="{{ __('Select Timezone') }}" placeholder="{{ __('Timezone') }}">
                </multiselect>
            </div>
        </div>

        <div class="form-group row align-items-center">
            <label for="customer"
                class="col-form-label text-md-right col-md-2">{{ trans('admin.stakeholder.columns.customer_id') }}</label>
            <div class="col-md-9 col-xl-8">

                <multiselect :options="[{'id':0,name:'test'}]" :multiple="false" track-by="id" label="name"
                    tag-placeholder="{{ __('Select Customer') }}" placeholder="{{ __('Customer') }}">
                </multiselect>
            </div>
        </div>

    </div>
</div>
