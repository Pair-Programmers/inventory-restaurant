<?php

namespace App\Http\Controllers\Adminpanel;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Customer;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use App\Models\Payment;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$products = Product::with('category', 'creator')->orderby('id', 'desc')->get();
        $invoices = Invoice::where('type', 'Sale Invoice')->orderby('id', 'desc')->get();
        return view('adminpanel.pages.sale_invoice_list', compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $accounts = Account::all();
        $customers = Customer::all();
        $products = Product::with('category', 'creator')->orderby('id', 'desc')->get();
        return view('adminpanel.pages.sale_invoice_create', compact('products', 'customers', 'accounts'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'customer_id'=> 'required',
            'product_id'=> 'required',
        ]);

        $inputs = $request->all();
        $no_of_items = 0;
        foreach ($inputs['product_qty'] as $key => $value) {
            $no_of_items = $no_of_items + $value;
        }
        $inputs['no_of_items'] = $no_of_items;
        $inputs['no_of_products'] = sizeof($inputs['product_id']);
        $inputs['type'] = 'Sale Invoice';
        $inputs['created_by'] = Auth::id();
        $inputs['amount'] = intval($inputs['amount']);
        $product_ids = $inputs['product_id'];
        $product_qtys = $inputs['product_qty'];

        unset($inputs['product_id']);
        unset($inputs['product_qty']);

        $invoice = Invoice::create($inputs);
        for ($i=0; $i < sizeof($product_ids); $i++) {
            $product = Product::find($product_ids[$i]);
            InvoiceDetail::create(['product_id'=>$product_ids[$i],
                             'sale_quantity'=>$product_qtys[$i],
                             'sale_price'=>$product->sale_price,
                             'total_ammount'=>$product->sale_price * $product_qtys[$i],
                             'invoice_id'=>$invoice->id]);
        }

        Payment::create(['amount'=>intval($inputs['amount']), 'payment_date'=>date('Y-m-d'), 'group'=>'In', 'note'=>'Created Auto By System',
         'type'=>'Sale', 'invoice_id'=>$invoice->id, 'account_id'=>$request->account_id,  'created_by'=>Auth::id()]);

        if($request->button == 'Save & Print'){
            return redirect()->back()->with('success', 'Created & Sent For Print Successfuly !');
        }
        return redirect()->back()->with('success', 'Created Successfuly !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = ProductCategory::all();
        return view('adminpanel.pages.product_edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $data[] = null;
        $inputs = $request->all();
        if($request->hasfile('images'))
        {
            foreach($request->file('images') as $key => $image)
            {
                $name=time().'_'. $key . '_'.$image->getClientOriginalName();
                $image->move(public_path().'/storage/images/products', $name);
                $data[] = $name;
            }
        }
        $inputs['images'] = json_encode($data);
        $inputs['created_by'] = Auth::id();
        $inputs['available_qty'] = $inputs['opening_qty'];
        if($product){
            $product->update($inputs);
            return redirect()->back()->with('success', 'Created Successfuly !');
        }
        return redirect()->back()->with('error', 'Error while creating !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        if($product){
            $product->delete();
            return response()->json(['success'=>'Product deleted successfully !']);
        }
        return response()->json(['error'=>'Product not found !']);
    }
}
