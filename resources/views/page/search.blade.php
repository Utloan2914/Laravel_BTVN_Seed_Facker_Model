@extends('layouts.master')

@section('content')
<div class="container">
    <h2>Kết quả tìm kiếm</h2>

    <!-- Form tìm kiếm -->
    <form action="{{ route('search') }}" method="GET">
        <input type="text" name="keyword" placeholder="Nhập từ khóa..." value="{{ request('keyword') }}">
        <button type="submit">Tìm kiếm</button>
    </form>

    <!-- Kết quả tìm kiếm -->
    <div class="beta-products-list">
        <h4>Kết quả tìm kiếm</h4>
        <div class="beta-products-details">
            <p class="pull-left">{{ count($products) }} sản phẩm được tìm thấy</p>
            <div class="clearfix"></div>
        </div>

        <!-- Nếu không có sản phẩm nào -->
        @if($products->isEmpty())
        <p>Không tìm thấy sản phẩm nào.</p>
        @else
        <div class="row">
            @foreach($products as $product)
            <div class="col-sm-3">
                <div class="single-item">
                    <div class="single-item-header">
                        <a href="{{ route('detail', $product->id) }}">
                            <img width="200" height="200"
                                src="{{ asset('public/source/assets/dest/images/products/' . $product->image) }}" alt="">
                        </a>
                    </div>

                    <!-- Hiển thị sale nếu có -->
                    @if($product->promotion_price != 0)
                    <div class="ribbon-wrapper">
                        <div class="ribbon sale">Sale</div>
                    </div>
                    @endif

                    <div class="single-item-body">
                        <p class="single-item-title">{{ $product->name }}</p>
                        <p class="single-item-price" style="text-align:left;font-size: 15px;">
                            @if($product->promotion_price == 0)
                            <span class="flash-sale">{{ number_format($product->unit_price) }} VND</span>
                            @else
                            <span class="flash-del">{{ number_format($product->unit_price) }} VND</span>
                            <span class="flash-sale">{{ number_format($product->promotion_price) }} VND</span>
                            @endif
                        </p>
                    </div>

                    <div class="single-item-caption">
                        <a class="add-to-cart pull-left" href="">
                            <i class="fa fa-shopping-cart"></i>
                        </a>
                        <a class="add-to-wishlist" href="#">
                            <i class="fa fa-heart"></i>
                        </a>
                        <a class="beta-btn primary" href="#">
                            Chi tiết <i class="fa fa-chevron-right"></i>
                        </a>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Phân trang -->
        <div class="row">{{ $products->links("pagination::bootstrap-4") }}</div>
        @endif
    </div> <!-- .beta-products-list -->
</div>
@endsection