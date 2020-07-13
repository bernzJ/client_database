<div class="form-group row align-items-center"
    :class="{'has-danger': errors.has('customer'), 'has-success': fields.customer && fields.customer.valid }">
    <label for="customer" class="col-form-label text-md-right"
        :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.customer.columns.name') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <multiselect v-model="form.customer" :options="customers" :multiple="false" track-by="id" label="name"
            tag-placeholder="{{ __('Select Customer') }}" placeholder="{{ __('Customer') }}">
        </multiselect>

        <div v-if="errors.has('customer')" class="form-control-feedback form-text" v-cloak>
            @{{ errors.first('customer') }}</div>
    </div>
</div>

<div class="form-group row align-items-center"
    :class="{'has-danger': errors.has('company_culture'), 'has-success': fields.company_culture && fields.company_culture.valid }">
    <label for="company_culture" class="col-form-label text-md-right"
        :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.note.columns.company_culture') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <wysiwyg v-model="form.company_culture" v-validate="''" id="company_culture" name="company_culture"
                :config="mediaWysiwygConfig"></wysiwyg>
        </div>
        <div v-if="errors.has('company_culture')" class="form-control-feedback form-text" v-cloak>
            @{{ errors.first('company_culture') }}</div>
    </div>
</div>

<div class="form-group row align-items-center"
    :class="{'has-danger': errors.has('strategic_goals'), 'has-success': fields.strategic_goals && fields.strategic_goals.valid }">
    <label for="strategic_goals" class="col-form-label text-md-right"
        :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.note.columns.strategic_goals') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <wysiwyg v-model="form.strategic_goals" v-validate="''" id="strategic_goals" name="strategic_goals"
                :config="mediaWysiwygConfig"></wysiwyg>
        </div>
        <div v-if="errors.has('strategic_goals')" class="form-control-feedback form-text" v-cloak>
            @{{ errors.first('strategic_goals') }}</div>
    </div>
</div>

<div class="form-group row align-items-center"
    :class="{'has-danger': errors.has('compliance'), 'has-success': fields.compliance && fields.compliance.valid }">
    <label for="compliance" class="col-form-label text-md-right"
        :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.note.columns.compliance') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <wysiwyg v-model="form.compliance" v-validate="''" id="compliance" name="compliance"
                :config="mediaWysiwygConfig"></wysiwyg>
        </div>
        <div v-if="errors.has('compliance')" class="form-control-feedback form-text" v-cloak>
            @{{ errors.first('compliance') }}</div>
    </div>
</div>
