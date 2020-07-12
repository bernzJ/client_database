<div class="form-group row align-items-center" :class="{'has-danger': errors.has('platform'), 'has-success': fields.platform && fields.platform.valid }">
    <label for="platform" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.financial.columns.platform') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.platform" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('platform'), 'form-control-success': fields.platform && fields.platform.valid}" id="platform" name="platform" placeholder="{{ trans('admin.financial.columns.platform') }}">
        <div v-if="errors.has('platform')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('platform') }}</div>
    </div>
</div>


