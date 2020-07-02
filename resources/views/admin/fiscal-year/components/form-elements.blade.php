<div class="form-group row align-items-center" :class="{'has-danger': errors.has('begin'), 'has-success': fields.begin && fields.begin.valid }">
    <label for="begin" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.fiscal-year.columns.begin') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-sm-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.begin" :config="datePickerConfig" v-validate="'required|date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('begin'), 'form-control-success': fields.begin && fields.begin.valid}" id="begin" name="begin" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_date') }}"></datetime>
        </div>
        <div v-if="errors.has('begin')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('begin') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('end'), 'has-success': fields.end && fields.end.valid }">
    <label for="end" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.fiscal-year.columns.end') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-sm-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.end" :config="datePickerConfig" v-validate="'date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('end'), 'form-control-success': fields.end && fields.end.valid}" id="end" name="end" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_date') }}"></datetime>
        </div>
        <div v-if="errors.has('end')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('end') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('month_end_close_period'), 'has-success': fields.month_end_close_period && fields.month_end_close_period.valid }">
    <label for="month_end_close_period" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.fiscal-year.columns.month_end_close_period') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-sm-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.month_end_close_period" :config="datePickerConfig" v-validate="'date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('month_end_close_period'), 'form-control-success': fields.month_end_close_period && fields.month_end_close_period.valid}" id="month_end_close_period" name="month_end_close_period" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_date') }}"></datetime>
        </div>
        <div v-if="errors.has('month_end_close_period')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('month_end_close_period') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('quarterly_close_cycle'), 'has-success': fields.quarterly_close_cycle && fields.quarterly_close_cycle.valid }">
    <label for="quarterly_close_cycle" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.fiscal-year.columns.quarterly_close_cycle') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-sm-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.quarterly_close_cycle" :config="datePickerConfig" v-validate="'date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('quarterly_close_cycle'), 'form-control-success': fields.quarterly_close_cycle && fields.quarterly_close_cycle.valid}" id="quarterly_close_cycle" name="quarterly_close_cycle" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_date') }}"></datetime>
        </div>
        <div v-if="errors.has('quarterly_close_cycle')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('quarterly_close_cycle') }}</div>
    </div>
</div>


