@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.customer-panel.actions.index'))

@section('body')

<customer-panel-listing :data="{{ $data->toJson() }}" :timezones="{{$timezones->toJson()}}" :url="'{{ url('admin/customer-panels') }}'" inline-template>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-align-justify"></i> {{ trans('admin.customer-panel.actions.index') }}
                    <a class="btn btn-primary btn-spinner btn-sm pull-right m-b-0"
                        href="{{ url('admin/customer-panels/create') }}" role="button"><i class="fa fa-plus"></i>&nbsp;
                        {{ trans('admin.customer-panel.actions.create') }}</a>
                </div>
                <div class="card-body" v-cloak>
                    <div class="card-block">
                        <form @submit.prevent="">
                            <div class="row justify-content-md-between">
                                <div class="col col-lg-7 col-xl-5 form-group">
                                    <div class="input-group">
                                        <input class="form-control"
                                            placeholder="{{ trans('brackets/admin-ui::admin.placeholder.search') }}"
                                            v-model="search" @keyup.enter="filter('search', $event.target.value)" />
                                        <span class="input-group-append">
                                            <button type="button" class="btn btn-primary"
                                                @click="filter('search', search)"><i class="fa fa-search"></i>&nbsp;
                                                {{ trans('brackets/admin-ui::admin.btn.search') }}</button>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-auto form-group ">
                                    <select class="form-control" v-model="pagination.state.per_page">

                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="100">100</option>
                                    </select>
                                </div>
                            </div>
                        </form>

                        <table class="table table-hover table-listing">
                            <thead>
                                <tr>

                                    <th is='sortable' :column="'id'">{{ trans('admin.customer.columns.id') }}</th>
                                    <th is='sortable' :column="'name'">{{ trans('admin.customer.columns.name') }}</th>
                                    <th is='sortable' :column="'country_id'">
                                        {{ trans('admin.customer.columns.country_id') }}</th>
                                    <th :column="'client_type_id'">
                                        {{ trans('admin.customer.columns.client_type_id') }}</th>
                                    <th is='sortable' :column="'active_projects'">
                                        {{ trans('admin.customer.columns.active_projects') }}</th>
                                    <th></th>
                                </tr>

                            </thead>
                            <tbody>
                                <tr v-for="(item, index) in collection" :key="item.id"
                                    :class="bulkItems[item.id] ? 'bg-bulk' : ''">
                                    <td class="bulk-checkbox">
                                        <input class="form-check-input" :id="'enabled' + item.id" type="checkbox"
                                            v-model="bulkItems[item.id]" v-validate="''"
                                            :data-vv-name="'enabled' + item.id"
                                            :name="'enabled' + item.id + '_fake_element'">
                                        <label class="form-check-label" :for="'enabled' + item.id">
                                        </label>
                                    </td>
                                    <td>@{{ item.id }}</td>
                                    <td>@{{ item.name }}</td>
                                    <td>@{{ item.country_id }}</td>
                                    <td>@{{ item.client_type_id }}</td>
                                    <td>@{{ item.active_projects }}</td>

                                    <td>
                                        <div class="row no-gutters">
                                            <div class="col-auto">
                                                <a class="btn btn-sm btn-spinner btn-info"
                                                    :href="item.resource_url + '/edit'"
                                                    title="{{ trans('brackets/admin-ui::admin.btn.edit') }}"
                                                    role="button"><i class="fa fa-edit"></i></a>
                                            </div>
                                            <form class="col" @submit.prevent="deleteItem(item.resource_url)">
                                                <button type="submit" class="btn btn-sm btn-danger"
                                                    title="{{ trans('brackets/admin-ui::admin.btn.delete') }}"><i
                                                        class="fa fa-trash-o"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="row" v-if="pagination.state.total > 0">
                            <div class="col-sm">
                                <span
                                    class="pagination-caption">{{ trans('brackets/admin-ui::admin.pagination.overview') }}</span>
                            </div>
                            <div class="col-sm-auto">
                                <pagination></pagination>
                            </div>
                        </div>

                        <div class="no-items-found" v-if="!collection.length > 0">
                            <i class="icon-magnifier"></i>
                            <h3>{{ trans('brackets/admin-ui::admin.index.no_items') }}</h3>
                            <p>{{ trans('brackets/admin-ui::admin.index.try_changing_items') }}</p>
                            <a class="btn btn-primary btn-spinner" href="{{ url('admin/customer-panels/create') }}"
                                role="button"><i class="fa fa-plus"></i>&nbsp;
                                {{ trans('admin.customer-panel.actions.create') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-pills mb-3" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-customer-tab" data-toggle="pill" href="#pills-customer"
                                role="tab" aria-controls="pills-customer" aria-selected="true">Customer</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-products-tab" data-toggle="pill" href="#pills-products"
                                role="tab" aria-controls="pills-products" aria-selected="false">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-cc-tab" data-toggle="pill" href="#pills-cc" role="tab"
                                aria-controls="pills-cc" aria-selected="false">Credit Cards</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-gf-tab" data-toggle="pill" href="#pills-gf" role="tab"
                                aria-controls="pills-gf" aria-selected="false">Global Footprint</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-stk-tab" data-toggle="pill" href="#pills-stk" role="tab"
                                aria-controls="pills-stk" aria-selected="false">Stakeholders</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-note-tab" data-toggle="pill" href="#pills-note" role="tab"
                                aria-controls="pills-note" aria-selected="false">Notes</a>
                        </li>
                    </ul>
                    <div class="tab-content border-0">
                        <div class="tab-pane fade show active" id="pills-customer" role="tabpanel"
                            aria-labelledby="pills-customer-tab">
                            @include('admin.customer-panel.components.form-customer')
                        </div>
                        <div class="tab-pane fade" id="pills-products" role="tabpanel"
                            aria-labelledby="pills-products-tab">
                            @include('admin.customer-panel.components.form-product')
                        </div>
                        <div class="tab-pane fade" id="pills-cc" role="tabpanel" aria-labelledby="pills-cc-tab">
                            @include('admin.customer-panel.components.form-card')
                        </div>
                        <div class="tab-pane fade" id="pills-gf" role="tabpanel" aria-labelledby="pills-gf-tab">
                            @include('admin.customer-panel.components.form-global-footprint')
                        </div>
                        <div class="tab-pane fade" id="pills-stk" role="tabpanel" aria-labelledby="pills-stk-tab">
                            @include('admin.customer-panel.components.form-stakeholder')
                        </div>
                        <div class="tab-pane fade" id="pills-note" role="tabpanel" aria-labelledby="pills-note-tab">
                            @include('admin.customer-panel.components.form-note')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</customer-panel-listing>

@endsection
