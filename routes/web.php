<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::prefix('admin-users')->name('admin-users/')->group(static function() {
            Route::get('/',                                             'AdminUsersController@index')->name('index');
            Route::get('/create',                                       'AdminUsersController@create')->name('create');
            Route::post('/',                                            'AdminUsersController@store')->name('store');
            Route::get('/{adminUser}/impersonal-login',                 'AdminUsersController@impersonalLogin')->name('impersonal-login');
            Route::get('/{adminUser}/edit',                             'AdminUsersController@edit')->name('edit');
            Route::post('/{adminUser}',                                 'AdminUsersController@update')->name('update');
            Route::delete('/{adminUser}',                               'AdminUsersController@destroy')->name('destroy');
            Route::get('/{adminUser}/resend-activation',                'AdminUsersController@resendActivationEmail')->name('resendActivationEmail');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::get('/profile',                                      'ProfileController@editProfile')->name('edit-profile');
        Route::post('/profile',                                     'ProfileController@updateProfile')->name('update-profile');
        Route::get('/password',                                     'ProfileController@editPassword')->name('edit-password');
        Route::post('/password',                                    'ProfileController@updatePassword')->name('update-password');
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::prefix('customers')->name('customers/')->group(static function() {
            Route::get('/',                                             'CustomersController@index')->name('index');
            Route::get('/create',                                       'CustomersController@create')->name('create');
            Route::post('/',                                            'CustomersController@store')->name('store');
            Route::get('/{customer}/edit',                              'CustomersController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'CustomersController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{customer}',                                  'CustomersController@update')->name('update');
            Route::delete('/{customer}',                                'CustomersController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::prefix('industries')->name('industries/')->group(static function() {
            Route::get('/',                                             'IndustriesController@index')->name('index');
            Route::get('/create',                                       'IndustriesController@create')->name('create');
            Route::post('/',                                            'IndustriesController@store')->name('store');
            Route::get('/{industry}/edit',                              'IndustriesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'IndustriesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{industry}',                                  'IndustriesController@update')->name('update');
            Route::delete('/{industry}',                                'IndustriesController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::prefix('dashboards')->name('dashboards/')->group(static function() {
            Route::get('/',                                             'DashboardController@index')->name('index');
        });
    });
});


/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::prefix('client-types')->name('client-types/')->group(static function() {
            Route::get('/',                                             'ClientTypeController@index')->name('index');
            Route::get('/create',                                       'ClientTypeController@create')->name('create');
            Route::post('/',                                            'ClientTypeController@store')->name('store');
            Route::get('/{clientType}/edit',                            'ClientTypeController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'ClientTypeController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{clientType}',                                'ClientTypeController@update')->name('update');
            Route::delete('/{clientType}',                              'ClientTypeController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::prefix('industries')->name('industries/')->group(static function() {
            Route::get('/',                                             'IndustriesController@index')->name('index');
            Route::get('/create',                                       'IndustriesController@create')->name('create');
            Route::post('/',                                            'IndustriesController@store')->name('store');
            Route::get('/{industry}/edit',                              'IndustriesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'IndustriesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{industry}',                                  'IndustriesController@update')->name('update');
            Route::delete('/{industry}',                                'IndustriesController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::prefix('timezones')->name('timezones/')->group(static function() {
            Route::get('/',                                             'TimezonesController@index')->name('index');
            Route::get('/create',                                       'TimezonesController@create')->name('create');
            Route::post('/',                                            'TimezonesController@store')->name('store');
            Route::get('/{timezone}/edit',                              'TimezonesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'TimezonesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{timezone}',                                  'TimezonesController@update')->name('update');
            Route::delete('/{timezone}',                                'TimezonesController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::prefix('fiscal-years')->name('fiscal-years/')->group(static function() {
            Route::get('/',                                             'FiscalYearController@index')->name('index');
            Route::get('/create',                                       'FiscalYearController@create')->name('create');
            Route::post('/',                                            'FiscalYearController@store')->name('store');
            Route::get('/{fiscalYear}/edit',                            'FiscalYearController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'FiscalYearController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{fiscalYear}',                                'FiscalYearController@update')->name('update');
            Route::delete('/{fiscalYear}',                              'FiscalYearController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::prefix('project-types')->name('project-types/')->group(static function() {
            Route::get('/',                                             'ProjectTypeController@index')->name('index');
            Route::get('/create',                                       'ProjectTypeController@create')->name('create');
            Route::post('/',                                            'ProjectTypeController@store')->name('store');
            Route::get('/{projectType}/edit',                           'ProjectTypeController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'ProjectTypeController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{projectType}',                               'ProjectTypeController@update')->name('update');
            Route::delete('/{projectType}',                             'ProjectTypeController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::prefix('financials')->name('financials/')->group(static function() {
            Route::get('/',                                             'FinancialController@index')->name('index');
            Route::get('/create',                                       'FinancialController@create')->name('create');
            Route::post('/',                                            'FinancialController@store')->name('store');
            Route::get('/{financial}/edit',                             'FinancialController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'FinancialController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{financial}',                                 'FinancialController@update')->name('update');
            Route::delete('/{financial}',                               'FinancialController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::prefix('hrs')->name('hrs/')->group(static function() {
            Route::get('/',                                             'HrController@index')->name('index');
            Route::get('/create',                                       'HrController@create')->name('create');
            Route::post('/',                                            'HrController@store')->name('store');
            Route::get('/{hr}/edit',                                    'HrController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'HrController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{hr}',                                        'HrController@update')->name('update');
            Route::delete('/{hr}',                                      'HrController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::prefix('countries')->name('countries/')->group(static function() {
            Route::get('/',                                             'CountriesController@index')->name('index');
            Route::get('/create',                                       'CountriesController@create')->name('create');
            Route::post('/',                                            'CountriesController@store')->name('store');
            Route::get('/{country}/edit',                               'CountriesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'CountriesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{country}',                                   'CountriesController@update')->name('update');
            Route::delete('/{country}',                                 'CountriesController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::prefix('employee-groups')->name('employee-groups/')->group(static function() {
            Route::get('/',                                             'EmployeeGroupsController@index')->name('index');
            Route::get('/create',                                       'EmployeeGroupsController@create')->name('create');
            Route::post('/',                                            'EmployeeGroupsController@store')->name('store');
            Route::get('/{employeeGroup}/edit',                         'EmployeeGroupsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'EmployeeGroupsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{employeeGroup}',                             'EmployeeGroupsController@update')->name('update');
            Route::delete('/{employeeGroup}',                           'EmployeeGroupsController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::prefix('notes')->name('notes/')->group(static function() {
            Route::get('/',                                             'NotesController@index')->name('index');
            Route::get('/create',                                       'NotesController@create')->name('create');
            Route::post('/',                                            'NotesController@store')->name('store');
            Route::get('/{note}/edit',                                  'NotesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'NotesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{note}',                                      'NotesController@update')->name('update');
            Route::delete('/{note}',                                    'NotesController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::prefix('frequencies')->name('frequencies/')->group(static function() {
            Route::get('/',                                             'FrequencyController@index')->name('index');
            Route::get('/create',                                       'FrequencyController@create')->name('create');
            Route::post('/',                                            'FrequencyController@store')->name('store');
            Route::get('/{frequency}/edit',                             'FrequencyController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'FrequencyController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{frequency}',                                 'FrequencyController@update')->name('update');
            Route::delete('/{frequency}',                               'FrequencyController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::prefix('liabilities')->name('liabilities/')->group(static function() {
            Route::get('/',                                             'LiabilityController@index')->name('index');
            Route::get('/create',                                       'LiabilityController@create')->name('create');
            Route::post('/',                                            'LiabilityController@store')->name('store');
            Route::get('/{liability}/edit',                             'LiabilityController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'LiabilityController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{liability}',                                 'LiabilityController@update')->name('update');
            Route::delete('/{liability}',                               'LiabilityController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::prefix('card-programs')->name('card-programs/')->group(static function() {
            Route::get('/',                                             'CardProgramsController@index')->name('index');
            Route::get('/create',                                       'CardProgramsController@create')->name('create');
            Route::post('/',                                            'CardProgramsController@store')->name('store');
            Route::get('/{cardProgram}/edit',                           'CardProgramsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'CardProgramsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{cardProgram}',                               'CardProgramsController@update')->name('update');
            Route::delete('/{cardProgram}',                             'CardProgramsController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::prefix('payrolls')->name('payrolls/')->group(static function() {
            Route::get('/',                                             'PayrollController@index')->name('index');
            Route::get('/create',                                       'PayrollController@create')->name('create');
            Route::post('/',                                            'PayrollController@store')->name('store');
            Route::get('/{payroll}/edit',                               'PayrollController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'PayrollController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{payroll}',                                   'PayrollController@update')->name('update');
            Route::delete('/{payroll}',                                 'PayrollController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::prefix('states')->name('states/')->group(static function() {
            Route::get('/',                                             'StateController@index')->name('index');
            Route::get('/create',                                       'StateController@create')->name('create');
            Route::post('/',                                            'StateController@store')->name('store');
            Route::get('/{state}/edit',                                 'StateController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'StateController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{state}',                                     'StateController@update')->name('update');
            Route::delete('/{state}',                                   'StateController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::prefix('customers')->name('customers/')->group(static function() {
            Route::get('/',                                             'CustomersController@index')->name('index');
            Route::get('/create',                                       'CustomersController@create')->name('create');
            Route::post('/',                                            'CustomersController@store')->name('store');
            Route::get('/{customer}/edit',                              'CustomersController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'CustomersController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{customer}',                                  'CustomersController@update')->name('update');
            Route::delete('/{customer}',                                'CustomersController@destroy')->name('destroy');
        });
    });
});
