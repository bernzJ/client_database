<div class="form-group row align-items-center"
    :class="{'has-danger': errors.has('bank_name'), 'has-success': fields.bank_name && fields.bank_name.valid }">
    <label for="bank_name" class="col-form-label text-md-right"
        :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.credit-card.columns.bank_name') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.bank_name" v-validate="'required'" @input="validate($event)"
            class="form-control"
            :class="{'form-control-danger': errors.has('bank_name'), 'form-control-success': fields.bank_name && fields.bank_name.valid}"
            id="bank_name" name="bank_name" placeholder="{{ trans('admin.credit-card.columns.bank_name') }}">
        <div v-if="errors.has('bank_name')" class="form-control-feedback form-text" v-cloak>
            @{{ errors.first('bank_name') }}</div>
    </div>
</div>

<div class="form-group row align-items-center"
    :class="{'has-danger': errors.has('payment_type'), 'has-success': fields.payment_type && fields.payment_type.valid }">
    <label for="payment_type" class="col-form-label text-md-right"
        :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.credit-card.columns.payment_type') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.payment_type" v-validate="'required'" @input="validate($event)"
            class="form-control"
            :class="{'form-control-danger': errors.has('payment_type'), 'form-control-success': fields.payment_type && fields.payment_type.valid}"
            id="payment_type" name="payment_type" placeholder="{{ trans('admin.credit-card.columns.payment_type') }}">
        <div v-if="errors.has('payment_type')" class="form-control-feedback form-text" v-cloak>
            @{{ errors.first('payment_type') }}</div>
    </div>
</div>

<div class="form-group row align-items-center"
    :class="{'has-danger': errors.has('statement_cycle'), 'has-success': fields.statement_cycle && fields.statement_cycle.valid }">
    <label for="statement_cycle" class="col-form-label text-md-right"
        :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.credit-card.columns.statement_cycle') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.statement_cycle" v-validate="''" @input="validate($event)" class="form-control"
            :class="{'form-control-danger': errors.has('statement_cycle'), 'form-control-success': fields.statement_cycle && fields.statement_cycle.valid}"
            id="statement_cycle" name="statement_cycle"
            placeholder="{{ trans('admin.credit-card.columns.statement_cycle') }}">
        <div v-if="errors.has('statement_cycle')" class="form-control-feedback form-text" v-cloak>
            @{{ errors.first('statement_cycle') }}</div>
    </div>
</div>

<div class="form-group row align-items-center"
    :class="{'has-danger': errors.has('liability'), 'has-success': fields.liability_id && fields.liability_id.valid }">
    <label for="liability" class="col-form-label text-md-right"
        :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.credit-card.columns.liability_id') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">

        <multiselect v-model="form.liability" :options="liabilities" :multiple="false" track-by="id" label="name"
            tag-placeholder="{{ __('Select Liability') }}" placeholder="{{ __('Liability') }}">
        </multiselect>
        <div v-if="errors.has('liability')" class="form-control-feedback form-text" v-cloak>
            @{{ errors.first('liability') }}</div>
    </div>
</div>

<div class="form-check row"
    :class="{'has-danger': errors.has('cc_feed'), 'has-success': fields.cc_feed && fields.cc_feed.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="cc_feed" type="checkbox" v-model="form.cc_feed" v-validate="''"
            data-vv-name="cc_feed" name="cc_feed_fake_element">
        <label class="form-check-label" for="cc_feed">
            {{ trans('admin.credit-card.columns.cc_feed') }}
        </label>
        <input type="hidden" name="cc_feed" :value="form.cc_feed">
        <div v-if="errors.has('cc_feed')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('cc_feed') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
    :class="{'has-danger': errors.has('payment_method'), 'has-success': fields.payment_method && fields.payment_method.valid }">
    <label for="payment_method" class="col-form-label text-md-right"
        :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.credit-card.columns.payment_method_id') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">

        <multiselect v-model="form.payment_method" :options="payment_methods" :multiple="false" track-by="id"
            label="name" tag-placeholder="{{ __('Select Payment Method') }}" placeholder="{{ __('Payment Method') }}">
        </multiselect>

        <div v-if="errors.has('payment_method')" class="form-control-feedback form-text" v-cloak>
            @{{ errors.first('payment_method') }}</div>
    </div>
</div>

<div class="form-group row align-items-center"
    :class="{'has-danger': errors.has('batch_config'), 'has-success': fields.batch_config && fields.batch_config.valid }">
    <label for="batch_config" class="col-form-label text-md-right"
        :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.credit-card.columns.batch_config') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.batch_config" v-validate="'required'" @input="validate($event)"
            class="form-control"
            :class="{'form-control-danger': errors.has('batch_config'), 'form-control-success': fields.batch_config && fields.batch_config.valid}"
            id="batch_config" name="batch_config" placeholder="{{ trans('admin.credit-card.columns.batch_config') }}">
        <div v-if="errors.has('batch_config')" class="form-control-feedback form-text" v-cloak>
            @{{ errors.first('batch_config') }}</div>
    </div>
</div>

<div class="form-group row align-items-center"
    :class="{'has-danger': errors.has('rebate'), 'has-success': fields.rebate && fields.rebate.valid }">
    <label for="rebate" class="col-form-label text-md-right"
        :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.credit-card.columns.rebate') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.rebate" v-validate="'required'" @input="validate($event)" class="form-control"
            :class="{'form-control-danger': errors.has('rebate'), 'form-control-success': fields.rebate && fields.rebate.valid}"
            id="rebate" name="rebate" placeholder="{{ trans('admin.credit-card.columns.rebate') }}">
        <div v-if="errors.has('rebate')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('rebate') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
    :class="{'has-danger': errors.has('card_program'), 'has-success': fields.card_program && fields.card_program.valid }">
    <label for="card_program" class="col-form-label text-md-right"
        :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.credit-card.columns.card_program_id') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">

        <multiselect v-model="form.card_program" :options="card_programs" :multiple="false" track-by="id" label="name"
            tag-placeholder="{{ __('Select Customer') }}" placeholder="{{ __('Customer') }}">
        </multiselect>

        <div v-if="errors.has('card_program')" class="form-control-feedback form-text" v-cloak>
            @{{ errors.first('card_program') }}</div>
    </div>
</div>

<div class="form-group row align-items-center"
    :class="{'has-danger': errors.has('customer'), 'has-success': fields.customer && fields.customer.valid }">
    <label for="customer" class="col-form-label text-md-right"
        :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.credit-card.columns.customer_id') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">

        <multiselect v-model="form.customer" :options="customers" :multiple="false" track-by="id" label="name"
            tag-placeholder="{{ __('Select Customer') }}" placeholder="{{ __('Customer') }}">
        </multiselect>

        <div v-if="errors.has('customer')" class="form-control-feedback form-text" v-cloak>
            @{{ errors.first('customer') }}</div>
    </div>
</div>

<div class="form-group row align-items-center"
    :class="{'has-danger': errors.has('country'), 'has-success': fields.country && fields.country.valid }">
    <label for="country" class="col-form-label text-md-right"
        :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.credit-card.columns.country') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">

        <multiselect v-model="form.country" :options="countries" :multiple="true" track-by="id" label="name"
            tag-placeholder="{{ __('Select Countries') }}" placeholder="{{ __('Countries') }}">
        </multiselect>

        <div v-if="errors.has('country')" class="form-control-feedback form-text" v-cloak>
            @{{ errors.first('country') }}</div>
    </div>
</div>
