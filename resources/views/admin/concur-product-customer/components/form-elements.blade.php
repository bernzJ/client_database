<div class="form-group row align-items-center" :class="{'has-danger': errors.has('concur_product_id'), 'has-success': fields.concur_product_id && fields.concur_product_id.valid }">
    <label for="concur_product_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.concur-product-customer.columns.concur_product_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.concur_product_id" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('concur_product_id'), 'form-control-success': fields.concur_product_id && fields.concur_product_id.valid}" id="concur_product_id" name="concur_product_id" placeholder="{{ trans('admin.concur-product-customer.columns.concur_product_id') }}">
        <div v-if="errors.has('concur_product_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('concur_product_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('customer_id'), 'has-success': fields.customer_id && fields.customer_id.valid }">
    <label for="customer_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.concur-product-customer.columns.customer_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.customer_id" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('customer_id'), 'form-control-success': fields.customer_id && fields.customer_id.valid}" id="customer_id" name="customer_id" placeholder="{{ trans('admin.concur-product-customer.columns.customer_id') }}">
        <div v-if="errors.has('customer_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('customer_id') }}</div>
    </div>
</div>


