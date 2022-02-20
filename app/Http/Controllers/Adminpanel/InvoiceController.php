<?php

namespace App\Http\Controllers\Adminpanel;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Customer;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use App\Models\Payment;
use App\Models\Product;
use charlieuki\ReceiptPrinter\ReceiptPrinter as ReceiptPrinter;
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
        $invoices = Invoice::where('type', 'Sale')->orderby('id', 'desc')->get();
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

        $items = [];
        $customer = Customer::find($request->customer_id);

        $inputs = $request->all();
        $no_of_items = 0;
        foreach ($inputs['product_qty'] as $key => $value) {
            $no_of_items = $no_of_items + $value;
        }
        $inputs['no_of_items'] = $no_of_items;
        $inputs['no_of_products'] = sizeof($inputs['product_id']);
        $inputs['type'] = 'Sale';
        if($customer->type == 'Cash'){
            $inputs['group'] = 'Cash';
        }
        else{
            $inputs['group'] = 'Credit';
        }
        $inputs['created_by'] = Auth::guard('admin')->id();
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
            $product->available_qty = $product->available_qty - $product_qtys[$i];
            $product->save();
            array_push($items, ['name'=>$product->name, 'qty'=>$product_qtys[$i], 'price'=>$product->sale_price]);
        }

        if($customer->type == 'Cash'){
            $account = Account::find($request->account_id);
            Payment::create(['amount'=>intval($inputs['amount']), 'payment_date'=>date('Y-m-d'), 'group'=>'In', 'note'=>'Created Auto By System',
             'type'=>'Sale', 'invoice_id'=>$invoice->id, 'account_id'=>$account->id,  'created_by'=>Auth::guard('admin')->id()]);
            $current_balance = $account->balance;
            $account->balance = $current_balance + $inputs['amount'];
            $account->save();
        }

        if($request->button == 'Save & Print'){
            if(env('PRINTER_TYPE') != 'Thermal'){
                return redirect()->route('admin.sale_invoice.print', $invoice->id);
            }
            $mid = '';
            $store_name = 'YOURMART';
            $store_address = 'Mart Address';
            $store_phone = '1234567890';
            $store_email = 'yourmart@email.com';
            $store_website = '';
            $tax_percentage = $inputs['discount'];
            $transaction_id = sprintf("%05d", $invoice->id);
            $currency = 'Rs';
            $image_path = '';

            // Init printer
            $printer = new ReceiptPrinter;
            $printer->init(
                config('receiptprinter.connector_type'),
                config('receiptprinter.connector_descriptor')
            );

            // Set store info
            $printer->setStore($mid, $store_name, $store_address, $store_phone, $store_email, $store_website);

            // Set currency
            $printer->setCurrency($currency);
            // Add items
            foreach ($items as $item) {
                $printer->addItem(
                    $item['name'],
                    $item['qty'],
                    $item['price']
                );
            }
            // Set tax
            $printer->setTax($tax_percentage);
            // Calculate total
            $printer->calculateSubTotal();
            $printer->calculateGrandTotal();

            // Set transaction ID
            $printer->setTransactionID($transaction_id);

            // Set logo
            // Uncomment the line below if $image_path is defined
            //$printer->setLogo($image_path);



            // Print receipt
            $printer->printReceipt();

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
        $invoice =  Invoice::with('detail')->find($id);
        return view('adminpanel.pages.sale_invoice_show', compact('invoice'));
    }

    public function print($id)
    {
        $invoice =  Invoice::with('detail')->find($id);
        return view('adminpanel.pages.sale_invoice_print', compact('invoice'));
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
        $inputs['created_by'] = Auth::guard('admin')->id();
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