
<?
$sql="select * from ".$db_prefix."product where id=$id and status=1";
$result=$db->myquery($sql);
$row=$db->fetch_row($result);
?>
<main>
<section class="path">
	<a href=""><i class="fa fa-home" ></i>Trang chủ</a>
	<?=$db->path('cat',$row['idcat'])?>
</section>
<section class="detail">
	<div class="v-menu w25">
			<h4 class="title main-bg white txt-b"><i class="fa fa-bars"></i><span>Danh mục sản phẩm</span></h4>
			<?=$db->cat_menu('cat')?>
			<ul class="special main-bg white">
				<h2>Khách sạn trông giữ chó mèo </h2>
				<li><a href=""><i class="fa fa-home" ></i><span>Xem phòng</span></a></li>
			</ul>
	</div>
	<div class="box-slide w75">
		<!--phần chi tiết sản phẩm ở đây-->
		<div class="sliderzoom w50">
			<?=zoom_slider($row['img'])?>
		</div>
		<div class="info w50 f-right">
			<h1 class="info-name"><?$row['name']?>(Lượt xem: <?=number_format($row['view'])?>)</h1>
			<p class="info-price"><span class="main-color"><?=number_format($row['price']-$row['price']*$row['discount']/100)?></span></p>
			<p class="info-quantity"><label>SL:</label>
				<select name="txtuqantity">
					<option value="1">1</option><option value="2">2</option><option value="3">3</option>
					<option value="4">4</option><option value="5">5</option><option value="6">6</option>
				</select>
			</p>
			<p class="info-button">
				<button class="btn main-bg white" name="order">
						<i class="fa fa-shopping-cart"></i>
						Đặt hàng
					
				</button>
				<a href="tel: 0129 999 999" class="btn white">
				<i class="fa fa-phone"></i>Gọi tư vấn</a>
			</p>
			<p class="info-code"><span>Mã hàng:</span><?=$row['sku']?></p>
			<p class="info-category"><span>Danh mục sản phẩm:</span>Hàng khuyến mãi</p>
			<p class="info-tag"><span> Từ khóa:</span><?=$row['keyword']?></p>
			<p class="info-brand"><span>Nhãn hàng:</span><?=$row['brand']?></p>
			<p class="info-social">
				<span>Chia sẻ:</span>
					<a href="" class="facebook white"><i class="fa fa-facebook-official"></i></a>
					<a href="" class=""><i class="fa fa-twitter-square"></i></a>
					<a href="" class=""><i class="fa fa-google-plus"></i></a>
			</p>
		</div>
		<div class="infotab">
			<ul class="nav nav-tabs">
			  <li class="active"><a data-toggle="tab" href="#home">Nội dung chính</a></li>
			  <li><a data-toggle="tab" href="#menu1">Bình luận trên Facebook</a></li>
			  <li><a data-toggle="tab" href="#menu2">Bình luận trên Google</a></li>
			</ul>

			<div class="tab-content">
			  <div id="home" class="tab-pane fade in active">
				<h3><?=$row['name']?></h3>
				<p><?=$row['content']?></p>
			  </div>
			  <div id="menu1" class="tab-pane fade">
				<h3> <h3>
				<p> </p>
			  </div>
			  <div id="menu2" class="tab-pane fade">
				<h3> </h3>
				<p> </p>
			  </div>
			</div>
		</div>
	</div>
</section>
<section class="box-product">
	<div class="title"><h2>Thức ăn cho chó mèo</h2></div>
	<div class="product">
		<div class="owl-carousel" id="product">
			<div class="item">
				<a href="" class="item-img">
				<img src="img/item.jpg" alt="Tên sản phẩm"/>
				</a>
				<a href="" class="item-name">
				Sản phẩm thức ăn chó mèo ngon Nhật
				</a>
				<div class="item-price">
					<span class="line-through">100,000đ</span>
					<span class="main-color txt-b">50,000đ</span>
				</div>
				<a href="" class="btn main-bg white">
				<i class="fa fa-shopping-bag"></i>Mua hàng
				</a>
				<div class="discount bg-red white txt-b">
					<span><i class="fa fa-arrow-down"></i>25%</span>
				</div>
				<a href="" class="view">
				<span class="main-bg white"><i class="fa fa-info"></i>Chi tiết </span>
				</a>
			</div>
		 
		</div>
	</div>	
</section>
<section class="box-product">
	<div class="title"><h2>Sữa tắm chó mèo</h2></div>
	<div class="product">
		<div class="owl-carousel" id="product1">
			<div class="item">
				<a href="" class="item-img">
				<img src="img/item1.jpg" alt="Tên sản phẩm"/>
				</a>
				<a href="" class="item-name">
				Sữa tắm cho mèo
				</a>
				<div class="item-price">
					<span class="line-through">200,000đ</span>
					<span class="main-color txt-b">150,000đ</span>
				</div>
				<a href="" class="btn main-bg white">
				<i class="fa fa-shopping-bag"></i>Mua hàng
				</a>
			</div>
		 
		</div>
	</div>
</section>
<section class="box-product">
	<div class="title"><h2>Nhà cây cào móng cho mèo</h2></div>
	<div class="product">
		<div class="owl-carousel" id="product2">
			<div class="item">
				<a href="" class="item-img">
				<img src="img/item2.jpg" alt="Tên sản phẩm"/>
				</a>
				<a href="" class="item-name">
				Nhà cây cào móng cho mèo
				</a>
				<div class="item-price">
					<span class="line-through">200,000đ</span>
					<span class="main-color txt-b">150,000đ</span>
				</div>
				<a href="" class="btn main-bg white">
				<i class="fa fa-shopping-bag"></i>Mua hàng
				</a>
			</div>		 
		</div>
	</div>
</section>
</main>
