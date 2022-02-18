@extends('adminpanel.layout.master')
<!-- ================================== EXTEND TITLE AND META TAGS ============================= -->
@section('title-meta')
    <title>Bizblanca | Dashboard</title>
    <meta name="description" content="this is description">
@endsection
<!-- ====================================== EXTRA CSS LINKS ==================================== -->
@section('other-css')
@endsection
<!-- ======================================== BODY CONTENT ====================================== -->
@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Create Sale Invoice</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="index.html">Home</a>
                </li>
                <li>
                    <a>Sale Invoice</a>
                </li>
                <li class="active">
                    <strong>Create</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
    </div>

    {{-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}

    @error('customer_id')
        <div class="alert alert-danger" style="margin-top: 20px">Please Select Customer</div>
    @enderror
    @error('product_id')
        <div class="alert alert-danger" style="margin-top: 20px">Please Add Products in Cart</div>
    @enderror

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">

            <div class="ibox-content">
                <form method="post" class="form-horizontal" action="{{ route('admin.sale_invoice.store') }}"
                    enctype="multipart/form-data">
                    @csrf


                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Customer</label>

                                    <div class="col-sm-4">
                                        <div class="input-group">
                                            <select required data-placeholder="Choose a Country..." class="chosen-select"
                                                tabindex="2" style="width:350px;" id="customerSelect" name="customer_id">
                                                <option value="">Select Customer</option>
                                                @foreach ($customers as $customer)
                                                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <label class="col-sm-1 control-label">Date</label>

                                    <div class="col-sm-2">
                                        <input required type="date" class="form-control has-error" name="issue_date"
                                            value="<?php echo date('Y-m-d'); ?>">
                                    </div>

                                    <label class="col-sm-1 control-label">Account</label>

                                    <div class="col-sm-2">
                                        <select class="form-control" name="account_id" required>
                                            @foreach ($accounts as $account)

                                                <option value="{{ $account->id }}">{{ $account->name }} </option>
                                            @endforeach

                                        </select>
                                    </div>



                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Product</label>

                                    <div class="col-sm-10">
                                        <div class="input-group">
                                            <select data-placeholder="Choose a Country..." class="chosen-select"
                                                tabindex="2" style="width:600px;" id="productSelect">
                                                <option value="">Select Product</option>
                                                @foreach ($products as $key => $product)
                                                    <option value="{{ $key }}">{{ $product->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Qty</label>

                                    <div class="col-sm-2">
                                        <input id="quantity" class="touchspin1" type="text" min="1" value="1" >
                                    </div>



                                    <div class="col-sm-4 ">
                                        <button onclick="addProduct()" class="btn btn-primary" type="button"
                                            >Add</button>
                                    </div>
                                </div>



                                <div class="ibox-content">

                                    <table class="table" >
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Product Name</th>
                                                <th>Price</th>
                                                <th>Qty</th>
                                                <th>Amount</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="productTableBody">

                                        </tbody>
                                    </table>



                                </div>

                                <div class="ibox-content">
                                    <h1 id="totalAmmount"> 0 Rs.
                                    </h1>

                                </div>
                                <br>
                                <div class="hr-line-dashed"></div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Discount</label>

                                    <div class="col-sm-2">
                                        <input type="number" class="form-control " name="discount" value="0">
                                        <input id="ammount" type="hidden"  name="amount" value="0">
                                    </div>

                                    <label class="col-sm-1 control-label">Ref #</label>

                                    <div class="col-sm-2">
                                        <input type="number" class="form-control" name="reference_no" placeholder="Optional" >
                                    </div>

                                    <label class="col-sm-1 control-label">Description</label>

                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="description" placeholder="Optional">
                                    </div>


                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Cash Recieved</label>

                                    <div class="col-sm-2">
                                        <input type="number" class="form-control " name="cash_recieved" value="0">
                                    </div>

                                    <label class="col-sm-1 control-label">Balance</label>


                                    <div class="col-sm-2">
                                        <label class="control-label">9878</label>
                                    </div>




                                </div>


                                <button class="btn btn-primary" type="submit" name="button" value="Save & Print">Save & Print Invoice</button>
                                <button class="btn btn-primary" type="submit" name="button" value="Save">Save Invoice</button>



                </form>
            </div>

        </div>
    </div>

@endsection
<!-- ======================================== FOOTER PAGE SCRIPT ======================================= -->
@section('other-script')

    <script>
        var products = @json($products);
        console.log(products);
        var counter = 1;
        function addProduct() {
            if($('#quantity').val()){
                var productIndex = $('#productSelect').val();
                var productName = $('#productSelect').find(":selected").text();
                var productQty = $('#quantity').val();
                if(productIndex){
                    $('#productTableBody').append(`<tr id="row-${counter}">
                                                    <td>${counter}</td>
                                                    <td>${products[productIndex].name}</td>
                                                    <td>${products[productIndex].sale_price}</td>
                                                    <td>${productQty}</td>
                                                    <td>${productQty*products[productIndex].sale_price}</td>
                                                    <td>
                                                        <a onclick="deleteProduct(${counter})">
                                                            <small class="label label-danger"><i class="fa"></i>delete</small>
                                                        </a>
                                                    </td>

                                                    <input type="hidden" name="product_id[]" value="${products[productIndex].id}">
                                                    <input type="hidden" name="product_qty[]" value="${productQty}">
                                                </tr>`);
                    counter++;

                }
                calculateTotalAmmount();
            }

        }

        function deleteProduct(rowId){
            $("#row-" + rowId).remove();
            calculateTotalAmmount();
        }

        function calculateTotalAmmount(){
            var tottalAmount = 0;
            var products_in_cart = $("input[name='product_id[]']")
              .map(function(){return $(this).val();}).get();
            var products_qty_in_cart = $("input[name='product_qty[]']")
              .map(function(){return $(this).val();}).get();

            console.log(products_in_cart);
            console.log(products_qty_in_cart);
            products_in_cart.forEach(myFunction)
            function myFunction(product_id, index, arr) {
                products.every(element => {
                    if(element.id == parseInt(product_id)){
                        console.log(element);
                        tottalAmount = tottalAmount + (parseInt(products_qty_in_cart[index]) * element.sale_price);
                        return false;

                    }
                    return true;
                });
            }
            $('#totalAmmount').html(tottalAmount + " Rs." );
            $('#ammount').val(tottalAmount);
        }
    </script>

    <script>
        var Success = `{{\Session::has('success')}}`;
        var Error = `{{\Session::has('error')}}`;

        if (Success) {
            setTimeout(function() {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'slideDown',
                    timeOut: 7000
                };
                toastr.success('Success Message', `{{\Session::get('success')}}`);

            }, 1300);
        }
        else if(Error){
            setTimeout(function() {
                    toastr.options = {
                        closeButton: true,
                        progressBar: true,
                        showMethod: 'slideDown',
                        timeOut: 4000
                    };
                    toastr.error('Failure Message', `{{\Session::get('error')}}`);

                }, 1300);
        }
    </script>

@endsection
