<main>
<section class="path">
	<a href=""><i class="fa fa-home"></i>Trang chủ</a>
	<a href=""><i class="fa fa-angle-right"></i>Chi tiết đơn hàng</a>
</section>
<section class="billing">
	<div class="table-responsive">          
	  <table class="table">
		<thead class="main-bg white">
		  <tr>
			<th>#</th>
			<th>Hình ảnh</th>
			<th>Tên sản phẩm</th>
			<th>Mã sản phẩm</th>
			<th>Số lượng</th>
			<th>Giá</th>
			<th>Giảm giá</th>
			<th>Thành tiền</th>
		  </tr>
		</thead>
		<tbody>
		  <tr>
			<td>1</td>
			<td><img src="img/item.jpg" width="50"/></td>
			<td>Pitt</td>
			<td>35</td>
			<td>New York</td>
			<td>USA</td>
			<td>USA</td>
			<td>USA</td>
		  </tr>
		   <tr>
			<td>1</td>
			<td><img src="img/item.jpg" width="50"/></td>
			<td>Pitt</td>
			<td>35</td>
			<td>New York</td>
			<td>USA</td>
			<td>USA</td>
			<td>USA</td>
		  </tr>
		   <tr>
			<td>1</td>
			<td><img src="img/item.jpg" width="50"/></td>
			<td>Pitt</td>
			<td>35</td>
			<td>New York</td>
			<td>USA</td>
			<td>USA</td>
			<td>USA</td>
		  </tr>
		</tbody>
	  </table>
	</div>
</section>
<section class="customer">
	<form>
	<div class="row">
	  <div class="col-sm-6">
			<div class="path">
				<a href="#"><i class="fa fa-info-circle"></i>Thông tin khách hàng</a>
			</div>
			
			  <div class="form-group">
				<label for="name">Họ và tên:</label>
				<input type="text" class="form-control" id="name" name="name">
			  </div>
			  <div class="form-group">
				<label for="phone">Điện thoại:</label>
				<input type="number" class="form-control" id="phone" name="phone">
			  </div>
			  <div class="form-group ">
				<label for="email">Email:</label>
				<input type="email" class="form-control" id="email" name="email">
			  </div>
			  <div class="form-group ">
				<label for="address">Địa chỉ:</label>
				<input type="address" class="form-control" id="address" name="address" />
			  </div>
			  <div class="form-group ">
				<label for="comment">Yêu cầu:</label>
				<textarea class="form-control" rows="5" id="comment" name="comment"></textarea>
			  </div> 
		</div>
	  <div class="col-sm-6">
			<div class="path">
				<a href="#"><i class="fa fa-barcode"></i>Mã đơn hàng:</a>
			</div>
			 <div class="form-group ">
				<span class="btn btn-default">12345</span>
			  </div> 
			<div class="path">
				<a href="#"><i class="fa fa-dollar"></i>Phương thức thanh toán</a>
			</div>
			<div class="radio">
			  <label><input type="radio" name="mothedpay">Thanh toán bằng tiền mặt</label>
			</div>
			<div class="radio">
			  <label><input type="radio" name="mothedpay">Thanh toán qua ngân hàng</label>
			</div>
			<div class="radio disabled">
			  <label><input type="radio" name="mothedpay">Thanh toán qua ngân lượng</label>
			</div>
			<div class="path">
				<a href="#"><i class="fa fa-info-circle"></i>Mã giảm giá:</a>
			</div>
			 
			<div class="form-group">
					 <div class="col-xs-4">
						<input type="text" class="form-control" id="coupon" name="coupon" />
					 </div>
			</div><br><br><br>
			<div class="form-group">
				 <button type="submit" name="sbmpay" class="btn btn-success">
				 <i class="fa fa-send"></i>
				 Thực hiện
				 </button>
			</div>
		</div> 
	</div>
	</form>
</section>
<section class="box-product">
	<div class="title"><h2>Sản phẩm bán chạy</h2></div>
	<div class="product">
		<div class="owl-carousel" id="product1">
			<div class="item">
				<a href="" class="item-img">
				<img src="img/item.jpg" alt="Tên sản phẩm"/>
				</a>
				<a href="" class="item-name">
				Sản phẩm thức ăn chó mèo ngon Nhật
				</a>
				<div class="item-price">
					<span class="line-through">100,000 đ</span>
					<span class="main-color txt-b">50,000 đ</span>
				</div>
				<a href="" class="btn main-bg white">
				<i class="fa fa-shopping-bag"></i>Mua hàng
				</a>
			</div>
		</div>
	</div>
</section>
</main>
