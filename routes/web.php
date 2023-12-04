<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Demo\DemoController;
use App\Http\Controllers\AdminController;
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



 }); // End Group Middleware




// Default All Route
Route::controller(DefaultController::class)->group(function () {
    Route::get('/get-category', 'GetCategory')->name('get-category');
    Route::get('/get-product', 'GetProduct')->name('get-product');
    Route::get('/check-product', 'GetStock')->name('check-product-stock');

});





Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


// Route::get('/contact', function () {
//     return view('contact');
// });
