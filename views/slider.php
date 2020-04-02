<!-- start section -->
<section class="section light-backgorund">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-md-3">
                    <div class="navbar-vertical">
                        <ul class="nav nav-stacked">
                            <li class="header">
                                <h6 class="text-uppercase">Categories <i class="fa fa-navicon pull-right"></i></h6>
                            </li>
                            <?php
                                $categories = Category::getCategories();
                                foreach($categories as $category) {
                                    echo("<li><a href='".BASE_URL."products/index.php?category_id=".$category->id."&brand_id=0&type=all'>".$category->name."</a></li>");
                                }
                            ?>
                        </ul>
                    </div><!-- end navbar-vertical -->

                    <hr class="spacer-20 no-border">


                </div><!-- end col -->
                <div class="col-sm-8 col-md-9">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="owl-carousel slider owl-theme">
                                <div class="item">
                                    <figure>
                                        <a href="javascript:void(0);">
                                            <img src="<?php echo(BASE_URL); ?>img/slider/slider_10.jpg" alt="" />
                                        </a>
                                    </figure>
                                </div><!-- end item -->
                                <div class="item">
                                    <figure>
                                        <a href="javascript:void(0);">
                                            <img src="<?php echo(BASE_URL); ?>img/slider/slider_09.jpg" alt="" />
                                        </a>
                                    </figure>
                                </div><!-- end item -->
                                <div class="item">
                                    <figure>
                                        <a href="javascript:void(0);">
                                            <img src="<?php echo(BASE_URL); ?>img/slider/slider_08.jpg" alt="" />
                                        </a>
                                    </figure>
                                </div><!-- end item -->
                            </div><!-- end owl carousel -->
                        </div><!-- end col -->
                    </div><!-- end row -->

                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section>
    <!-- end section -->

    
