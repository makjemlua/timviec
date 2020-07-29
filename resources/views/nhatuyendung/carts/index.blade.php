@extends('layouts.app')
@section('content')
<style type="text/css">
	.title
	{
		color: red;
		text-align: center;
	}
	.row
	{
		margin-left: 0;
		margin-right: 0;
	}
	input.form-control
	{
		width: 200px;
		float: left;
	}
	.form-group {
  position: relative;
}

input[type=number]::-webkit-inner-spin-button,
input[type=number]::-webkit-outer-spin-button
{
  -webkit-appearance: none;
  margin: 0;
}

input[type=number]
{
  -moz-appearance: textfield;
}

.form-group input {
  width: 80px;
  height: 42px;
  line-height: 1.65;
  float: left;
  display: block;
  padding: 0;
  margin: 0;
  padding-left: 20px;
  border: 1px solid #eee;
}

.form-group input:focus {
  outline: 0;
}

.form-group-nav {
  float: left;
  position: relative;
  height: 42px;
}

.form-group-button {
  position: relative;
  cursor: pointer;
  border-left: 1px solid #eee;
  width: 20px;
  text-align: center;
  color: #333;
  font-size: 13px;
  font-family: "Trebuchet MS", Helvetica, sans-serif !important;
  line-height: 1.7;
  -webkit-transform: translateX(-100%);
  transform: translateX(-100%);
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  -o-user-select: none;
  user-select: none;
}

.form-group-button.form-group-up {
  position: absolute;
  height: 50%;
  top: 0;
  border-bottom: 1px solid #eee;
  width: 30px;
  font-size: 15px;
  border: 1px solid black;
}

.form-group-button.form-group-down {
  position: absolute;
  bottom: -1px;
  height: 50%;
  width: 30px;
  font-size: 15px;
  border: 1px solid black;
}
</style>
<script type="text/javascript">
    function updateCart(qty,rowId){
        $.get(
            '{{ route('update.cart') }}',
            {
            	qty:qty,rowId:rowId,
           	},
        );
        let number = $('input').val();
        let price = $('input').attr('data-price');
        let total = (number*price).toLocaleString();
        //console.log(total);
        $(".total-item").replaceWith('<span class="total-item">'+total+'</span>').html();
        $(".total-item").replaceWith('<span class="total-item">'+total+'</span>').html();
    }

</script>
<!-- Page Title start -->
<div class="pageTitle">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6">
        <h1 class="page-heading">Đăng ký VIP</h1>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="breadCrumb"><a href="">Home</a> / <a href="">Nhà tuyển dụng</a> / <span>Đăng ký VIP</span></div>
      </div>
    </div>
  </div>
</div>
<!-- Page Title End -->

<div class="listpgWraper">
  <div class="container">
		<h1 class="title">Bảng giá gói dịch vụ tuyển dụng</h1>


		<table class="table table-striped">
		  <thead>
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">Tên dịch vụ</th>
		      <th scope="col">Thời gian</th>
		      <th scope="col">Đơn giá</th>
		      <th scope="col"></th>
		    </tr>
		  </thead>
		  <tbody>
		  	@if($carts)
		  	<span style="display: none">{{ $a=1 }}</span>
		  	@foreach($carts as $cart)
		    <tr>
		      <th scope="row">{{ $a++ }}</th>
		      <td>{{ $cart->pri_name }}</td>
		      <td>1 Tuần</td>
		      <td>{{ number_format(($cart->pri_price),0,',','.') }} VNĐ</td>
		      <td><a class="btn btn-success" href="{{ route('add.cart', $cart->id) }}">Thêm</a></td>
		    </tr>
		    @endforeach
		    @endif
		  </tbody>
		</table>




		@if(isset($cartList))
		<span style="display: none">{{ $a=1 }}</span>
		<h1 class="title">Giỏ hàng</h1>
			<table class="table table-striped">
			  <thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Tên dịch vụ</th>
			      <th scope="col">Thời gian</th>
			      <th scope="col">Mức giá</th>
			      <th scope="col">Thao tác</th>
			    </tr>
			  </thead>
			  <tbody>

			  	@foreach($cartList as $key => $list)
			  	<form action="{{ route('update.cart', $key) }}">
				    <tr>
				      <th scope="row">{{ $a++ }}</th>
				      <td>{{ $list->name }}</td>
				      <td width="200px">
{{-- <div class="quantity buttons_added">
	<input type="button" value="-" class="minus">
  <input type="number" step="1" min="1" max="5" name="qty" value="{{ $list->qty }}" title="Qty" class="input-text qty text" style="width: 40px">
  <input type="button" value="+" class="plus" onchange="updateCart(this.value,'{{ $list->rowId  }}')">
</div> --}}
<div class="form-group">
   <input type="number" min="1" max="5" step="1" class="form-control" id="qty" value="{{ $list->qty }}" data-price="{{ $list->price }}" onchange="updateCart(this.value,'{{ $list->rowId  }}')" disabled="disabled"> <span style="float: right; margin-right: 50px">Tuần</span>
</div>
				      </td>
				      <td>
						<span class="total-item">{{ number_format(($list->qty * $list->price),0,',','.') }}</span> VNĐ
				      </td>
				      <td>
				      	{{-- <input class="btn btn-primary" type="submit" value="Update"> --}}
						<a href="{{ route('delete.cart', $key) }}"><i class="fa fa-times" style="font-size: 30px; margin-left: 10px"></i></a>
				      </td>
				    </tr>
				</form>
			    @endforeach

			  </tbody>
			</table>
		@endif

			<form action="{{ route('get.form.pay_online') }}" method="GET">
				<div class="col-md-9 ml-auto">
					<div class="cart-page-total">
						@if(isset($key))
						<h2>Tổng giỏ hàng</h2>
						<ul>
							<li><h4>Thành tiền <span class="total-item">{{ str_replace(',', '.', \Cart::initial(0, 3)) }}</span> VNĐ</h4></li>
						</ul>
						<div class="chk-button">
							<input class="btn btn-success" type="submit" name="" value="Thanh toán">
						</div>

						@else
						<a class="btn btn-danger" href="{{ route('employer.info') }}">Trở về</a>
						@endif
					</div>
				</div>
				<div class="col-md-3 float-right">
					@if(isset($key))
						<a class="btn btn-danger" href="{{ route('destroy.cart') }}">Xóa giỏ hàng</a>
					@endif
				</div>
			</form>


  	</div>
</div>
<script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('js/qty.js') }}"></script>
<script type="text/javascript">
	    jQuery('<div class="form-group-nav"><div class="form-group-button form-group-up">+</div><div class="form-group-button form-group-down">-</div></div>').insertAfter('.form-group input');
    jQuery('.form-group').each(function() {
      var spinner = jQuery(this),
        input = spinner.find('input[type="number"]'),
        btnUp = spinner.find('.form-group-up'),
        btnDown = spinner.find('.form-group-down'),
        min = input.attr('min'),
        max = input.attr('max');

      btnUp.click(function() {
        var oldValue = parseFloat(input.val());
        if (oldValue >= max) {
          var newVal = oldValue;
        } else {
          var newVal = oldValue + 1;
        }
        spinner.find("input").val(newVal);
        spinner.find("input").trigger("change");
      });

      btnDown.click(function() {
        var oldValue = parseFloat(input.val());
        if (oldValue <= min) {
          var newVal = oldValue;
        } else {
          var newVal = oldValue - 1;
        }
        spinner.find("input").val(newVal);
        spinner.find("input").trigger("change");
      });

    });
</script>
@stop