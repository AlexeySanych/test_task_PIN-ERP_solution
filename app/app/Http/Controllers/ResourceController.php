<?php

namespace App\Http\Controllers;

use App\Actions\getFormData;
use App\Actions\setUserSession;
use App\Http\Requests\SaveProductRequest;
use App\Jobs\ProductNotifyJob;
use App\Models\Product;
use App\Services\CheckUser;
use Illuminate\Http\Request;

class ResourceController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::getAvailable();
        return view('index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        if (!session()->has('username')) {
            setUserSession::handle($request);
        }
        return view('save',
            ['isAdmin' => true,
            'route' => route('store'),
            'method' => 'POST']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SaveProductRequest $request)
    {
        $form_data = getFormData::handle($request);
        if (!$form_data) {return redirect('400');}
        $product = Product::create($form_data);
        $prod_id = $product->id;
        ProductNotifyJob::dispatch($prod_id);
        return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::getProduct($id);
        return view('show', $product);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, string $id)
    {
        if (!session()->has('username')) {
            setUserSession::handle($request);
        }
        $product = Product::getProduct($id);
        $isUserAdmin = CheckUser::isAdmin();
        $product['isAdmin'] = $isUserAdmin;
        $product['route'] = route('update', $id);
        $product['method'] = 'PUT';
        return view('save', $product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SaveProductRequest $request, string $id)
    {
        $form_data = getFormData::handle($request);
        if (!$form_data) {return redirect('400');}
        $product = Product::findOrFail($id);
        if (!CheckUser::isAdmin()) {$form_data['article'] = $product['article'];}
        $product->update($form_data);
        return redirect()->route('index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Product::findOrFail($id)->delete();
        return redirect()->route('index');
    }
}
