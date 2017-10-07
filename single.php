<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/31
 * Time: 16:38
 */

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






    if(in_category($news)){
    include(TEMPLATEPATH . '/single/single-news.php');
    }

    else if(in_category($product)){

	include(TEMPLATEPATH . '/single/single-product.php');

	}
    //门店查询
    else if(in_category($map)){
	    include(TEMPLATEPATH . '/single/single-serve-store.php');
    }


	//服务
	else if(in_category("14")){
		include(TEMPLATEPATH . '/single/single-serve-measure.php');
	}else if(in_category("15")){
		include(TEMPLATEPATH . '/single/single-serve-info.php');
	}else if(in_category("16")){
		include(TEMPLATEPATH . '/single/single-serve-massage.php');
	}

	//人才招聘
	else if(in_category("19")){
		include(TEMPLATEPATH . '/single/single-job.php');
	}

	//德哲世界
	else if(in_category("22")){
		include(TEMPLATEPATH . '/single/single-special.php');
	}

	//门店查询
	else if(in_category("13")){
		include(TEMPLATEPATH . '/single/single-special.php');
	}

	else{
    include(TEMPLATEPATH . '/single/single-default.php');
    }
    ?>