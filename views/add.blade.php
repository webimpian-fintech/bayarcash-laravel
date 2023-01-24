<html lang="en" class="transaction-create">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="pzYxphuJxhOxRV3plni7hgm30xh0rNZDpKeOPgVp">
    <title>New Transaction - Bayarcash</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>

<body id="transaction-create" style="margin-bottom: 29px;">

<div class="container container-transaction-create mt-4 pb-2 col-8">
    <div class="card">
        
        <div class="card-header"> Transaction Details</div>
        
        <form method="POST" action="{{ route('bayarcash-payment.init') }}">
            @csrf
            <div class="card-body">
    
                @if ($errors->any())
                    <div class="alert alert-danger mt-2 alert-dismissible fade show auto-close">
                        <div class="text-red-600">
                            {{ __('Whoops! Something went wrong.') }}
                
                            <ul>
                                @foreach ($errors->all() as $message)
                                    <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                
                <div class="card-text">
                    <div class="row">
                        <div class="col">
                            <input id="payment_gateway" name="payment_gateway" class="collapse" value="1">
                            
                            <div class="invoice-details">
                                <div class="form-group mb-2">
                                    <label class="mb-1" for="order_no">
                                        <b>ID Number</b>
                                    </label>
                                    <div>
                                        <input type="text"
                                            name="order_no"
                                            id="order_no"
                                            class="form-control"
                                            value="{{ old('order_no') }}"
                                            required
                                        >
                                    </div>
                                </div>
                                <div class="form-group mb-2">
                                    <label class="mb-1" for="order_amount">
                                        <b>Amount</b>
                                    </label>
                                    <div>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">MYR</span>
                                            </div>
                                            <input type="number"
                                                name="order_amount"
                                                id="order_amount"
                                                class="form-control"
                                                value="{{ old('order_amount') }}"
                                                required
                                            >
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-2">
                                    <label class="mb-1" for="buyer_name">
                                        <b>Name</b>
                                    </label>
                                    <div>
                                        <input type="text"
                                            name="buyer_name"
                                            id="buyer_name"
                                            class="form-control"
                                            value="{{ old('buyer_name') }}"
                                            required
                                        >
                                    </div>
                                </div>
                                <div class="form-group mb-2">
                                    <label class="mb-1" for="buyer_email">
                                        <b>Email</b>
                                    </label>
                                    <div>
                                        <input type="text"
                                            name="buyer_email"
                                            id="buyer_email"
                                            class="form-control"
                                            value="{{ old('buyer_email') }}"
                                            required
                                        >
                                    </div>
                                </div>
                                <div class="form-group mb-2">
                                    <label class="mb-1" for="buyer_tel_no">
                                        <b>Telephone Number</b>
                                    </label>
                                    <div>
                                        <input type="text"
                                            name="buyer_tel_no"
                                            id="buyer_tel_no"
                                            class="form-control"
                                            value="{{ old('buyer_tel_no') }}"
                                            placeholder="601312345678"
                                            maxlength="12"
                                        >
                                    </div>
                                </div>
                                <div class="form-group mb-2">
                                    <label class="mb-1" for="return_url">
                                        <b>Return URL</b>
                                    </label>
                                    <div>
                                        <input type="text"
                                            name="return_url"
                                            id="return_url"
                                            class="form-control"
                                            value="{{ old('return_url') }}"
                                        >
                                    </div>
                                </div>
                                <div class="form-group mb-2">
                                    <label class="mb-1" for="raw_website">
                                        <b>Raw Website Data</b>
                                    </label>
                                    <div>
                                        <textarea name="raw_website" id="raw_website" class="form-control">{{ old('raw_website') }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div id="select-bank" class="mt-4">
                                <button type="submit" class="btn btn-success btn-lg mr-1"> Submit </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div class="card-footer pt-3 pb-3">
            <div class="row">
                <div class="col text-grey"> 2023 © All right reserved - Bayarcash <br> Web Impian Sdn. Bhd. (920163-H) </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>

