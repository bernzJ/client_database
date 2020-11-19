<div class="form-group row align-items-center" :class="{'has-danger': errors.has('credit_card_id'), 'has-success': fields.credit_card_id && fields.credit_card_id.valid }">
    <label for="credit_card_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.country-credit-card.columns.credit_card_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.credit_card_id" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('credit_card_id'), 'form-control-success': fields.credit_card_id && fields.credit_card_id.valid}" id="credit_card_id" name="credit_card_id" placeholder="{{ trans('admin.country-credit-card.columns.credit_card_id') }}">
        <div v-if="errors.has('credit_card_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('credit_card_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('country_id'), 'has-success': fields.country_id && fields.country_id.valid }">
    <label for="country_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.country-credit-card.columns.country_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.country_id" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('country_id'), 'form-control-success': fields.country_id && fields.country_id.valid}" id="country_id" name="country_id" placeholder="{{ trans('admin.country-credit-card.columns.country_id') }}">
        <div v-if="errors.has('country_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('country_id') }}</div>
    </div>
</div>


