@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.dashboard.actions.index'))

@section('body')
<!-- TODO: add some loading for stats display -->
<dashboard-listing :data="{{ $data->toJson() }}" :url="'{{ url('admin/dashboards') }}'" inline-template>
    <div class="row">
        <div class="col">
            <div class="col-sm-6 col-lg-4 px-0">
                <div class="card" style="max-width: 18rem;">
                    <div class="card-header bg-vk content-center">
                    </div>
                    <div class="card-body row text-center">
                        <div class="col">
                            <div class="h4">@{{ stats.activeClients }}</div>
                            <div class="text-uppercase text-muted small">Total Clients</div>
                        </div>
                        <div class="vr"></div>
                        <div class="col">
                            <div class="h4">@{{ stats.activeProjects }}</div>
                            <div class="text-uppercase text-muted small">Active Projects</div>
                        </div>
                    </div>
                </div>
            </div>
            <map-vue :markers="{{ $data->toJson()}}"></map-vue>
        </div>
    </div>
</dashboard-listing>

@endsection
