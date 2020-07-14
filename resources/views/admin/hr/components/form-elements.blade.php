<div class="form-group row align-items-center" :class="{'has-danger': errors.has('system'), 'has-success': fields.system && fields.system.valid }">
    <label for="system" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.hr.columns.system') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.system" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('system'), 'form-control-success': fields.system && fields.system.valid}" id="system" name="system" placeholder="{{ trans('admin.hr.columns.system') }}">
        <div v-if="errors.has('system')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('system') }}</div>
    </div>
</div>


