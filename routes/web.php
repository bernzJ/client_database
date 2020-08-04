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
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function () {
        Route::prefix('admin-users')->name('admin-users/')->group(static function () {
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
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function () {
        Route::get('/profile',                                      'ProfileController@editProfile')->name('edit-profile');
        Route::post('/profile',                                     'ProfileController@updateProfile')->name('update-profile');
        Route::get('/password',                                     'ProfileController@editPassword')->name('edit-password');
        Route::post('/password',                                    'ProfileController@updatePassword')->name('update-password');
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function () {
        Route::prefix('customers')->name('customers/')->group(static function () {
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
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function () {
        Route::prefix('industries')->name('industries/')->group(static function () {
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
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function () {
        Route::prefix('dashboards')->name('dashboards/')->group(static function () {
            Route::get('/',                                             'DashboardController@index')->name('index');
        });
    });
});


/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function () {
        Route::prefix('client-types')->name('client-types/')->group(static function () {
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
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function () {
        Route::prefix('industries')->name('industries/')->group(static function () {
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
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function () {
        Route::prefix('timezones')->name('timezones/')->group(static function () {
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
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function () {
        Route::prefix('fiscal-years')->name('fiscal-years/')->group(static function () {
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
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function () {
        Route::prefix('project-types')->name('project-types/')->group(static function () {
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
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function () {
        Route::prefix('financials')->name('financials/')->group(static function () {
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
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function () {
        Route::prefix('hrs')->name('hrs/')->group(static function () {
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
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function () {
        Route::prefix('countries')->name('countries/')->group(static function () {
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
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function () {
        Route::prefix('notes')->name('notes/')->group(static function () {
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
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function () {
        Route::prefix('states')->name('states/')->group(static function () {
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
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function () {
        Route::prefix('customers')->name('customers/')->group(static function () {
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
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function () {
        Route::prefix('concur-products')->name('concur-products/')->group(static function () {
            Route::get('/',                                             'ConcurProductsController@index')->name('index');
            Route::get('/create',                                       'ConcurProductsController@create')->name('create');
            Route::post('/',                                            'ConcurProductsController@store')->name('store');
            Route::get('/{concurProduct}/edit',                         'ConcurProductsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'ConcurProductsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{concurProduct}',                             'ConcurProductsController@update')->name('update');
            Route::delete('/{concurProduct}',                           'ConcurProductsController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function () {
        Route::prefix('concur-product-customers')->name('concur-product-customers/')->group(static function () {
            Route::get('/',                                             'ConcurProductCustomerController@index')->name('index');
            Route::get('/create',                                       'ConcurProductCustomerController@create')->name('create');
            Route::post('/',                                            'ConcurProductCustomerController@store')->name('store');
            Route::get('/{concurProductCustomer}/edit',                 'ConcurProductCustomerController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'ConcurProductCustomerController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{concurProductCustomer}',                     'ConcurProductCustomerController@update')->name('update');
            Route::delete('/{concurProductCustomer}',                   'ConcurProductCustomerController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function () {
        Route::prefix('financials')->name('financials/')->group(static function () {
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
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function () {
        Route::prefix('concur-products')->name('concur-products/')->group(static function () {
            Route::get('/',                                             'ConcurProductsController@index')->name('index');
            Route::get('/create',                                       'ConcurProductsController@create')->name('create');
            Route::post('/',                                            'ConcurProductsController@store')->name('store');
            Route::get('/{concurProduct}/edit',                         'ConcurProductsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'ConcurProductsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{concurProduct}',                             'ConcurProductsController@update')->name('update');
            Route::delete('/{concurProduct}',                           'ConcurProductsController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function () {
        Route::prefix('segments')->name('segments/')->group(static function () {
            Route::get('/',                                             'SegmentsController@index')->name('index');
            Route::get('/create',                                       'SegmentsController@create')->name('create');
            Route::post('/',                                            'SegmentsController@store')->name('store');
            Route::get('/{segment}/edit',                               'SegmentsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'SegmentsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{segment}',                                   'SegmentsController@update')->name('update');
            Route::delete('/{segment}',                                 'SegmentsController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function () {
        Route::prefix('notes')->name('notes/')->group(static function () {
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
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function () {
        Route::prefix('hrs')->name('hrs/')->group(static function () {
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
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function () {
        Route::prefix('employee-groups')->name('employee-groups/')->group(static function () {
            Route::get('/',                                             'EmployeeGroupController@index')->name('index');
            Route::get('/create',                                       'EmployeeGroupController@create')->name('create');
            Route::post('/',                                            'EmployeeGroupController@store')->name('store');
            Route::get('/{employeeGroup}/edit',                         'EmployeeGroupController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'EmployeeGroupController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{employeeGroup}',                             'EmployeeGroupController@update')->name('update');
            Route::delete('/{employeeGroup}',                           'EmployeeGroupController@destroy')->name('destroy');
        });
    });
});


/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function () {
        Route::prefix('employee-groups')->name('employee-groups/')->group(static function () {
            Route::get('/',                                             'EmployeeGroupController@index')->name('index');
            Route::get('/create',                                       'EmployeeGroupController@create')->name('create');
            Route::post('/',                                            'EmployeeGroupController@store')->name('store');
            Route::get('/{employeeGroup}/edit',                         'EmployeeGroupController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'EmployeeGroupController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{employeeGroup}',                             'EmployeeGroupController@update')->name('update');
            Route::delete('/{employeeGroup}',                           'EmployeeGroupController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function () {
        Route::prefix('tmcs')->name('tmcs/')->group(static function () {
            Route::get('/',                                             'TmcController@index')->name('index');
            Route::get('/create',                                       'TmcController@create')->name('create');
            Route::post('/',                                            'TmcController@store')->name('store');
            Route::get('/{tmc}/edit',                                   'TmcController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'TmcController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{tmc}',                                       'TmcController@update')->name('update');
            Route::delete('/{tmc}',                                     'TmcController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function () {
        Route::prefix('tmc-customers')->name('tmc-customers/')->group(static function () {
            Route::get('/',                                             'TmcCustomerController@index')->name('index');
            Route::get('/create',                                       'TmcCustomerController@create')->name('create');
            Route::post('/',                                            'TmcCustomerController@store')->name('store');
            Route::get('/{tmcCustomer}/edit',                           'TmcCustomerController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'TmcCustomerController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{tmcCustomer}',                               'TmcCustomerController@update')->name('update');
            Route::delete('/{tmcCustomer}',                             'TmcCustomerController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function () {
        Route::prefix('payment-methods')->name('payment-methods/')->group(static function () {
            Route::get('/',                                             'PaymentMethodsController@index')->name('index');
            Route::get('/create',                                       'PaymentMethodsController@create')->name('create');
            Route::post('/',                                            'PaymentMethodsController@store')->name('store');
            Route::get('/{paymentMethod}/edit',                         'PaymentMethodsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'PaymentMethodsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{paymentMethod}',                             'PaymentMethodsController@update')->name('update');
            Route::delete('/{paymentMethod}',                           'PaymentMethodsController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function () {
        Route::prefix('liabilities')->name('liabilities/')->group(static function () {
            Route::get('/',                                             'LiabilitiesController@index')->name('index');
            Route::get('/create',                                       'LiabilitiesController@create')->name('create');
            Route::post('/',                                            'LiabilitiesController@store')->name('store');
            Route::get('/{liability}/edit',                             'LiabilitiesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'LiabilitiesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{liability}',                                 'LiabilitiesController@update')->name('update');
            Route::delete('/{liability}',                               'LiabilitiesController@destroy')->name('destroy');
        });
    });
});


/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function () {
        Route::prefix('credit-cards')->name('credit-cards/')->group(static function () {
            Route::get('/',                                             'CreditCardsController@index')->name('index');
            Route::get('/create',                                       'CreditCardsController@create')->name('create');
            Route::post('/',                                            'CreditCardsController@store')->name('store');
            Route::get('/{creditCard}/edit',                            'CreditCardsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'CreditCardsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{creditCard}',                                'CreditCardsController@update')->name('update');
            Route::delete('/{creditCard}',                              'CreditCardsController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function () {
        Route::prefix('payment-methods')->name('payment-methods/')->group(static function () {
            Route::get('/',                                             'PaymentMethodsController@index')->name('index');
            Route::get('/create',                                       'PaymentMethodsController@create')->name('create');
            Route::post('/',                                            'PaymentMethodsController@store')->name('store');
            Route::get('/{paymentMethod}/edit',                         'PaymentMethodsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'PaymentMethodsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{paymentMethod}',                             'PaymentMethodsController@update')->name('update');
            Route::delete('/{paymentMethod}',                           'PaymentMethodsController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function () {
        Route::prefix('reimbursements')->name('reimbursements/')->group(static function () {
            Route::get('/',                                             'ReimbursementController@index')->name('index');
            Route::get('/create',                                       'ReimbursementController@create')->name('create');
            Route::post('/',                                            'ReimbursementController@store')->name('store');
            Route::get('/{reimbursement}/edit',                         'ReimbursementController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'ReimbursementController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{reimbursement}',                             'ReimbursementController@update')->name('update');
            Route::delete('/{reimbursement}',                           'ReimbursementController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function () {
        Route::prefix('global-footprints')->name('global-footprints/')->group(static function () {
            Route::get('/',                                             'GlobalFootprintController@index')->name('index');
            Route::get('/create',                                       'GlobalFootprintController@create')->name('create');
            Route::post('/',                                            'GlobalFootprintController@store')->name('store');
            Route::get('/{globalFootprint}/edit',                       'GlobalFootprintController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'GlobalFootprintController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{globalFootprint}',                           'GlobalFootprintController@update')->name('update');
            Route::delete('/{globalFootprint}',                         'GlobalFootprintController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function () {
        Route::prefix('global-footprint-countries')->name('global-footprint-countries/')->group(static function () {
            Route::get('/',                                             'GlobalFootprintCountryController@index')->name('index');
            Route::get('/create',                                       'GlobalFootprintCountryController@create')->name('create');
            Route::post('/',                                            'GlobalFootprintCountryController@store')->name('store');
            Route::get('/{globalFootprintCountry}/edit',                'GlobalFootprintCountryController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'GlobalFootprintCountryController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{globalFootprintCountry}',                    'GlobalFootprintCountryController@update')->name('update');
            Route::delete('/{globalFootprintCountry}',                  'GlobalFootprintCountryController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function () {
        Route::prefix('contact-methods')->name('contact-methods/')->group(static function () {
            Route::get('/',                                             'ContactMethodController@index')->name('index');
            Route::get('/create',                                       'ContactMethodController@create')->name('create');
            Route::post('/',                                            'ContactMethodController@store')->name('store');
            Route::get('/{contactMethod}/edit',                         'ContactMethodController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'ContactMethodController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{contactMethod}',                             'ContactMethodController@update')->name('update');
            Route::delete('/{contactMethod}',                           'ContactMethodController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function () {
        Route::prefix('stakeholders')->name('stakeholders/')->group(static function () {
            Route::get('/',                                             'StakeholdersController@index')->name('index');
            Route::get('/create',                                       'StakeholdersController@create')->name('create');
            Route::post('/',                                            'StakeholdersController@store')->name('store');
            Route::get('/{stakeholder}/edit',                           'StakeholdersController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'StakeholdersController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{stakeholder}',                               'StakeholdersController@update')->name('update');
            Route::delete('/{stakeholder}',                             'StakeholdersController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function () {
        Route::prefix('card-programs')->name('card-programs/')->group(static function () {
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
        Route::prefix('tmc-customers')->name('tmc-customers/')->group(static function() {
            Route::get('/',                                             'TmcCustomerController@index')->name('index');
            Route::get('/create',                                       'TmcCustomerController@create')->name('create');
            Route::post('/',                                            'TmcCustomerController@store')->name('store');
            Route::get('/{tmcCustomer}/edit',                           'TmcCustomerController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'TmcCustomerController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{tmcCustomer}',                               'TmcCustomerController@update')->name('update');
            Route::delete('/{tmcCustomer}',                             'TmcCustomerController@destroy')->name('destroy');
        });
    });
});
