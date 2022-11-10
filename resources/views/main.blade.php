@extends('layouts.default')
@section('content')
    <div class="bnr" id="home">
        <div  id="top" class="callbacks_container">
            <ul class="rslides" id="slider4">
                @foreach($data['banners'] as $banner)
                    <li>
                        <img src="/images/{{$banner['img']}}" alt="{{$banner['name']}}"/>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="clearfix"> </div>
    </div>
    <!--banner-ends-->
    <!--Slider-Starts-Here-->
    <script src="/js/responsiveslides.min.js"></script>
    <script>
        // You can also use "$(window).load(function() {"
        $(function () {
            // Slideshow 4
            $("#slider4").responsiveSlides({
                auto: true,
                pager: true,
                nav: true,
                speed: 500,
                namespace: "callbacks",
                before: function () {
                    $('.events').append("<li>before event fired.</li>");
                },
                after: function () {
                    $('.events').append("<li>after event fired.</li>");
                }
            });

        });
    </script>
    <!--End-slider-script-->
    <!--product-starts-->
    <div class="product">
        <div class="container">
            <div class="product-top">
                <?php $k=1; ?>
                <?php foreach($data['products'] as $product): ?>
                <?php if(($k-1)%4==0 || $k==1): ?>
                <div class="product-one">
                    <?php endif ?>
                    <div class="col-md-3 product-left">
                        <div class="product-main simpleCart_shelfItem">
                            <a href="single?product=<?= $product['name'] ?>" class="mask"><img class="img-responsive zoom-img" src="/images/<?= $product['picture']; ?>" alt="" /></a>
                            <div class="product-bottom">
                                <h3><?= $product['name']; ?></h3>
                                <p>Explore Now</p>
                                <h4><a class="item_add" href="/#"><i></i></a> <span class=" item_price"><?=$data['currency']['prefix'];?><?=ceil($product['price']*$data['currency']['rate']);?><?=$data['currency']['postfix'];?></span></h4>
                            </div>
                            <?php if($product['discount_number']>0): ?>
                            <div class="srch">
                                <span>-<?= $product['discount_number']; ?>%</span>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php if($k%4==0 || $k == count($data['products'])): ?>
                    <div class="clearfix"></div>
                </div>
                <?php endif ?>
                <?php $k++; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <!--product-end-->
@endsection
