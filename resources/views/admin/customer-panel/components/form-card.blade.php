<div class="card">
    <div class="mt-5"></div>
    <div class="card-block">

        <div class="form-group row align-items-center">
            <label for="credit_card_id"
                class="col-form-label text-md-right col-md-2">{{ trans('admin.country-credit-card.columns.credit_card_id') }}</label>
            <div class="col-md-9 col-xl-8">
                <input type="text" class="form-control" id="credit_card_id" name="credit_card_id"
                    placeholder="{{ trans('admin.country-credit-card.columns.credit_card_id') }}">
            </div>
        </div>

        <div class="form-group row align-items-center">
            <label for="country_id"
                class="col-form-label text-md-right col-md-2">{{ trans('admin.country-credit-card.columns.country_id') }}</label>
            <div class="col-md-9 col-xl-8">
                <multiselect :options="[{'id':0,name:'test'}]" :multiple="false" track-by="id" label="name"
                    tag-placeholder="{{ __('Select Country') }}" placeholder="{{ __('Country') }}">
                </multiselect>
            </div>
        </div>

    </div>
</div>
