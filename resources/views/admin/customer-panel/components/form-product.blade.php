<div class="card">
    <div class="mt-5"></div>
    <div class="card-block">
        <div class="form-group row align-items-center">
            <label for="product"
                class="col-form-label text-md-right col-md-2">{{ trans('admin.concur-product.columns.product') }}</label>
            <div class="col-md-9 col-xl-8">
                <input type="text" class="form-control" id="product" name="product"
                    placeholder="{{ trans('admin.concur-product.columns.product') }}">
            </div>
        </div>

        <div class="form-group row align-items-center">
            <label for="segment"
                class="col-form-label text-md-right col-md-2">{{ trans('admin.concur-product.columns.segment') }}</label>
            <div class="col-md-9 col-xl-8">

                <multiselect :options="[{'id':0,name:'test'}]" :multiple="false" track-by="id" label="name"
                    tag-placeholder="{{ __('Select Segment') }}" placeholder="{{ __('Segment') }}">
                </multiselect>
            </div>
        </div>

    </div>
</div>
