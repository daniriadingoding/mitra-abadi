<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatbotController;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use App\Models\Inventory;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Rute-rute di sini dimuat oleh RouteServiceProvider dan tergabung dalam
| middleware group "api". Sangat cocok untuk testing via Postman!
|
*/

// ==========================================
// 1. CHATBOT API (Public)
// ==========================================
Route::prefix('chatbot')->group(function () {
    Route::post('/session', [ChatbotController::class, 'startSession']);
    Route::post('/message', [ChatbotController::class, 'sendMessage']);
});

// ==========================================
// 2. CATALOG API (Public)
// ==========================================
Route::get('/categories', function () {
    return response()->json([
        'status' => 'success',
        'data' => Category::withCount('products')->get()
    ]);
});

Route::get('/products', function (Request $request) {
    $products = Product::with(['category', 'variants.inventory'])
        ->when($request->category_id, fn($q) => $q->where('category_id', $request->category_id))
        ->get();

    return response()->json([
        'status' => 'success',
        'data' => $products
    ]);
});

Route::get('/products/{id}', function ($id) {
    $product = Product::with(['category', 'variants.inventory'])->findOrFail($id);
    return response()->json([
        'status' => 'success',
        'data' => $product
    ]);
});

// ==========================================
// 3. ADMIN ENDPOINTS (Mock Authentication)
// Untuk kemudahan testing di Postman tanpa Bearer Token yang ribet,
// kita sediakan route test sementara.
// Di production, gunakan middleware('auth:sanctum')
// ==========================================
Route::prefix('admin')->group(function () {
    
    Route::get('/inventories', function () {
        return response()->json([
            'status' => 'success',
            'data' => Inventory::with('productVariant.product')->get()
        ]);
    });

    Route::get('/orders', function () {
        return response()->json([
            'status' => 'success',
            'data' => Order::with('items.productVariant.product')->get()
        ]);
    });

    // Contoh API endpoint untuk Create Order via Postman
    Route::post('/orders', function (Request $request) {
        $validated = $request->validate([
            'customer_name' => 'required|string',
            'items' => 'required|array',
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Hit endpoint ini berhasil! Ini adalah simulasi pembuatan order.',
            'payload' => $validated
        ]);
    });

    // ==========================================
    // 3.1. CRUD Kategori (Contoh Lengkap)
    // ==========================================
    Route::post('/categories', function (Request $request) {
        $validated = $request->validate([
            'name' => 'required|string|unique:categories,name',
            'description' => 'nullable|string',
        ]);
        $validated['slug'] = \Illuminate\Support\Str::slug($validated['name']);
        
        $category = Category::create($validated);
        return response()->json(['status' => 'success', 'message' => 'Kategori berhasil dibuat', 'data' => $category]);
    });

    Route::put('/categories/{id}', function (Request $request, $id) {
        $category = Category::findOrFail($id);
        $validated = $request->validate([
            'name' => 'required|string|unique:categories,name,'.$id,
            'description' => 'nullable|string',
        ]);
        $validated['slug'] = \Illuminate\Support\Str::slug($validated['name']);
        
        $category->update($validated);
        return response()->json(['status' => 'success', 'message' => 'Kategori berhasil diupdate', 'data' => $category]);
    });

    Route::delete('/categories/{id}', function ($id) {
        $category = Category::findOrFail($id);
        $category->delete();
        return response()->json(['status' => 'success', 'message' => 'Kategori berhasil dihapus']);
    });

});

// Auth check default bawaan Sanctum
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
