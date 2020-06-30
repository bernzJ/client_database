@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.dashboard.actions.index'))

@section('body')
<!-- TODO: data[0] check if that might result in errors, should not.
     TODO: :data: this might be useless, remove? -->
<dashboard-listing :data="{{ $data[0]->toJson() }}" :url="'{{ url('admin/dashboards') }}'" inline-template>

    <div class="row">
        <div class="col">
            <div class="col-sm-6 col-lg-4 px-0">
                <div class="card" style="max-width: 18rem;">
                    <div class="card-header bg-vk content-center">
                    </div>
                    <div class="card-body row text-center">
                        <div class="col">
                            <div class="h4">89k</div>
                            <div class="text-uppercase text-muted small">friends</div>
                        </div>
                        <div class="vr"></div>
                        <div class="col">
                            <div class="h4">459</div>
                            <div class="text-uppercase text-muted small">feeds</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-align-justify"></i> {{ trans('admin.dashboard.actions.index') }}
                </div>
                <div class="card-body" v-cloak>
                    <div class="card-block">
                        <div id="map-vue"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</dashboard-listing>

@endsection
