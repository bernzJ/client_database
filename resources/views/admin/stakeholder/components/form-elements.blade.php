<div class="form-group row align-items-center"
    :class="{'has-danger': errors.has('role'), 'has-success': fields.role && fields.role.valid }">
    <label for="role" class="col-form-label text-md-right"
        :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.stakeholder.columns.role') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.role" v-validate="''" @input="validate($event)" class="form-control"
            :class="{'form-control-danger': errors.has('role'), 'form-control-success': fields.role && fields.role.valid}"
            id="role" name="role" placeholder="{{ trans('admin.stakeholder.columns.role') }}">
        <div v-if="errors.has('role')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('role') }}</div>
    </div>
</div>

<div class="form-group row align-items-center"
    :class="{'has-danger': errors.has('name'), 'has-success': fields.name && fields.name.valid }">
    <label for="name" class="col-form-label text-md-right"
        :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.stakeholder.columns.name') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.name" v-validate="'required'" @input="validate($event)" class="form-control"
            :class="{'form-control-danger': errors.has('name'), 'form-control-success': fields.name && fields.name.valid}"
            id="name" name="name" placeholder="{{ trans('admin.stakeholder.columns.name') }}">
        <div v-if="errors.has('name')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('name') }}</div>
    </div>
</div>

<div class="form-group row align-items-center"
    :class="{'has-danger': errors.has('email'), 'has-success': fields.email && fields.email.valid }">
    <label for="email" class="col-form-label text-md-right"
        :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.stakeholder.columns.email') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.email" v-validate="'email'" @input="validate($event)" class="form-control"
            :class="{'form-control-danger': errors.has('email'), 'form-control-success': fields.email && fields.email.valid}"
            id="email" name="email" placeholder="{{ trans('admin.stakeholder.columns.email') }}">
        <div v-if="errors.has('email')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('email') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
    :class="{'has-danger': errors.has('phone'), 'has-success': fields.phone && fields.phone.valid }">
    <label for="phone" class="col-form-label text-md-right"
        :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.stakeholder.columns.phone') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.phone" v-validate="''" @input="validate($event)" class="form-control"
            :class="{'form-control-danger': errors.has('phone'), 'form-control-success': fields.phone && fields.phone.valid}"
            id="phone" name="phone" placeholder="{{ trans('admin.stakeholder.columns.phone') }}">
        <div v-if="errors.has('phone')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('phone') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
    :class="{'has-danger': errors.has('contact_method'), 'has-success': fields.contact_method && fields.contact_method.valid }">
    <label for="contact_method" class="col-form-label text-md-right"
        :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.stakeholder.columns.contact_method') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <multiselect v-model="form.contact_method" :options="contact_methods" :multiple="false" track-by="id"
            label="name" tag-placeholder="{{ __('Select Contact Method') }}" placeholder="{{ __('Contact Method') }}">
        </multiselect>
        <div v-if="errors.has('contact_method')" class="form-control-feedback form-text" v-cloak>
            @{{ errors.first('contact_method') }}</div>
    </div>
</div>

<div class="form-group row align-items-center"
    :class="{'has-danger': errors.has('timezone'), 'has-success': fields.timezone && fields.timezone.valid }">
    <label for="timezone" class="col-form-label text-md-right"
        :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.stakeholder.columns.timezone') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <multiselect v-model="form.timezone" :options="timezones" :multiple="false" track-by="id" label="name"
            tag-placeholder="{{ __('Select Timezone') }}" placeholder="{{ __('Timezone') }}">
        </multiselect>
        <div v-if="errors.has('timezone')" class="form-control-feedback form-text" v-cloak>
            @{{ errors.first('timezone') }}</div>
    </div>
</div>

<div class="form-group row align-items-center"
    :class="{'has-danger': errors.has('customer'), 'has-success': fields.customer && fields.customer.valid }">
    <label for="customer" class="col-form-label text-md-right"
        :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.stakeholder.columns.customer') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">

        <multiselect v-model="form.customer" :options="customers" :multiple="false" track-by="id" label="name"
            tag-placeholder="{{ __('Select Customer') }}" placeholder="{{ __('Customer') }}">
        </multiselect>

        <div v-if="errors.has('customer')" class="form-control-feedback form-text" v-cloak>
            @{{ errors.first('customer') }}</div>
    </div>
</div>
