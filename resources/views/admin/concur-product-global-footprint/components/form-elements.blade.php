<div class="form-group row align-items-center" :class="{'has-danger': errors.has('global_footprint_id'), 'has-success': fields.global_footprint_id && fields.global_footprint_id.valid }">
    <label for="global_footprint_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.concur-product-global-footprint.columns.global_footprint_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.global_footprint_id" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('global_footprint_id'), 'form-control-success': fields.global_footprint_id && fields.global_footprint_id.valid}" id="global_footprint_id" name="global_footprint_id" placeholder="{{ trans('admin.concur-product-global-footprint.columns.global_footprint_id') }}">
        <div v-if="errors.has('global_footprint_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('global_footprint_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('concur_product_id'), 'has-success': fields.concur_product_id && fields.concur_product_id.valid }">
    <label for="concur_product_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.concur-product-global-footprint.columns.concur_product_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.concur_product_id" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('concur_product_id'), 'form-control-success': fields.concur_product_id && fields.concur_product_id.valid}" id="concur_product_id" name="concur_product_id" placeholder="{{ trans('admin.concur-product-global-footprint.columns.concur_product_id') }}">
        <div v-if="errors.has('concur_product_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('concur_product_id') }}</div>
    </div>
</div>


