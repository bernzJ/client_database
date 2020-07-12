<div v-for="error in errors" :key="id" class="alert alert-danger alert-dismissible fade show" role="alert">
    @{{ error.msg }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<div class="form-group row align-items-center"
    :class="{'has-danger': errors.has('name'), 'has-success': fields.name && fields.name.valid }">
    <label for="name" class="col-form-label text-md-right"
        :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.customer.columns.name') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.name" v-validate="'required'" @input="validate($event)" class="form-control"
            :class="{'form-control-danger': errors.has('name'), 'form-control-success': fields.name && fields.name.valid}"
            id="name" name="name" placeholder="{{ trans('admin.customer.columns.name') }}">
        <div v-if="errors.has('name')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('name') }}</div>
    </div>
</div>

<div class="form-group row align-items-center"
    :class="{'has-danger': errors.has('industry'), 'has-success': fields.industry && fields.industry.valid }">
    <label for="industry" class="col-form-label text-md-right"
        :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.customer.columns.industry') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">

        <multiselect v-model="form.industry" :options="industries" :multiple="false" track-by="id" label="name"
            tag-placeholder="{{ __('Select Industry') }}" placeholder="{{ __('Industry') }}">
        </multiselect>

        <div v-if="errors.has('industry')" class="form-control-feedback form-text" v-cloak>
            @{{ errors.first('industry') }}</div>
    </div>
</div>

<div class="form-group row align-items-center"
    :class="{'has-danger': errors.has('refresh_date'), 'has-success': fields.refresh_date && fields.refresh_date.valid }">
    <label for="refresh_date" class="col-form-label text-md-right"
        :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.customer.columns.refresh_date') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-sm-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.refresh_date" :config="datePickerConfig"
                v-validate="'date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr"
                :class="{'form-control-danger': errors.has('refresh_date'), 'form-control-success': fields.refresh_date && fields.refresh_date.valid}"
                id="refresh_date" name="refresh_date"
                placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_date') }}"></datetime>
        </div>
        <div v-if="errors.has('refresh_date')" class="form-control-feedback form-text" v-cloak>
            @{{ errors.first('refresh_date') }}</div>
    </div>
</div>

<div class="form-group row align-items-center"
    :class="{'has-danger': errors.has('employee_groups_id'), 'has-success': fields.employee_groups_id && fields.employee_groups_id.valid }">
    <label for="employee_groups_id" class="col-form-label text-md-right"
        :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.customer.columns.employee_groups_id') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.employee_groups_id" v-validate="'integer'" @input="validate($event)"
            class="form-control"
            :class="{'form-control-danger': errors.has('employee_groups_id'), 'form-control-success': fields.employee_groups_id && fields.employee_groups_id.valid}"
            id="employee_groups_id" name="employee_groups_id"
            placeholder="{{ trans('admin.customer.columns.employee_groups_id') }}">
        <div v-if="errors.has('employee_groups_id')" class="form-control-feedback form-text" v-cloak>
            @{{ errors.first('employee_groups_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center"
    :class="{'has-danger': errors.has('lg_sales_owner'), 'has-success': fields.lg_sales_owner && fields.lg_sales_owner.valid }">
    <label for="lg_sales_owner" class="col-form-label text-md-right"
        :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.customer.columns.lg_sales_owner') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.lg_sales_owner" v-validate="''" @input="validate($event)" class="form-control"
            :class="{'form-control-danger': errors.has('lg_sales_owner'), 'form-control-success': fields.lg_sales_owner && fields.lg_sales_owner.valid}"
            id="lg_sales_owner" name="lg_sales_owner"
            placeholder="{{ trans('admin.customer.columns.lg_sales_owner') }}">
        <div v-if="errors.has('lg_sales_owner')" class="form-control-feedback form-text" v-cloak>
            @{{ errors.first('lg_sales_owner') }}</div>
    </div>
</div>

<div class="form-group row align-items-center"
    :class="{'has-danger': errors.has('lg_account_owner_oversight'), 'has-success': fields.lg_account_owner_oversight && fields.lg_account_owner_oversight.valid }">
    <label for="lg_account_owner_oversight" class="col-form-label text-md-right"
        :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.customer.columns.lg_account_owner_oversight') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.lg_account_owner_oversight" v-validate="''" @input="validate($event)"
            class="form-control"
            :class="{'form-control-danger': errors.has('lg_account_owner_oversight'), 'form-control-success': fields.lg_account_owner_oversight && fields.lg_account_owner_oversight.valid}"
            id="lg_account_owner_oversight" name="lg_account_owner_oversight"
            placeholder="{{ trans('admin.customer.columns.lg_account_owner_oversight') }}">
        <div v-if="errors.has('lg_account_owner_oversight')" class="form-control-feedback form-text" v-cloak>
            @{{ errors.first('lg_account_owner_oversight') }}</div>
    </div>
</div>

<div class="form-group row align-items-center"
    :class="{'has-danger': errors.has('state'), 'has-success': fields.state && fields.state.valid }">
    <label for="state" class="col-form-label text-md-right"
        :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.customer.columns.state') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <multiselect v-model="form.state" :options="states" :multiple="false" track-by="id" label="name"
            tag-placeholder="{{ __('Select State') }}" placeholder="{{ __('State') }}">
        </multiselect>
        <div v-if="errors.has('state')" class="form-control-feedback form-text" v-cloak>
            @{{ errors.first('state') }}</div>
    </div>
</div>

<div class="form-group row align-items-center"
    :class="{'has-danger': errors.has('country'), 'has-success': fields.country && fields.country.valid }">
    <label for="country" class="col-form-label text-md-right"
        :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.customer.columns.country') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <multiselect v-model="form.country" :options="countries" :multiple="false" track-by="id" label="name"
            tag-placeholder="{{ __('Select Country') }}" placeholder="{{ __('Country') }}">
        </multiselect>

        <div v-if="errors.has('country')" class="form-control-feedback form-text" v-cloak>
            @{{ errors.first('country') }}</div>
    </div>
</div>

<div class="form-group row align-items-center"
    :class="{'has-danger': errors.has('zip'), 'has-success': fields.zip && fields.zip.valid }">
    <label for="zip" class="col-form-label text-md-right"
        :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.customer.columns.zip') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.zip" v-validate="''" @input="validate($event)" class="form-control"
            :class="{'form-control-danger': errors.has('zip'), 'form-control-success': fields.zip && fields.zip.valid}"
            id="zip" name="zip" placeholder="{{ trans('admin.customer.columns.zip') }}">
        <div v-if="errors.has('zip')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('zip') }}</div>
    </div>
</div>

<div class="form-group row align-items-center"
    :class="{'has-danger': errors.has('city'), 'has-success': fields.city && fields.city.valid }">
    <label for="city" class="col-form-label text-md-right"
        :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.customer.columns.city') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.city" v-validate="''" @input="validate($event)" class="form-control"
            :class="{'form-control-danger': errors.has('city'), 'form-control-success': fields.city && fields.city.valid}"
            id="city" name="city" placeholder="{{ trans('admin.customer.columns.city') }}">
        <div v-if="errors.has('city')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('city') }}</div>
    </div>
</div>

<!-- TODO: implement this <input type="hidden" v-model="form.address_lng_lat" > -->

<div class="form-group row align-items-center"
    :class="{'has-danger': errors.has('address_2'), 'has-success': fields.address_2 && fields.address_2.valid }">
    <label for="address_2" class="col-form-label text-md-right"
        :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.customer.columns.address_2') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.address_2" v-validate="''" @input="validate($event)" class="form-control"
            :class="{'form-control-danger': errors.has('address_2'), 'form-control-success': fields.address_2 && fields.address_2.valid}"
            id="address_2" name="address_2" placeholder="{{ trans('admin.customer.columns.address_2') }}">
        <div v-if="errors.has('address_2')" class="form-control-feedback form-text" v-cloak>
            @{{ errors.first('address_2') }}</div>
    </div>
</div>

<div class="form-group row align-items-center"
    :class="{'has-danger': errors.has('address_1'), 'has-success': fields.address_1 && fields.address_1.valid }">
    <label for="address_1" class="col-form-label text-md-right"
        :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.customer.columns.address_1') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.address_1" v-validate="'required'" @input="validate($event)"
            class="form-control"
            :class="{'form-control-danger': errors.has('address_1'), 'form-control-success': fields.address_1 && fields.address_1.valid}"
            id="address_1" name="address_1" placeholder="{{ trans('admin.customer.columns.address_1') }}">
        <div v-if="errors.has('address_1')" class="form-control-feedback form-text" v-cloak>
            @{{ errors.first('address_1') }}</div>
    </div>
</div>

<div class="form-group row align-items-center"
    :class="{'has-danger': errors.has('logo'), 'has-success': fields.logo && fields.logo.valid }">
    <label for="logo" class="col-form-label text-md-right"
        :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.customer.columns.logo') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.logo" v-validate="''" @input="validate($event)" class="form-control"
            :class="{'form-control-danger': errors.has('logo'), 'form-control-success': fields.logo && fields.logo.valid}"
            id="logo" name="logo" placeholder="{{ trans('admin.customer.columns.logo') }}">
        <div v-if="errors.has('logo')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('logo') }}</div>
    </div>
</div>

<div class="form-check row"
    :class="{'has-danger': errors.has('test_site'), 'has-success': fields.test_site && fields.test_site.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="test_site" type="checkbox" v-model="form.test_site" v-validate="''"
            data-vv-name="test_site" name="test_site_fake_element">
        <label class="form-check-label" for="test_site">
            {{ trans('admin.customer.columns.test_site') }}
        </label>
        <input type="hidden" name="test_site" :value="form.test_site">
        <div v-if="errors.has('test_site')" class="form-control-feedback form-text" v-cloak>
            @{{ errors.first('test_site') }}</div>
    </div>
</div>

<div class="form-group row align-items-center"
    :class="{'has-danger': errors.has('website'), 'has-success': fields.website && fields.website.valid }">
    <label for="website" class="col-form-label text-md-right"
        :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.customer.columns.website') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.website" v-validate="''" @input="validate($event)" class="form-control"
            :class="{'form-control-danger': errors.has('website'), 'form-control-success': fields.website && fields.website.valid}"
            id="website" name="website" placeholder="{{ trans('admin.customer.columns.website') }}">
        <div v-if="errors.has('website')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('website') }}
        </div>
    </div>
</div>

<div class="form-check row" :class="{'has-danger': errors.has('sso'), 'has-success': fields.sso && fields.sso.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="sso" type="checkbox" v-model="form.sso" v-validate="''" data-vv-name="sso"
            name="sso_fake_element">
        <label class="form-check-label" for="sso">
            {{ trans('admin.customer.columns.sso') }}
        </label>
        <input type="hidden" name="sso" :value="form.sso">
        <div v-if="errors.has('sso')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('sso') }}</div>
    </div>
</div>

<div class="form-group row align-items-center"
    :class="{'has-danger': errors.has('hr_id'), 'has-success': fields.hr_id && fields.hr_id.valid }">
    <label for="hr_id" class="col-form-label text-md-right"
        :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.customer.columns.hr_id') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.hr_id" v-validate="'integer'" @input="validate($event)" class="form-control"
            :class="{'form-control-danger': errors.has('hr_id'), 'form-control-success': fields.hr_id && fields.hr_id.valid}"
            id="hr_id" name="hr_id" placeholder="{{ trans('admin.customer.columns.hr_id') }}">
        <div v-if="errors.has('hr_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('hr_id') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
    :class="{'has-danger': errors.has('financial_id'), 'has-success': fields.financial_id && fields.financial_id.valid }">
    <label for="financial_id" class="col-form-label text-md-right"
        :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.customer.columns.financial_id') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.financial_id" v-validate="'integer'" @input="validate($event)"
            class="form-control"
            :class="{'form-control-danger': errors.has('financial_id'), 'form-control-success': fields.financial_id && fields.financial_id.valid}"
            id="financial_id" name="financial_id" placeholder="{{ trans('admin.customer.columns.financial_id') }}">
        <div v-if="errors.has('financial_id')" class="form-control-feedback form-text" v-cloak>
            @{{ errors.first('financial_id') }}</div>
    </div>
</div>

<div class="form-check row"
    :class="{'has-danger': errors.has('opted_out'), 'has-success': fields.opted_out && fields.opted_out.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="opted_out" type="checkbox" v-model="form.opted_out" v-validate="''"
            data-vv-name="opted_out" name="opted_out_fake_element">
        <label class="form-check-label" for="opted_out">
            {{ trans('admin.customer.columns.opted_out') }}
        </label>
        <input type="hidden" name="opted_out" :value="form.opted_out">
        <div v-if="errors.has('opted_out')" class="form-control-feedback form-text" v-cloak>
            @{{ errors.first('opted_out') }}</div>
    </div>
</div>

<div class="form-check row"
    :class="{'has-danger': errors.has('referenceable'), 'has-success': fields.referenceable && fields.referenceable.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="referenceable" type="checkbox" v-model="form.referenceable" v-validate="''"
            data-vv-name="referenceable" name="referenceable_fake_element">
        <label class="form-check-label" for="referenceable">
            {{ trans('admin.customer.columns.referenceable') }}
        </label>
        <input type="hidden" name="referenceable" :value="form.referenceable">
        <div v-if="errors.has('referenceable')" class="form-control-feedback form-text" v-cloak>
            @{{ errors.first('referenceable') }}</div>
    </div>
</div>

<div class="form-check row"
    :class="{'has-danger': errors.has('active_projects'), 'has-success': fields.active_projects && fields.active_projects.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="active_projects" type="checkbox" v-model="form.active_projects"
            v-validate="''" data-vv-name="active_projects" name="active_projects_fake_element">
        <label class="form-check-label" for="active_projects">
            {{ trans('admin.customer.columns.active_projects') }}
        </label>
        <input type="hidden" name="active_projects" :value="form.active_projects">
        <div v-if="errors.has('active_projects')" class="form-control-feedback form-text" v-cloak>
            @{{ errors.first('active_projects') }}</div>
    </div>
</div>

<div class="form-group row align-items-center"
    :class="{'has-danger': errors.has('client_type'), 'has-success': fields.client_type && fields.client_type.valid }">
    <label for="client_type" class="col-form-label text-md-right"
        :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.customer.columns.client_type') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <multiselect v-model="form.client_type" :options="client_types" :multiple="false" track-by="id" label="name"
            tag-placeholder="{{ __('Select Client Type') }}" placeholder="{{ __('Client Type') }}">
        </multiselect>
        <div v-if="errors.has('client_type')" class="form-control-feedback form-text" v-cloak>
            @{{ errors.first('client_type') }}</div>
    </div>
</div>

<div class="form-group row align-items-center"
    :class="{'has-danger': errors.has('concur_product'), 'has-success': fields.concur_product && fields.concur_product.valid }">
    <label for="concur_product" class="col-form-label text-md-right"
        :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.customer.columns.concur_product') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">

        <multiselect v-model="form.concur_product" :options="concur_products" :multiple="true" track-by="id"
            label="product" tag-placeholder="{{ __('Select Concur Product') }}"
            placeholder="{{ __('Concur Product') }}">
        </multiselect>
        <div v-if="errors.has('concur_product')" class="form-control-feedback form-text" v-cloak>
            @{{ errors.first('concur_product') }}</div>
    </div>
</div>

<div class="form-group row align-items-center"
    :class="{'has-danger': errors.has('project_type'), 'has-success': fields.project_type && fields.project_type.valid }">
    <label for="project_type" class="col-form-label text-md-right"
        :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.customer.columns.project_type') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <multiselect v-model="form.project_type" :options="project_types" :multiple="false" track-by="id" label="name"
            tag-placeholder="{{ __('Select Project Type') }}" placeholder="{{ __('Project Type') }}">
        </multiselect>
        <div v-if="errors.has('project_type')" class="form-control-feedback form-text" v-cloak>
            @{{ errors.first('project_type') }}</div>
    </div>
</div>

<div class="form-group row align-items-center"
    :class="{'has-danger': errors.has('employees_count'), 'has-success': fields.employees_count && fields.employees_count.valid }">
    <label for="employees_count" class="col-form-label text-md-right"
        :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.customer.columns.employees_count') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.employees_count" v-validate="'required|integer'" @input="validate($event)"
            class="form-control"
            :class="{'form-control-danger': errors.has('employees_count'), 'form-control-success': fields.employees_count && fields.employees_count.valid}"
            id="employees_count" name="employees_count"
            placeholder="{{ trans('admin.customer.columns.employees_count') }}">
        <div v-if="errors.has('employees_count')" class="form-control-feedback form-text" v-cloak>
            @{{ errors.first('employees_count') }}</div>
    </div>
</div>

<div class="form-group row align-items-center"
    :class="{'has-danger': errors.has('fiscal_year'), 'has-success': fields.fiscal_year && fields.fiscal_year.valid }">
    <label for="fiscal_year" class="col-form-label text-md-right"
        :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.customer.columns.fiscal_year') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <!-- TODO: implement error display. -->
        <input type="hidden" v-model="form.fiscal_year.id" v-validate="'integer'">

        <datetime v-model="form.fiscal_year.begin" :config="datePickerConfig"
            v-validate="'date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr"
            :class="{'form-control-danger': errors.has('fiscal_year.begin'), 'form-control-success': fields.fiscal_year_begin && fields.fiscal_year_begin.valid}"
            placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_date') }}"></datetime>

        <datetime v-model="form.fiscal_year.end" :config="datePickerConfig"
            v-validate="'date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr"
            :class="{'form-control-danger': errors.has('fiscal_year.end'), 'form-control-success': fields.fiscal_year_end && fields.fiscal_year_end.valid}"
            placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_date') }}"></datetime>

        <datetime v-model="form.fiscal_year.month_end_close_period" :config="datePickerConfig"
            v-validate="'date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr"
            :class="{'form-control-danger': errors.has('fiscal_year.month_end_close_period'), 'form-control-success': fields.fiscal_year_month_end_close_period && fields.fiscal_year_month_end_close_period.valid}"
            placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_date') }}"></datetime>

        <datetime v-model="form.fiscal_year.quarterly_close_cycle" :config="datePickerConfig"
            v-validate="'date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr"
            :class="{'form-control-danger': errors.has('fiscal_year.quarterly_close_cycle'), 'form-control-success': fields.fiscal_year_quarterly_close_cycle && fields.fiscal_year_quarterly_close_cycle.valid}"
            placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_date') }}"></datetime>


    </div>
</div>

<div class="form-group row align-items-center"
    :class="{'has-danger': errors.has('financial'), 'has-success': fields.financial && fields.financial.valid }">
    <label for="financial" class="col-form-label text-md-right"
        :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.customer.columns.financial.platform') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.financial.platform" v-validate="'integer'" @input="validate($event)"
            class="form-control"
            :class="{'form-control-danger': errors.has('financial'), 'form-control-success': fields.financial && fields.financial.valid}"
            id="financial" name="financial" placeholder="{{ trans('admin.customer.columns.financial.platform') }}">
        <div v-if="errors.has('financial')" class="form-control-feedback form-text" v-cloak>
            @{{ errors.first('financial') }}</div>
    </div>
</div>

<div class="form-group row align-items-center"
    :class="{'has-danger': errors.has('timezone'), 'has-success': fields.timezone && fields.timezone.valid }">
    <label for="timezone" class="col-form-label text-md-right"
        :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.customer.columns.timezone') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <multiselect v-model="form.timezone" :options="timezones" :multiple="false" track-by="id" label="name"
            tag-placeholder="{{ __('Select Timezone') }}" placeholder="{{ __('Timezone') }}">
        </multiselect>
        <div v-if="errors.has('timezone')" class="form-control-feedback form-text" v-cloak>
            @{{ errors.first('timezone') }}</div>
    </div>
</div>

<div class="form-group row align-items-center"
    :class="{'has-danger': errors.has('notes_id'), 'has-success': fields.notes_id && fields.notes_id.valid }">
    <label for="notes_id" class="col-form-label text-md-right"
        :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.customer.columns.notes_id') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.notes_id" v-validate="'integer'" @input="validate($event)" class="form-control"
            :class="{'form-control-danger': errors.has('notes_id'), 'form-control-success': fields.notes_id && fields.notes_id.valid}"
            id="notes_id" name="notes_id" placeholder="{{ trans('admin.customer.columns.notes_id') }}">
        <div v-if="errors.has('notes_id')" class="form-control-feedback form-text" v-cloak>
            @{{ errors.first('notes_id') }}</div>
    </div>
</div>
