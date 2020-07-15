<div class="form-group row align-items-center" :class="{'has-danger': errors.has('name'), 'has-success': fields.name && fields.name.valid }">
    <label for="name" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.tmc.columns.name') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.name" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('name'), 'form-control-success': fields.name && fields.name.valid}" id="name" name="name" placeholder="{{ trans('admin.tmc.columns.name') }}">
        <div v-if="errors.has('name')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('name') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('comment'), 'has-success': fields.comment && fields.comment.valid }">
    <label for="comment" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.tmc.columns.comment') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.comment" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('comment'), 'form-control-success': fields.comment && fields.comment.valid}" id="comment" name="comment" placeholder="{{ trans('admin.tmc.columns.comment') }}">
        <div v-if="errors.has('comment')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('comment') }}</div>
    </div>
</div>


