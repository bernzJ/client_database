<div class="card">
    <div class="mt-5"></div>
    <div class="card-block">
        <div class="form-group row align-items-center">
            <label for="name"
                class="col-form-label text-md-right col-md-2">{{ trans('admin.customer.columns.name') }}</label>
            <div class="col-md-9 col-xl-8">
                <input type="text" class="form-control" id="name" name="name"
                    placeholder="{{ trans('admin.customer.columns.name') }}">
            </div>
        </div>

        <div class="form-group row align-items-center">
            <label for="timezone"
                class="col-form-label text-md-right col-md-2">{{ trans('admin.customer.columns.timezone_id') }}</label>
            <div class="col-md-9 col-xl-8">
                <multiselect :options="[{'id':0,name:'test'}]" :multiple="false" track-by="id" label="name"
                    tag-placeholder="{{ __('Select Timezone') }}" placeholder="{{ __('Timezone') }}">
                </multiselect>
            </div>
        </div>

        <div class="form-group row align-items-center">
            <span class="col-md-2"></span>
            <div class="col-md-4 col-xl-4">
                <label for="country"
                    class="col-form-label text-md-right">{{ trans('admin.customer.columns.country_id') }}</label>

                <multiselect :options="[{'id':0,name:'test'}]" :multiple="false" track-by="id" label="name"
                    tag-placeholder="{{ __('Select Country') }}" placeholder="{{ __('Country') }}">
                </multiselect>
            </div>
            <div class="col-md-4 col-xl-4">
                <label for="country"
                    class="col-form-label text-md-right">{{ trans('admin.customer.columns.country_id') }}</label>
                <multiselect :options="[{'id':0,name:'test'}]" :multiple="false" track-by="id" label="name"
                    tag-placeholder="{{ __('Select State') }}" placeholder="{{ __('State') }}">
                </multiselect>
            </div>
        </div>

        <div class="form-group row align-items-center">
            <span class="col-md-2"></span>
            <div class="col-md-4 col-xl-4">
                <label for="city"
                    class="col-form-label text-md-right">{{ trans('admin.customer.columns.city') }}</label>
                <input type="text" class="form-control" id="city" name="city"
                    placeholder="{{ trans('admin.customer.columns.city') }}">
            </div>
            <div class="col-md-4 col-xl-4">
                <label for="zip" class="col-form-label text-md-right">{{ trans('admin.customer.columns.zip') }}</label>
                <input type="text" class="form-control" id="zip" name="zip"
                    placeholder="{{ trans('admin.customer.columns.zip') }}">
            </div>
        </div>

        <div class="form-group row align-items-center">
            <span class="col-md-2"></span>
            <div class="col-md-4 col-xl-4">
                <label for="address_1"
                    class="col-form-label text-md-right">{{ trans('admin.customer.columns.address_1') }}</label>
                <input type="text" class="form-control" id="address_1" name="address_1"
                    placeholder="{{ trans('admin.customer.columns.address_1') }}">
            </div>
            <div class="col-md-4 col-xl-4">
                <label for="address_2"
                    class="col-form-label text-md-right">{{ trans('admin.customer.columns.address_2') }}</label>
                <input type="text" class="form-control" id="address_2" name="address_2"
                    placeholder="{{ trans('admin.customer.columns.address_2') }}">
            </div>
        </div>

    </div>

</div>
