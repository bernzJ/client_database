<div class="form-group row align-items-center"
    :class="{'has-danger': errors.has('product'), 'has-success': fields.product && fields.product.valid }">
    <label for="product" class="col-form-label text-md-right"
        :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.concur-product.columns.product') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.product" v-validate="'required'" @input="validate($event)" class="form-control"
            :class="{'form-control-danger': errors.has('product'), 'form-control-success': fields.product && fields.product.valid}"
            id="product" name="product" placeholder="{{ trans('admin.concur-product.columns.product') }}">
        <div v-if="errors.has('product')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('product') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
    :class="{'has-danger': errors.has('segment'), 'has-success': fields.segment && fields.segment.valid }">
    <label for="segment" class="col-form-label text-md-right"
        :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.concur-product.columns.segment') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">

        <multiselect v-model="form.segment" :options="segments" :multiple="false" track-by="id" label="name"
            tag-placeholder="{{ __('Select Segment') }}" placeholder="{{ __('Segment') }}">
        </multiselect>
        <div v-if="errors.has('segment')" class="form-control-feedback form-text" v-cloak>
            @{{ errors.first('segment') }}</div>
    </div>
</div>
