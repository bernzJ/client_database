<div class="form-group row align-items-center" :class="{'has-danger': errors.has('global_footprint_id'), 'has-success': fields.global_footprint_id && fields.global_footprint_id.valid }">
    <label for="global_footprint_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.country-global-footprint.columns.global_footprint_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.global_footprint_id" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('global_footprint_id'), 'form-control-success': fields.global_footprint_id && fields.global_footprint_id.valid}" id="global_footprint_id" name="global_footprint_id" placeholder="{{ trans('admin.country-global-footprint.columns.global_footprint_id') }}">
        <div v-if="errors.has('global_footprint_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('global_footprint_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('country_id'), 'has-success': fields.country_id && fields.country_id.valid }">
    <label for="country_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.country-global-footprint.columns.country_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.country_id" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('country_id'), 'form-control-success': fields.country_id && fields.country_id.valid}" id="country_id" name="country_id" placeholder="{{ trans('admin.country-global-footprint.columns.country_id') }}">
        <div v-if="errors.has('country_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('country_id') }}</div>
    </div>
</div>


