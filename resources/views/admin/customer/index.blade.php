@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.customer.actions.index'))

@section('body')

<customer-listing :data="{{ $data->toJson() }}" :url="'{{ url('admin/customers') }}'" inline-template>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-align-justify"></i> {{ trans('admin.customer.actions.index') }}
                    <a class="btn btn-primary btn-sm pull-right m-b-0 ml-2" href="{{ url('admin/customers/export') }}"
                        role="button"><i class="fa fa-file-excel-o"></i>&nbsp;
                        {{ trans('admin.customer.actions.export') }}</a>
                    <a class="btn btn-primary btn-spinner btn-sm pull-right m-b-0"
                        href="{{ url('admin/customers/create') }}" role="button"><i class="fa fa-plus"></i>&nbsp;
                        {{ trans('admin.customer.actions.create') }}</a>
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

                                <div class="col-sm-auto form-group pull-right">
                                    <select class="form-control" v-model="pagination.state.per_page">

                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="100">100</option>
                                    </select>
                                </div>
                            </div>
                            <!-- Filters -->
                            <div class="row justify-content-start">
                                <div class="col form-group deadline-checkbox-col">
                                    <div class="switch-filter-wrap">
                                        <label class="switch switch-3d switch-primary">
                                            <input type="checkbox" class="switch-input" v-model="showIndustriesFilter">
                                            <span class="switch-slider"></span>
                                        </label>
                                        <span
                                            style="bottom:8px;position:relative;">&nbsp;{{ __('Industries filter') }}</span>
                                    </div>
                                </div>

                                <div class="col form-group deadline-checkbox-col">
                                    <div class="switch-filter-wrap">
                                        <label class="switch switch-3d switch-primary">
                                            <input type="checkbox" class="switch-input" v-model="showTimezonesFilter">
                                            <span class="switch-slider"></span>
                                        </label>
                                        <span
                                            style="bottom:8px;position:relative;">&nbsp;{{ __('Timezones filter') }}</span>
                                    </div>
                                </div>

                                <div class="col form-group deadline-checkbox-col">
                                    <div class="switch-filter-wrap">
                                        <label class="switch switch-3d switch-primary">
                                            <input type="checkbox" class="switch-input"
                                                v-model="showProjectTypesFilter">
                                            <span class="switch-slider"></span>
                                        </label>
                                        <span
                                            style="bottom:8px;position:relative;">&nbsp;{{ __('Project types filter') }}</span>
                                    </div>
                                </div>

                                <div class="col form-group deadline-checkbox-col">
                                    <div class="switch-filter-wrap">
                                        <label class="switch switch-3d switch-primary">
                                            <input type="checkbox" class="switch-input" v-model="showClientTypesFilter">
                                            <span class="switch-slider"></span>
                                        </label>
                                        <span
                                            style="bottom:8px;position:relative;">&nbsp;{{ __('Client types filter') }}</span>
                                    </div>
                                </div>

                                <div class="col form-group deadline-checkbox-col">
                                    <div class="switch-filter-wrap">
                                        <label class="switch switch-3d switch-primary">
                                            <input type="checkbox" class="switch-input" v-model="showCountriesFilter">
                                            <span class="switch-slider"></span>
                                        </label>
                                        <span
                                            style="bottom:8px;position:relative;">&nbsp;{{ __('Countries filter') }}</span>
                                    </div>
                                </div>

                                <div class="col form-group deadline-checkbox-col">
                                    <div class="switch-filter-wrap">
                                        <label class="switch switch-3d switch-primary">
                                            <input type="checkbox" class="switch-input" v-model="showStatesFilter">
                                            <span class="switch-slider"></span>
                                        </label>
                                        <span
                                            style="bottom:8px;position:relative;">&nbsp;{{ __('States filter') }}</span>
                                    </div>
                                </div>

                                <div class="col form-group deadline-checkbox-col">
                                    <div class="switch-filter-wrap">
                                        <label class="switch switch-3d switch-primary">
                                            <input type="checkbox" class="switch-input"
                                                v-model="showProjectScopesFilter">
                                            <span class="switch-slider"></span>
                                        </label>
                                        <span
                                            style="bottom:8px;position:relative;">&nbsp;{{ __('Project scopes filter') }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-2 form-group deadline-checkbox-col">
                                    <div class="switch-filter-wrap">
                                        <label class="switch switch-3d switch-primary">
                                            <input type="checkbox" class="switch-input"
                                                v-model="showConcurProductsFilter">
                                            <span class="switch-slider"></span>
                                        </label>
                                        <span
                                            style="bottom:8px;position:relative;">&nbsp;{{ __('Concur products filter') }}</span>
                                    </div>
                                </div>
                                <div class="col form-group deadline-checkbox-col">
                                    <div class="switch-filter-wrap">
                                        <label class="switch switch-3d switch-primary">
                                            <input type="checkbox" class="switch-input" v-model="showTMCsFilter">
                                            <span class="switch-slider"></span>
                                        </label>
                                        <span style="bottom:8px;position:relative;">&nbsp;{{ __('TMCs filter') }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="row justify-content-start" v-if="showIndustriesFilter">
                                <div class="col-sm-auto form-group" style="margin-bottom: 0;">
                                    <p style="line-height: 40px; margin:0;">{{ __('Select industry/s') }}</p>
                                </div>
                                <div class="col col-lg-12 col-xl-12 form-group" style="max-width: 590px; ">
                                    <multiselect v-model="industriesMultiselect"
                                        :options="{{ $industries->map(function($industry) { return ['key' => $industry->id, 'label' =>  $industry->name]; })->toJson() }}"
                                        label="label" track-by="key"
                                        placeholder="{{ __('Type to search a industry/s') }}" :limit="2"
                                        :multiple="true">
                                    </multiselect>
                                </div>
                            </div>
                            <div class="row" v-if="showTimezonesFilter">
                                <div class="col-sm-auto form-group" style="margin-bottom: 0;">
                                    <p style="line-height: 40px; margin:0;">{{ __('Select timezone/s') }}</p>
                                </div>
                                <div class="col col-lg-12 col-xl-12 form-group" style="max-width: 590px; ">
                                    <multiselect v-model="timezonesMultiselect"
                                        :options="{{ $timezones->map(function($timezone) { return ['key' => $timezone->id, 'label' =>  $timezone->name]; })->toJson() }}"
                                        label="label" track-by="key"
                                        placeholder="{{ __('Type to search a timezone/s') }}" :limit="2"
                                        :multiple="true">
                                    </multiselect>
                                </div>
                            </div>
                            <div class="row" v-if="showProjectTypesFilter">
                                <div class="col-sm-auto form-group" style="margin-bottom: 0;">
                                    <p style="line-height: 40px; margin:0;">{{ __('Project type/s') }}</p>
                                </div>
                                <div class="col col-lg-12 col-xl-12 form-group" style="max-width: 590px; ">
                                    <multiselect v-model="projectTypesMultiselect"
                                        :options="{{ $project_types->map(function($project_type) { return ['key' => $project_type->id, 'label' =>  $project_type->name]; })->toJson() }}"
                                        label="label" track-by="key"
                                        placeholder="{{ __('Type to search a Project type/s') }}" :limit="2"
                                        :multiple="true">
                                    </multiselect>
                                </div>
                            </div>
                            <div class="row" v-if="showClientTypesFilter">
                                <div class="col-sm-auto form-group" style="margin-bottom: 0;">
                                    <p style="line-height: 40px; margin:0;">{{ __('Client type/s') }}</p>
                                </div>
                                <div class="col col-lg-12 col-xl-12 form-group" style="max-width: 590px; ">
                                    <multiselect v-model="clientTypesMultiselect"
                                        :options="{{ $client_types->map(function($client_type) { return ['key' => $client_type->id, 'label' =>  $client_type->name]; })->toJson() }}"
                                        label="label" track-by="key"
                                        placeholder="{{ __('Type to search a Client type/s') }}" :limit="2"
                                        :multiple="true">
                                    </multiselect>
                                </div>
                            </div>
                            <div class="row" v-if="showCountriesFilter">
                                <div class="col-sm-auto form-group" style="margin-bottom: 0;">
                                    <p style="line-height: 40px; margin:0;">{{ __('Country/s') }}</p>
                                </div>
                                <div class="col col-lg-12 col-xl-12 form-group" style="max-width: 590px; ">
                                    <multiselect v-model="countriesMultiselect"
                                        :options="{{ $countries->map(function($country) { return ['key' => $country->id, 'label' =>  $country->name]; })->toJson() }}"
                                        label="label" track-by="key"
                                        placeholder="{{ __('Type to search a country/s') }}" :limit="2"
                                        :multiple="true">
                                    </multiselect>
                                </div>
                            </div>
                            <div class="row" v-if="showStatesFilter">
                                <div class="col-sm-auto form-group" style="margin-bottom: 0;">
                                    <p style="line-height: 40px; margin:0;">{{ __('State/s') }}</p>
                                </div>
                                <div class="col col-lg-12 col-xl-12 form-group" style="max-width: 590px; ">
                                    <multiselect v-model="statesMultiselect"
                                        :options="{{ $states->map(function($state) { return ['key' => $state->id, 'label' =>  $state->name]; })->toJson() }}"
                                        label="label" track-by="key" placeholder="{{ __('Type to search a state/s') }}"
                                        :limit="2" :multiple="true">
                                    </multiselect>
                                </div>
                            </div>
                            <div class="row" v-if="showProjectScopesFilter">
                                <div class="col-sm-auto form-group" style="margin-bottom: 0;">
                                    <p style="line-height: 40px; margin:0;">{{ __('Project Scope/s') }}</p>
                                </div>
                                <div class="col col-lg-12 col-xl-12 form-group" style="max-width: 590px; ">
                                    <multiselect v-model="projectScopesMultiselect"
                                        :options="{{ $project_scopes->map(function($project_scope) { return ['key' => $project_scope->id, 'label' =>  $project_scope->name]; })->toJson() }}"
                                        label="label" track-by="key"
                                        placeholder="{{ __('Type to search a project scope/s') }}" :limit="2"
                                        :multiple="true">
                                    </multiselect>
                                </div>
                            </div>
                            <div class="row" v-if="showConcurProductsFilter">
                                <div class="col-sm-auto form-group" style="margin-bottom: 0;">
                                    <p style="line-height: 40px; margin:0;">{{ __('Concur product/s') }}</p>
                                </div>
                                <div class="col col-lg-12 col-xl-12 form-group" style="max-width: 590px; ">
                                    <multiselect v-model="concurProductsMultiselect"
                                        :options="{{ $concur_products->map(function($concur_product) { return ['key' => $concur_product->id, 'label' =>  $concur_product->product]; })->toJson() }}"
                                        label="label" track-by="key"
                                        placeholder="{{ __('Type to search a concur product/s') }}" :limit="2"
                                        :multiple="true">
                                    </multiselect>
                                </div>
                            </div>
                            <div class="row" v-if="showTMCsFilter">
                                <div class="col-sm-auto form-group" style="margin-bottom: 0;">
                                    <p style="line-height: 40px; margin:0;">{{ __('TMC/s') }}</p>
                                </div>
                                <div class="col col-lg-12 col-xl-12 form-group" style="max-width: 590px; ">
                                    <multiselect v-model="TMCsMultiselect"
                                        :options="{{ $tmcs->map(function($tmc) { return ['key' => $tmc->id, 'label' =>  $tmc->name]; })->toJson() }}"
                                        label="label" track-by="key" placeholder="{{ __('Type to search a TMC/s') }}"
                                        :limit="2" :multiple="true">
                                    </multiselect>
                                </div>
                            </div>
                        </form>

                        <table class="table table-hover table-listing">
                            <thead>
                                <tr>
                                    <th class="bulk-checkbox">
                                        <input class="form-check-input" id="enabled" type="checkbox"
                                            v-model="isClickedAll" v-validate="''" data-vv-name="enabled"
                                            name="enabled_fake_element" @click="onBulkItemsClickedAllWithPagination()">
                                        <label class="form-check-label" for="enabled">
                                            #
                                        </label>
                                    </th>

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
                                <tr v-show="(clickedBulkItemsCount > 0) || isClickedAll">
                                    <td class="bg-bulk-info d-table-cell text-center" colspan="31">
                                        <span
                                            class="align-middle font-weight-light text-dark">{{ trans('brackets/admin-ui::admin.listing.selected_items') }}
                                            @{{ clickedBulkItemsCount }}. <a href="#" class="text-primary"
                                                @click="onBulkItemsClickedAll('/admin/customers')"
                                                v-if="(clickedBulkItemsCount < pagination.state.total)"> <i class="fa"
                                                    :class="bulkCheckingAllLoader ? 'fa-spinner' : ''"></i>
                                                {{ trans('brackets/admin-ui::admin.listing.check_all_items') }}
                                                @{{ pagination.state.total }}</a> <span class="text-primary">|</span> <a
                                                href="#" class="text-primary"
                                                @click="onBulkItemsClickedAllUncheck()">{{ trans('brackets/admin-ui::admin.listing.uncheck_all_items') }}</a>
                                        </span>

                                        <span class="pull-right pr-2">
                                            <button class="btn btn-sm btn-danger pr-3 pl-3"
                                                @click="bulkDelete('/admin/customers/bulk-destroy')">{{ trans('brackets/admin-ui::admin.btn.delete') }}</button>
                                        </span>

                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(item, index) in collection" :key="item.id"
                                    :class="bulkItems[item.id] ? 'bg-bulk' : ''">
                                    <td class="bulk-checkbox">
                                        <input class="form-check-input" :id="'enabled' + item.id" type="checkbox"
                                            v-model="bulkItems[item.id]" v-validate="''"
                                            :data-vv-name="'enabled' + item.id"
                                            :name="'enabled' + item.id + '_fake_element'"
                                            @click="onBulkItemClicked(item.id)" :disabled="bulkCheckingAllLoader">
                                        <label class="form-check-label" :for="'enabled' + item.id">
                                        </label>
                                    </td>

                                    <td>@{{ item.id }}</td>
                                    <td>@{{ item.name }}</td>
                                    <td>@{{ item.country.name }}</td>
                                    <td>@{{ item.client_type.name }}</td>
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
                            <a class="btn btn-primary btn-spinner" href="{{ url('admin/customers/create') }}"
                                role="button"><i class="fa fa-plus"></i>&nbsp;
                                {{ trans('admin.customer.actions.create') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</customer-listing>

@endsection
