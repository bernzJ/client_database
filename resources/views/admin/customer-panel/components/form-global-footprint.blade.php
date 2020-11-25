<div class="card">
    <div class="mt-5"></div>
    <div class="card-block">
        <div class="form-group row align-items-center">
            <label for="reimbursement"
                class="col-form-label text-md-right col-md-2">{{ trans('admin.global-footprint.columns.reimbursement_id') }}</label>
            <div class="col-md-9 col-xl-8">
                <multiselect :options="[{'id':0,name:'test'}]" :multiple="false" track-by="id" label="name"
                    tag-placeholder="{{ __('Select Reimbursement') }}" placeholder="{{ __('Reimbursement') }}">
                </multiselect>
            </div>
        </div>

        <div class="form-group row align-items-center">
            <label for="country"
                class="col-form-label text-md-right col-md-2">{{ trans('admin.global-footprint.columns.country') }}</label>
            <div class="col-md-9 col-xl-8">

                <multiselect :options="[{'id':0,name:'test'}]" :multiple="true" track-by="id" label="name"
                    tag-placeholder="{{ __('Select Countries') }}" placeholder="{{ __('Countries') }}">
                </multiselect>
            </div>
        </div>

        <div class="form-group row align-items-center">
            <label for="concur_product"
                class="col-form-label text-md-right col-md-2">{{ trans('admin.global-footprint.columns.concur_product') }}</label>
            <div class="col-md-9 col-xl-8">
                <multiselect :options="[{'id':0,name:'test'}]" :multiple="true" track-by="id" label="product"
                    tag-placeholder="{{ __('Select Concur Product') }}" placeholder="{{ __('Concur Product') }}">
                </multiselect>
            </div>
        </div>

    </div>
</div>
