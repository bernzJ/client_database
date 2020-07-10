<div class="form-group row align-items-center" :class="{'has-danger': errors.has('product'), 'has-success': fields.product && fields.product.valid }">
    <label for="product" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.concur-product.columns.product') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.product" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('product'), 'form-control-success': fields.product && fields.product.valid}" id="product" name="product" placeholder="{{ trans('admin.concur-product.columns.product') }}">
        <div v-if="errors.has('product')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('product') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('segment_id'), 'has-success': fields.segment_id && fields.segment_id.valid }">
    <label for="segment_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.concur-product.columns.segment_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.segment_id" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('segment_id'), 'form-control-success': fields.segment_id && fields.segment_id.valid}" id="segment_id" name="segment_id" placeholder="{{ trans('admin.concur-product.columns.segment_id') }}">
        <div v-if="errors.has('segment_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('segment_id') }}</div>
    </div>
</div>


