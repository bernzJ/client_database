<div class="form-group row align-items-center"
    :class="{'has-danger': errors.has('abbreviation'), 'has-success': fields.abbreviation && fields.abbreviation.valid }">
    <label for="abbreviation" class="col-form-label text-md-right"
        :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.state.columns.abbreviation') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.abbreviation" v-validate="'required'" @input="validate($event)"
            class="form-control"
            :class="{'form-control-danger': errors.has('abbreviation'), 'form-control-success': fields.abbreviation && fields.abbreviation.valid}"
            id="abbreviation" name="abbreviation" placeholder="{{ trans('admin.state.columns.abbreviation') }}">
        <div v-if="errors.has('abbreviation')" class="form-control-feedback form-text" v-cloak>
            @{{ errors.first('abbreviation') }}</div>
    </div>
</div>

<div class="form-group row align-items-center"
    :class="{'has-danger': errors.has('name'), 'has-success': fields.name && fields.name.valid }">
    <label for="name" class="col-form-label text-md-right"
        :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.state.columns.name') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.name" v-validate="'required'" @input="validate($event)" class="form-control"
            :class="{'form-control-danger': errors.has('name'), 'form-control-success': fields.name && fields.name.valid}"
            id="name" name="name" placeholder="{{ trans('admin.state.columns.name') }}">
        <div v-if="errors.has('name')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('name') }}</div>
    </div>
</div>

<div class="form-group row align-items-center"
    :class="{'has-danger': errors.has('country_id'), 'has-success': fields.country_id && fields.country_id.valid }">
    <label for="country_id" class="col-form-label text-md-right"
        :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.customer.columns.country_id') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <multiselect v-model="form.country" :options="countries" :multiple="false" track-by="id" label="name"
            tag-placeholder="{{ __('Select Country') }}" placeholder="{{ __('Country') }}">
        </multiselect>
        <div v-if="errors.has('country_id')" class="form-control-feedback form-text" v-cloak>
            @{{ errors.first('country_id') }}</div>
    </div>
</div>
