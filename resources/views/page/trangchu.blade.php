@extends('layouts.master')
@section('content')
<div class="container mt-4">
    <div class="row">
        @foreach($slide as $sl)
        <div class="col-md-3 col-sm-6">
            <img src="{{ asset('source/image/slide/'.$sl->image) }}"
                onerror="this.onerror=null; this.src='https://via.placeholder.com/300x200?text=No+Image'"
                class="img-fluid rounded" style="height: 200px; object-fit: cover;">
        </div>
        @endforeach
    </div>
</div>

</div>
<div class="container">
    <div id="content" class="space-top-none">
        <div class="main-content">
            <div class="space60">&nbsp;</div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="beta-products-list">
                        <h4>New Products</h4>
                        <div class="beta-products-details">
                            <p class="pull-left">{{count($new_product)}} styles found</p>
                            <div class="clearfix"></div>
                        </div>

                        <div class="row">
                            @foreach($new_product as $new)
                            <div class="col-sm-3">
                                <div class="single-item">
                                    <div class="single-item-header">
                                        <a href="detail/{{$new->id}}"><img width="200" height="200"
                                                src="/source/image/product/{{$new->image}}" alt=""></a>
                                    </div>
                                    @if($new->promotion_price==!0)
                                    <div class="ribbon-wrapper">
                                        <div class="ribbon sale">Sale</div>
                                    </div>
                                    @endif
                                    <div class="single-item-body">
                                        <p class="single-item-title">{{$new->name}}</p>
                                        <p class="single-item-price" style="text-align:left;font-size: 15px;">
                                            @if($new->promotion_price==0)

                                            <span class="flash-sale">{{number_format($new->unit_price)}} Đồng</span>
                                            @else
                                            <span class="flash-del">{{number_format($new->unit_price)}} Đồng </span>
                                            <span class="flash-sale">{{number_format($new->promotion_price)}} Đồng</span>
                                            @endif
                                        </p>
                                    </div>
                                    <div class="single-item-caption">
                                        <a class="add-to-cart pull-left" href="{{route('themgiohang',$new->id)}}"><i
                                                class="fa fa-shopping-cart"></i></a>

                                        <a class="add-to-wishlist" href="wishlist/add/{{$new->id}}"><i class="fa fa-heart"></i></a>

                                        <a class="beta-btn primary" href="detail/{{$new->id}}">Details <i
                                                class="fa fa-chevron-right"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="row">{{$new_product->links("pagination::bootstrap-4")}}</div>
                    </div> <!-- .beta-products-list -->

                    <div class="space50">&nbsp;</div>

                    <div class="beta-products-list">
                        <h4>Top Products</h4>
                        <div class="beta-products-details">
                            <p class="pull-left">{{count($promotion_product)}} founded</p>
                            <div class="clearfix"></div>
                        </div>
                        <div class="row">
                            @foreach($promotion_product as $km)
                            <div class="col-sm-3">
                                <div class="single-item">
                                    <div class="single-item-header">
                                        <a href=""><img width="200" height="200" src="/source/image/product/{{$km->image}}" alt=""></a>
                                    </div>
                                    <div class="single-item-body">
                                        <p class="single-item-title">{{$km->name}}</p>
                                        <p class="single-item-price" style="text-align:left;font-size: 15px;">
                                            @if($km->promotion_price==0)
                                            <span class="flash-sale">{{number_format($km->unit_price)}} Đồng</span>
                                            @else
                                            <span class="flash-del">{{number_format($km->unit_price)}} Đồng</span>
                                            <span class="flash-sale">{{number_format($km->promotion_price)}} Đồng</span>
                                            @endif
                                        </p>
                                    </div>
                                    <div class="single-item-caption">
                                        <a class="add-to-cart pull-left" href="{{route('themgiohang',$km->id)}}"><i
                                                class="fa fa-shopping-cart"></i></a>

                                        <a class="add-to-wishlist" href="wishlist/add/{{$new->id}}"><i class="fa fa-heart"></i></a>

                                        <a class="beta-btn primary" href="detail/{{$km->id}}">Details <i
                                                class="fa fa-chevron-right"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="row">{{$promotion_product->links("pagination::bootstrap-4")}}</div>

                    </div> <!-- .beta-products-list -->
                </div>
            </div> <!-- end section with sidebar and main content -->

        </div> <!-- .main-content -->
    </div> <!-- #content -->
</div> <!-- .container -->

@endsection