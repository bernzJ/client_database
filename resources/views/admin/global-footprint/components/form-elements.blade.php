<div class="form-group row align-items-center"
    :class="{'has-danger': errors.has('reimbursement'), 'has-success': fields.reimbursement && fields.reimbursement.valid }">
    <label for="reimbursement" class="col-form-label text-md-right"
        :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.global-footprint.columns.reimbursement') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <multiselect v-model="form.reimbursement" :options="reimbursements" :multiple="false" track-by="id" label="type"
            tag-placeholder="{{ __('Select Reimbursement') }}" placeholder="{{ __('Reimbursement') }}">
        </multiselect>
        <div v-if="errors.has('reimbursement')" class="form-control-feedback form-text" v-cloak>
            @{{ errors.first('reimbursement') }}</div>
    </div>
</div>

<div class="form-group row align-items-center"
    :class="{'has-danger': errors.has('country'), 'has-success': fields.country && fields.country.valid }">
    <label for="country" class="col-form-label text-md-right"
        :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.global-footprint.columns.country') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">

        <multiselect v-model="form.country" :options="countries" :multiple="true" track-by="id" label="name"
            tag-placeholder="{{ __('Select Countries') }}" placeholder="{{ __('Countries') }}">
        </multiselect>

        <div v-if="errors.has('country')" class="form-control-feedback form-text" v-cloak>
            @{{ errors.first('country') }}</div>
    </div>
</div>

<div class="form-group row align-items-center"
    :class="{'has-danger': errors.has('concur_product'), 'has-success': fields.concur_product && fields.concur_product.valid }">
    <label for="concur_product" class="col-form-label text-md-right"
        :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.global-footprint.columns.concur_product') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">

        <multiselect v-model="form.concur_product" :options="concur_products" :multiple="true" track-by="id"
            label="product" tag-placeholder="{{ __('Select Concur Product') }}"
            placeholder="{{ __('Concur Product') }}">
        </multiselect>
        <div v-if="errors.has('concur_product')" class="form-control-feedback form-text" v-cloak>
            @{{ errors.first('concur_product') }}</div>
    </div>
</div>
