


@extends((( Request::ajax()) ? 'layouts.ajax' : 'layouts.default' ))

@section('content')
<!--start-breadcrumbs-->
<div class="breadcrumbs">
    <div class="container">
        <div class="breadcrumbs-main">
            <ol class="breadcrumb">
                <li><a href="index.html">Home</a></li>
                <li class="active">catalog</li>
            </ol>
        </div>
    </div>
</div>
<!--end-breadcrumbs-->
<!--prdt-starts-->
<div class="prdt">
    <div class="container">
        <div class="prdt-top">
            <div class="col-md-9 prdt-left" id="ajaxCatalog">
                <?php $k=1; ?>
                <?php foreach($data['products'] as $product): ?>
                <?php if(($k-1)%3==0 || $k==1): ?>
                <div class="product-one">
                    <?php endif ?>
                    <div class="col-md-4 product-left p-left">
                        <div class="product-main simpleCart_shelfItem">
                            <a href="single?product=<?= $product['name'] ?>" class="mask"><img class="img-responsive zoom-img" src="/images/<?= $product['picture'] ?>" alt="" /></a>
                            <div class="product-bottom">
                                <h3><?= $product['name'] ?></h3>
                                <p>Explore Now</p>
                                <h4><a class="item_add" href="#"><i></i></a> <span class=" item_price"><?=$data['currency']['prefix'];?><?=ceil($product['price']*$data['currency']['rate']);?><?=$data['currency']['postfix'];?></span></h4>
                            </div>
                            <div class="srch srch1">
                                <?php if($product['discount_number']>0): ?>
                                    <div class="srch">
                                        <span>-<?= $product['discount_number']; ?>%</span>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php if($k%3==0 || $k == count($data['products'])): ?>
                    <div class="clearfix"></div>
                </div>
            <?php endif ?>
                    <?php $k++; ?>
                <?php endforeach; ?>
                @if($data['products']->hasPages())
                    <div class="centering">
                        <div class="pagination">
                            <ul>
                                <li onclick="paginationClick(this.getAttribute('value'))" value="{{$data['products']->previousPageUrl()}}"><a>&laquo;</a></li>
                                <?php for ($i = 1; $i < $data['products']->lastPage() + 1; $i++): ?>
                                    <li onclick="paginationClick(this.getAttribute('value'))" value="{{$data['products']->path() . '?page=' . $i}}"><a {{($i == $data['products']->currentPage()) ? "class=active" : " "}}><?= $i ?></a></li>
                                <?php endfor; ?>
                                <li onclick="paginationClick(this.getAttribute('value'))" value="{{$data['products']->nextPageUrl()}}"><a>&raquo;</a></li>
                            </ul>
                        </div>
                    </div>
                @endif
            </div>
            <div class="col-md-3 single-right ad">
                <?php foreach ($data['adImg'] as $ai): ?>
                    <a href="<?= $ai['link']; ?>"><img src="/images/<?= $ai['img']; ?>" alt=""></a>
                <?php endforeach; ?>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!--product-end-->
@endsection
