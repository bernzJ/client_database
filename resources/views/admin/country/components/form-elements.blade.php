<div class="form-group row align-items-center" :class="{'has-danger': errors.has('name'), 'has-success': fields.name && fields.name.valid }">
    <label for="name" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.country.columns.name') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.name" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('name'), 'form-control-success': fields.name && fields.name.valid}" id="name" name="name" placeholder="{{ trans('admin.country.columns.name') }}">
        <div v-if="errors.has('name')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('name') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('two_char_country_code'), 'has-success': fields.two_char_country_code && fields.two_char_country_code.valid }">
    <label for="two_char_country_code" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.country.columns.two_char_country_code') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.two_char_country_code" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('two_char_country_code'), 'form-control-success': fields.two_char_country_code && fields.two_char_country_code.valid}" id="two_char_country_code" name="two_char_country_code" placeholder="{{ trans('admin.country.columns.two_char_country_code') }}">
        <div v-if="errors.has('two_char_country_code')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('two_char_country_code') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('three_char_country_code'), 'has-success': fields.three_char_country_code && fields.three_char_country_code.valid }">
    <label for="three_char_country_code" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.country.columns.three_char_country_code') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.three_char_country_code" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('three_char_country_code'), 'form-control-success': fields.three_char_country_code && fields.three_char_country_code.valid}" id="three_char_country_code" name="three_char_country_code" placeholder="{{ trans('admin.country.columns.three_char_country_code') }}">
        <div v-if="errors.has('three_char_country_code')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('three_char_country_code') }}</div>
    </div>
</div>


