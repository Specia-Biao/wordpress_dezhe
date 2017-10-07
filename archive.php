<?php

//产品
$product=[];
$prodtct_cats=get_categories("child_of=2");
foreach ($prodtct_cats as $prodtct_cat){
	array_push($product,$prodtct_cat->cat_ID);
}



//资讯
$news=[];
$news_cats=get_categories("child_of=8");
foreach ($news_cats as $news_cat){
	array_push($news,$news_cat->cat_ID);
}


//德哲中国特殊
$special=[];
$special_cats=get_categories("child_of=22");
foreach ($special_cats as $special_cat){
	array_push($special,$special_cat->cat_ID);
}

//门店查询
$map=[];
$map_cats=get_categories("child_of=13");
foreach ($map_cats as $map_cat){
	array_push($map,$map_cat->cat_ID);
}


if(in_category($product)){
	include(TEMPLATEPATH.'/category/category-product.php');
}

else if(in_category($news)){
	include(TEMPLATEPATH.'/category/category-news.php');
}


else if(in_category($special)){
	include(TEMPLATEPATH.'/category/category-special.php');
}
//德哲china

else if(in_category(22)){
	include(TEMPLATEPATH.'/category/category-china.php');
}





else if(in_category($map)){
	include(TEMPLATEPATH.'/category/category-store.php');
}






else{
	include(TEMPLATEPATH.'/category/category-default.php');
}

?>
