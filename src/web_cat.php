<main>
<section class="path">
	<a href=""><i class="fa fa-home" ></i>Trang chủ</a>
	<?=$db->path('cat',$id)?>
</section>
<?=$db->list_cat_product("product",$id)?>
</main>