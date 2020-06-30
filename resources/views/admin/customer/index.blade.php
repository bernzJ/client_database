@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.customer.actions.index'))

@section('body')

<customer-listing :data="{{ $data->toJson() }}" :url="'{{ url('admin/customers') }}'" inline-template>

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-align-justify"></i> {{ trans('admin.customer.actions.index') }}
                    <a class="btn btn-primary btn-spinner btn-sm pull-right m-b-0" href="{{ url('admin/customers/create') }}" role="button"><i class="fa fa-plus"></i>&nbsp; {{ trans('admin.customer.actions.create') }}</a>
                </div>
                <div class="card-body" v-cloak>
                    <div class="card-block">
                        <form @submit.prevent="">
                            <div class="row justify-content-md-between">
                                <div class="col col-lg-7 col-xl-5 form-group">
                                    <div class="input-group">
                                        <input class="form-control" placeholder="{{ trans('brackets/admin-ui::admin.placeholder.search') }}" v-model="search" @keyup.enter="filter('search', $event.target.value)" />
                                        <span class="input-group-append">
                                            <button type="button" class="btn btn-primary" @click="filter('search', search)"><i class="fa fa-search"></i>&nbsp; {{ trans('brackets/admin-ui::admin.btn.search') }}</button>
                                        </span>
                                    </div>
                                </div>
                                <div class="col form-group deadline-checkbox-col">
                                    <div class="switch-filter-wrap">
                                        <label class="switch switch-3d switch-primary">
                                            <input type="checkbox" class="switch-input" v-model="showIndustriesFilter">
                                            <span class="switch-slider"></span>
                                        </label>
                                        <span class="Industries-filter">&nbsp;{{ __('Industries filter') }}</span>
                                    </div>
                                </div>
                                <div class="col-sm-auto form-group ">
                                    <select class="form-control" v-model="pagination.state.per_page">

                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="100">100</option>
                                    </select>
                                </div>
                                <div class="row" v-if="showIndustriesFilter">
                                    <div class="col-sm-auto form-group" style="margin-bottom: 0;">
                                        <p style="line-height: 40px; margin:0;">{{ __('Select industry/s') }}</p>
                                    </div>
                                    <div class="col col-lg-12 col-xl-12 form-group" style="max-width: 590px; ">
                                        <multiselect v-model="industriesMultiselect" :options="{{ $industries->map(function($industry) { return ['key' => $industry->id, 'label' =>  $industry->name]; })->toJson() }}" label="label" track-by="key" placeholder="{{ __('Type to search a industry/s') }}" :limit="2" :multiple="true">
                                        </multiselect>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <table class="table table-hover table-listing">
                            <thead>
                                <tr>
                                    <th class="bulk-checkbox">
                                        <input class="form-check-input" id="enabled" type="checkbox" v-model="isClickedAll" v-validate="''" data-vv-name="enabled" name="enabled_fake_element" @click="onBulkItemsClickedAllWithPagination()">
                                        <label class="form-check-label" for="enabled">
                                            #
                                        </label>
                                    </th>

                                    <th is='sortable' :column="'id'">{{ trans('admin.customer.columns.id') }}</th>
                                    <th is='sortable' :column="'name'">{{ trans('admin.customer.columns.name') }}</th>
                                    <th is='sortable' :column="'website'">{{ trans('admin.customer.columns.website') }}</th>
                                    <th :column="'industry'">{{ trans('admin.customer.columns.industry') }}</th>
                                    <th is='sortable' :column="'timezone'">{{ trans('admin.customer.columns.timezone') }}</th>
                                    <th is='sortable' :column="'fiscal_year'">{{ trans('admin.customer.columns.fiscal_year') }}</th>
                                    <th is='sortable' :column="'employees_count'">{{ trans('admin.customer.columns.employees_count') }}</th>
                                    <th is='sortable' :column="'project_type'">{{ trans('admin.customer.columns.project_type') }}</th>
                                    <th is='sortable' :column="'client_type'">{{ trans('admin.customer.columns.client_type') }}</th>
                                    <th is='sortable' :column="'active_projects'">{{ trans('admin.customer.columns.active_projects') }}</th>
                                    <th is='sortable' :column="'referenceable'">{{ trans('admin.customer.columns.referenceable') }}</th>
                                    <th is='sortable' :column="'opted_out'">{{ trans('admin.customer.columns.opted_out') }}</th>
                                    <th is='sortable' :column="'financial'">{{ trans('admin.customer.columns.financial') }}</th>
                                    <th is='sortable' :column="'hr'">{{ trans('admin.customer.columns.hr') }}</th>
                                    <th is='sortable' :column="'sso'">{{ trans('admin.customer.columns.sso') }}</th>
                                    <th is='sortable' :column="'test_site'">{{ trans('admin.customer.columns.test_site') }}</th>
                                    <th is='sortable' :column="'refresh_date'">{{ trans('admin.customer.columns.refresh_date') }}</th>
                                    <th is='sortable' :column="'logo'">{{ trans('admin.customer.columns.logo') }}</th>
                                    <th is='sortable' :column="'address_1'">{{ trans('admin.customer.columns.address_1') }}</th>
                                    <th is='sortable' :column="'address_2'">{{ trans('admin.customer.columns.address_2') }}</th>
                                    <th is='sortable' :column="'address_lng_lat'">{{ trans('admin.customer.columns.address_lng_lat') }}</th>
                                    <th is='sortable' :column="'city'">{{ trans('admin.customer.columns.city') }}</th>
                                    <th is='sortable' :column="'zip'">{{ trans('admin.customer.columns.zip') }}</th>
                                    <th is='sortable' :column="'country'">{{ trans('admin.customer.columns.country') }}</th>
                                    <th is='sortable' :column="'state'">{{ trans('admin.customer.columns.state') }}</th>
                                    <th is='sortable' :column="'lg_account_owner_oversight'">{{ trans('admin.customer.columns.lg_account_owner_oversight') }}</th>
                                    <th is='sortable' :column="'lg_sales_owner'">{{ trans('admin.customer.columns.lg_sales_owner') }}</th>
                                    <th is='sortable' :column="'employee_groups'">{{ trans('admin.customer.columns.employee_groups') }}</th>
                                    <th is='sortable' :column="'notes'">{{ trans('admin.customer.columns.notes') }}</th>

                                    <th></th>
                                </tr>
                                <tr v-show="(clickedBulkItemsCount > 0) || isClickedAll">
                                    <td class="bg-bulk-info d-table-cell text-center" colspan="31">
                                        <span class="align-middle font-weight-light text-dark">{{ trans('brackets/admin-ui::admin.listing.selected_items') }} @{{ clickedBulkItemsCount }}. <a href="#" class="text-primary" @click="onBulkItemsClickedAll('/admin/customers')" v-if="(clickedBulkItemsCount < pagination.state.total)"> <i class="fa" :class="bulkCheckingAllLoader ? 'fa-spinner' : ''"></i> {{ trans('brackets/admin-ui::admin.listing.check_all_items') }} @{{ pagination.state.total }}</a> <span class="text-primary">|</span> <a href="#" class="text-primary" @click="onBulkItemsClickedAllUncheck()">{{ trans('brackets/admin-ui::admin.listing.uncheck_all_items') }}</a> </span>

                                        <span class="pull-right pr-2">
                                            <button class="btn btn-sm btn-danger pr-3 pl-3" @click="bulkDelete('/admin/customers/bulk-destroy')">{{ trans('brackets/admin-ui::admin.btn.delete') }}</button>
                                        </span>

                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(item, index) in collection" :key="item.id" :class="bulkItems[item.id] ? 'bg-bulk' : ''">
                                    <td class="bulk-checkbox">
                                        <input class="form-check-input" :id="'enabled' + item.id" type="checkbox" v-model="bulkItems[item.id]" v-validate="''" :data-vv-name="'enabled' + item.id" :name="'enabled' + item.id + '_fake_element'" @click="onBulkItemClicked(item.id)" :disabled="bulkCheckingAllLoader">
                                        <label class="form-check-label" :for="'enabled' + item.id">
                                        </label>
                                    </td>
                                    <td>@{{ item.id }}</td>
                                    <td>@{{ item.name }}</td>
                                    <td>@{{ item.website }}</td>
                                    <td>
                                        @{{ item.industries }}
                                    </td>
                                    <td>@{{ item.timezone }}</td>
                                    <td>@{{ item.fiscal_year }}</td>
                                    <td>@{{ item.employees_count }}</td>
                                    <td>@{{ item.project_type }}</td>
                                    <td>@{{ item.client_type }}</td>
                                    <td>@{{ item.active_projects }}</td>
                                    <td>@{{ item.referenceable }}</td>
                                    <td>@{{ item.opted_out }}</td>
                                    <td>@{{ item.financial }}</td>
                                    <td>@{{ item.hr }}</td>
                                    <td>@{{ item.sso }}</td>
                                    <td>@{{ item.test_site }}</td>
                                    <td>@{{ item.refresh_date | date }}</td>
                                    <td>@{{ item.logo }}</td>
                                    <td>@{{ item.address_1 }}</td>
                                    <td>@{{ item.address_2 }}</td>
                                    <td>@{{ item.address_lng_lat }}</td>
                                    <td>@{{ item.city }}</td>
                                    <td>@{{ item.zip }}</td>
                                    <td>@{{ item.country }}</td>
                                    <td>@{{ item.state }}</td>
                                    <td>@{{ item.lg_account_owner_oversight }}</td>
                                    <td>@{{ item.lg_sales_owner }}</td>
                                    <td>@{{ item.employee_groups }}</td>
                                    <td>@{{ item.notes }}</td>

                                    <td>
                                        <div class="row no-gutters">
                                            <div class="col-auto">
                                                <a class="btn btn-sm btn-spinner btn-info" :href="item.resource_url + '/edit'" title="{{ trans('brackets/admin-ui::admin.btn.edit') }}" role="button"><i class="fa fa-edit"></i></a>
                                            </div>
                                            <form class="col" @submit.prevent="deleteItem(item.resource_url)">
                                                <button type="submit" class="btn btn-sm btn-danger" title="{{ trans('brackets/admin-ui::admin.btn.delete') }}"><i class="fa fa-trash-o"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="row" v-if="pagination.state.total > 0">
                            <div class="col-sm">
                                <span class="pagination-caption">{{ trans('brackets/admin-ui::admin.pagination.overview') }}</span>
                            </div>
                            <div class="col-sm-auto">
                                <pagination></pagination>
                            </div>
                        </div>

                        <div class="no-items-found" v-if="!collection.length > 0">
                            <i class="icon-magnifier"></i>
                            <h3>{{ trans('brackets/admin-ui::admin.index.no_items') }}</h3>
                            <p>{{ trans('brackets/admin-ui::admin.index.try_changing_items') }}</p>
                            <a class="btn btn-primary btn-spinner" href="{{ url('admin/customers/create') }}" role="button"><i class="fa fa-plus"></i>&nbsp; {{ trans('admin.customer.actions.create') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</customer-listing>

@endsection
