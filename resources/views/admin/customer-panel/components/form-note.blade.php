<div class="card">
    <div class="mt-5"></div>
    <div class="card-block">

        <div class="form-group row align-items-center">
            <label for="customer"
                class="col-form-label text-md-right col-md-2">{{ trans('admin.note.columns.name') }}</label>
            <div class="col-md-9 col-xl-8">
                <multiselect :options="[{'id':0,name:'test'}]" :multiple="false" track-by="id" label="name"
                    tag-placeholder="{{ __('Select Customer') }}" placeholder="{{ __('Customer') }}">
                </multiselect>
            </div>
        </div>

        <div class="form-group row align-items-center">
            <label for="company_culture"
                class="col-form-label text-md-right col-md-2">{{ trans('admin.note.columns.company_culture') }}</label>
            <div class="col-md-9 col-xl-8">
                <div>
                    <wysiwyg id="company_culture" name="company_culture" value=""></wysiwyg>
                </div>
            </div>
        </div>

        <div class="form-group row align-items-center">
            <label for="strategic_goals"
                class="col-form-label text-md-right col-md-2">{{ trans('admin.note.columns.strategic_goals') }}</label>
            <div class="col-md-9 col-xl-8">
                <div>
                    <wysiwyg id="strategic_goals" name="strategic_goals" value=""></wysiwyg>
                </div>
            </div>
        </div>

        <div class="form-group row align-items-center">
            <label for="compliance"
                class="col-form-label text-md-right col-md-2">{{ trans('admin.note.columns.compliance') }}</label>
            <div class="col-md-9 col-xl-8">
                <div>
                    <wysiwyg id="compliance" name="compliance" value=""></wysiwyg>
                </div>
            </div>
        </div>

    </div>
</div>
