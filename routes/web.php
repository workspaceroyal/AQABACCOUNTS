<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Demo\DemoController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EditorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Pos\SupplierController;
use App\Http\Controllers\Pos\CustomerController;
use App\Http\Controllers\Pos\UnitController;
use App\Http\Controllers\Pos\CategoryController;
use App\Http\Controllers\Pos\ProductController;
use App\Http\Controllers\Pos\PurchaseController;
use App\Http\Controllers\Pos\DefaultController;
use App\Http\Controllers\Pos\InvoiceController;
use App\Http\Controllers\Pos\StockController;

Route::get('/', function () {
    return view('welcome');
});


Route::controller(DemoController::class)->group(function () {
    Route::get('/about', 'Index')->name('about.page')->middleware('check');
    Route::get('/contact', 'ContactMethod')->name('cotact.page');
});


// Admin Middleware
Route::middleware('auth')->group(function(){

 // Admin All Route
    Route::controller(AdminController::class)->group(function () {
        Route::get('/admin/logout', 'destroy')->name('admin.logout');
        Route::get('/admin/profile', 'Profile')->name('admin.profile');
        Route::get('/edit/profile', 'EditProfile')->name('edit.profile');
        Route::post('/store/profile', 'StoreProfile')->name('store.profile');

        Route::get('/change/password', 'ChangePassword')->name('change.password');
        Route::post('/update/password', 'UpdatePassword')->name('update.password');

    });

    // Supplier All Route
    Route::controller(SupplierController::class)->group(function () {
        Route::get('/fundingsource/all', 'SupplierAll')->name('supplier.all');
        Route::get('/fundingsource/add', 'SupplierAdd')->name('supplier.add');
        Route::post('/fundingsource/store', 'SupplierStore')->name('supplier.store');
        Route::get('/fundingsource/edit/{id}', 'SupplierEdit')->name('supplier.edit');
        Route::post('/fundingsource/update', 'SupplierUpdate')->name('supplier.update');
        Route::get('/fundingsource/delete/{id}', 'SupplierDelete')->name('supplier.delete');
    });

    // Customer All Route
    Route::controller(CustomerController::class)->group(function () {
        Route::get('/expencesesector/all', 'CustomerAll')->name('customer.all');
        Route::get('/expencesesector/add', 'CustomerAdd')->name('customer.add');
        Route::post('/expencesesector/store', 'CustomerStore')->name('customer.store');
        Route::get('/expencesesector/edit/{id}', 'CustomerEdit')->name('customer.edit');
        Route::post('/expencesesector/update', 'CustomerUpdate')->name('customer.update');
        Route::get('/expencesesector/delete/{id}', 'CustomerDelete')->name('customer.delete');

        Route::get('/advance/expencesesector', 'CreditCustomer')->name('credit.customer');
        Route::get('/advance/expencesesector/print/pdf', 'CreditCustomerPrintPdf')->name('credit.customer.print.pdf');

        Route::get('/expencesesector/edit/invoice/{invoice_id}', 'CustomerEditInvoice')->name('customer.edit.invoice');
        Route::post('/expencesesector/update/invoice/{invoice_id}', 'CustomerUpdateInvoice')->name('customer.update.invoice');

        Route::get('/expencesesector/invoice/details/{invoice_id}', 'CustomerInvoiceDetails')->name('customer.invoice.details.pdf');

        Route::get('/payable/expencesesector', 'PaidCustomer')->name('paid.customer');
        Route::get('/payable/expencesesector/print/pdf', 'PaidCustomerPrintPdf')->name('paid.customer.print.pdf');

        Route::get('/expencesesector/wise/report', 'CustomerWiseReport')->name('customer.wise.report');
        Route::get('/expencesesector/wise/advance/report', 'CustomerWiseCreditReport')->name('customer.wise.credit.report');
        Route::get('/expencesesector/wise/payable/report', 'CustomerWisePaidReport')->name('customer.wise.paid.report');

    });

    // Unit All Route
    Route::controller(UnitController::class)->group(function () {
        Route::get('/currency/all', 'UnitAll')->name('unit.all');
        Route::get('/currency/add', 'UnitAdd')->name('unit.add');
        Route::post('/currency/store', 'UnitStore')->name('unit.store');
        Route::get('/currency/edit/{id}', 'UnitEdit')->name('unit.edit');
        Route::post('/currency/update', 'UnitUpdate')->name('unit.update');
        Route::get('/currency/delete/{id}', 'UnitDelete')->name('unit.delete');

    });

    // Category All Route
    Route::controller(CategoryController::class)->group(function () {
        Route::get('/fundsector/all', 'CategoryAll')->name('category.all');
        Route::get('/fundsector/add', 'CategoryAdd')->name('category.add');
        Route::post('/fundsector/store', 'CategoryStore')->name('category.store');
        Route::get('/fundsector/edit/{id}', 'CategoryEdit')->name('category.edit');
        Route::post('/fundsector/update', 'CategoryUpdate')->name('category.update');
        Route::get('/fundsector/delete/{id}', 'CategoryDelete')->name('category.delete');

    });

    // Product All Route
    Route::controller(ProductController::class)->group(function () {
        Route::get('/monthyear/all', 'ProductAll')->name('product.all');
        Route::get('/monthyear/add', 'ProductAdd')->name('product.add');
        Route::post('/monthyear/store', 'ProductStore')->name('product.store');
        Route::get('/monthyear/edit/{id}', 'ProductEdit')->name('product.edit');
        Route::post('/monthyear/update', 'ProductUpdate')->name('product.update');
        Route::get('/monthyear/delete/{id}', 'ProductDelete')->name('product.delete');

    });

    // Purchase All Route
    Route::controller(PurchaseController::class)->group(function () {
        Route::get('/deposit/all', 'PurchaseAll')->name('purchase.all');
        Route::get('/deposit/add', 'PurchaseAdd')->name('purchase.add');
        Route::post('/deposit/store', 'PurchaseStore')->name('purchase.store');
        Route::get('/deposit/delete/{id}', 'PurchaseDelete')->name('purchase.delete');
        Route::get('/deposit/pending', 'PurchasePending')->name('purchase.pending');
        Route::get('/deposit/approve/{id}', 'PurchaseApprove')->name('purchase.approve');

        Route::get('/daily/deposit/report', 'DailyPurchaseReport')->name('daily.purchase.report');
        Route::get('/daily/deposit/pdf', 'DailyPurchasePdf')->name('daily.purchase.pdf');

    });

    // Invoice All Route
    Route::controller(InvoiceController::class)->group(function () {
        Route::get('/expense/all', 'InvoiceAll')->name('invoice.all');
        Route::get('/expense/add', 'invoiceAdd')->name('invoice.add');
        Route::post('/expense/store', 'InvoiceStore')->name('invoice.store');

        Route::get('/expense/pending/list', 'PendingList')->name('invoice.pending.list');
        Route::get('/expense/delete/{id}', 'InvoiceDelete')->name('invoice.delete');
        Route::get('/expense/approve/{id}', 'InvoiceApprove')->name('invoice.approve');

        Route::post('/approval/store/{id}', 'ApprovalStore')->name('approval.store');
        Route::get('/print/expense/list', 'PrintInvoiceList')->name('print.invoice.list');
        Route::get('/print/expense/{id}', 'PrintInvoice')->name('print.invoice');

        Route::get('/daily/expense/report', 'DailyInvoiceReport')->name('daily.invoice.report');
        Route::get('/daily/expense/pdf', 'DailyInvoicePdf')->name('daily.invoice.pdf');

    });

    // Stock All Route
    Route::controller(StockController::class)->group(function () {
        Route::get('/fund/report', 'StockReport')->name('stock.report');
        Route::get('/fund/report/pdf', 'StockReportPdf')->name('stock.report.pdf');

        Route::get('/fund/fundingsource/wise', 'StockSupplierWise')->name('stock.supplier.wise');
        Route::get('/fundingsource/wise/pdf', 'SupplierWisePdf')->name('supplier.wise.pdf');
        Route::get('/monthyear/wise/pdf', 'ProductWisePdf')->name('product.wise.pdf');

    });

 }); // End Admin Middleware


 // User Middleware
Route::middleware('auth')->group(function(){

        // Admin All Route
           Route::controller(AdminController::class)->group(function () {
               Route::get('/user/logout', 'UserDestroy')->name('user.logout');
               Route::get('/user/profile', 'UserProfile')->name('user.profile');
               Route::get('/user/edit/profile', 'UserEditProfile')->name('user.edit.profile');
               Route::post('/user/store/profile', 'UserStoreProfile')->name('user.store.profile');

               Route::get('/user/change/password', 'UserChangePassword')->name('user.change.password');
               Route::post('/user/update/password', 'UserUpdatePassword')->name('user.update.password');

           });

           // Supplier All Route
           Route::controller(SupplierController::class)->group(function () {
               Route::get('/user/fundingsource/all', 'UserSupplierAll')->name('user.supplier.all');
               Route::get('/user/fundingsource/add', 'UserSupplierAdd')->name('user.supplier.add');
               Route::post('/user/fundingsource/store', 'UserSupplierStore')->name('user.supplier.store');
               Route::get('/user/fundingsource/edit/{id}', 'UserSupplierEdit')->name('user.supplier.edit');
               Route::post('/user/fundingsource/update', 'UserSupplierUpdate')->name('user.supplier.update');
               Route::get('/user/fundingsource/delete/{id}', 'UserSupplierDelete')->name('user.supplier.delete');
           });

           // Customer All Route
           Route::controller(CustomerController::class)->group(function () {
               Route::get('/user/expencesesector/all', 'UserCustomerAll')->name('user.customer.all');
               Route::get('/user/expencesesector/add', 'UserCustomerAdd')->name('user.customer.add');
               Route::post('/user/expencesesector/store', 'UserCustomerStore')->name('user.customer.store');
               Route::get('/user/expencesesector/edit/{id}', 'UserCustomerEdit')->name('user.customer.edit');
               Route::post('/user/expencesesector/update', 'UserCustomerUpdate')->name('user.customer.update');
               Route::get('/user/expencesesector/delete/{id}', 'UserCustomerDelete')->name('user.customer.delete');

               Route::get('/user/advance/expencesesector', 'UserCreditCustomer')->name('user.credit.customer');
               Route::get('/user/advance/expencesesector/print/pdf', 'UserCreditCustomerPrintPdf')->name('user.credit.customer.print.pdf');

               Route::get('/user/expencesesector/edit/invoice/{invoice_id}', 'UserCustomerEditInvoice')->name('user.customer.edit.invoice');
               Route::post('/user/expencesesector/update/invoice/{invoice_id}', 'UserCustomerUpdateInvoice')->name('user.customer.update.invoice');

               Route::get('/user/expencesesector/invoice/details/{invoice_id}', 'UserCustomerInvoiceDetails')->name('user.customer.invoice.details.pdf');

               Route::get('/user/payable/expencesesector', 'UserPaidCustomer')->name('user.paid.customer');
               Route::get('/user/payable/expencesesector/print/pdf', 'PaidCustomerPrintPdf')->name('user.paid.customer.print.pdf');

               Route::get('/user/expencesesector/wise/report', 'UserCustomerWiseReport')->name('user.customer.wise.report');
               Route::get('/user/expencesesector/wise/advance/report', 'UserCustomerWiseCreditReport')->name('user.customer.wise.credit.report');
               Route::get('/user/expencesesector/wise/payable/report', 'UserCustomerWisePaidReport')->name('user.customer.wise.paid.report');

           });

           // Unit All Route
           Route::controller(UnitController::class)->group(function () {
               Route::get('/user/currency/all', 'UserUnitAll')->name('user.unit.all');
               Route::get('/user/currency/add', 'UserUnitAdd')->name('user.unit.add');
               Route::post('/user/currency/store', 'UserUnitStore')->name('user.unit.store');
               Route::get('/user/currency/edit/{id}', 'UserUnitEdit')->name('user.unit.edit');
               Route::post('/user/currency/update', 'UserUnitUpdate')->name('user.unit.update');
               Route::get('/user/currency/delete/{id}', 'UserUnitDelete')->name('user.unit.delete');

           });

           // Category All Route
           Route::controller(CategoryController::class)->group(function () {
               Route::get('/user/fundsector/all', 'UserCategoryAll')->name('unit.category.all');
               Route::get('/user/fundsector/add', 'UserCategoryAdd')->name('unit.category.add');
               Route::post('/user/fundsector/store', 'UserCategoryStore')->name('unit.category.store');
               Route::get('/user/fundsector/edit/{id}', 'UserCategoryEdit')->name('unit.category.edit');
               Route::post('/user/fundsector/update', 'UserCategoryUpdate')->name('unit.category.update');
               Route::get('/user/fundsector/delete/{id}', 'UserCategoryDelete')->name('unit.category.delete');

           });

           // Product All Route
           Route::controller(ProductController::class)->group(function () {
               Route::get('/user/monthyear/all', 'UserProductAll')->name('user.product.all');
               Route::get('/user/monthyear/add', 'UserProductAdd')->name('user.product.add');
               Route::post('/user/monthyear/store', 'UserProductStore')->name('user.product.store');
               Route::get('/user/monthyear/edit/{id}', 'UserProductEdit')->name('user.product.edit');
               Route::post('/user/monthyear/update', 'UserProductUpdate')->name('user.product.update');
               Route::get('/user/monthyear/delete/{id}', 'UserProductDelete')->name('user.product.delete');

           });

           // Purchase All Route
           Route::controller(PurchaseController::class)->group(function () {
               Route::get('/user/deposit/all', 'UserPurchaseAll')->name('user.purchase.all');
               Route::get('/user/deposit/add', 'UserPurchaseAdd')->name('user.purchase.add');
               Route::post('/user/deposit/store', 'UserPurchaseStore')->name('user.purchase.store');
               Route::get('/user/deposit/delete/{id}', 'UserPurchaseDelete')->name('user.purchase.delete');
               Route::get('/user/deposit/pending', 'UserPurchasePending')->name('user.purchase.pending');
               Route::get('/user/deposit/approve/{id}', 'UserPurchaseApprove')->name('user.purchase.approve');

               Route::get('/user/daily/deposit/report', 'UserDailyPurchaseReport')->name('user.daily.purchase.report');
               Route::get('/user/daily/deposit/pdf', 'UserDailyPurchasePdf')->name('user.daily.purchase.pdf');

           });

           // Invoice All Route
           Route::controller(InvoiceController::class)->group(function () {
               Route::get('/user/expense/all', 'UserInvoiceAll')->name('user.invoice.all');
               Route::get('/user/expense/add', 'UserinvoiceAdd')->name('user.invoice.add');
               Route::post('/user/expense/store', 'UserInvoiceStore')->name('user.invoice.store');

               Route::get('/user/expense/pending/list', 'UserPendingList')->name('user.invoice.pending.list');
               Route::get('/user/expense/delete/{id}', 'UserInvoiceDelete')->name('user.invoice.delete');
               Route::get('/user/expense/approve/{id}', 'UserInvoiceApprove')->name('user.invoice.approve');

               Route::post('/user/approval/store/{id}', 'UserApprovalStore')->name('user.approval.store');
               Route::get('/user/print/expense/list', 'UserPrintInvoiceList')->name('user.print.invoice.list');
               Route::get('/user/print/expense/{id}', 'UserPrintInvoice')->name('user.print.invoice');

               Route::get('/user/daily/expense/report', 'UserDailyInvoiceReport')->name('user.daily.invoice.report');
               Route::get('/user/daily/expense/pdf', 'UserDailyInvoicePdf')->name('user.daily.invoice.pdf');

           });

           // Stock All Route
           Route::controller(StockController::class)->group(function () {
               Route::get('/user/fund/report', 'UserStockReport')->name('stock.report');
               Route::get('/user/fund/report/pdf', 'UserStockReportPdf')->name('stock.report.pdf');

               Route::get('/user/fund/fundingsource/wise', 'UserStockSupplierWise')->name('stock.supplier.wise');
               Route::get('/user/fundingsource/wise/pdf', 'UserSupplierWisePdf')->name('supplier.wise.pdf');
               Route::get('/user/monthyear/wise/pdf', 'UserProductWisePdf')->name('product.wise.pdf');

           });

        }); // End User Middleware




// Default All Route
Route::controller(DefaultController::class)->group(function () {
    Route::get('/get-category', 'GetCategory')->name('get-category');
    Route::get('/get-product', 'GetProduct')->name('get-product');
    Route::get('/check-product', 'GetStock')->name('check-product-stock');

});


// Route::get('/dashboard', function () {
//     return view('admin.index');
// })->middleware(['auth'])->name('dashboard');

Route::get('/admin/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'role:admin'])->name('admin.dashboard');

Route::get('/editor/dashboard', function () {
    return view('editor.index');
})->middleware(['auth', 'role:editor'])->name('editor.dashboard');

Route::get('/user/dashboard', function () {
    return view('user.index');
})->middleware(['auth', 'role:user'])->name('user.dashboard');

require __DIR__.'/auth.php';


// Route::get('/contact', function () {
//     return view('contact');
// });
