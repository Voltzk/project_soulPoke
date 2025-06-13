@extends('layouts.app')

@section('title', 'Shop')
@section('content')
    <div class="znote-box shop-box">
        <div class="znote-title">Shop</div>
        <div class="znote-content">
            <h2>Shop Offers</h2>
            <p>You have 0 points. <a href="#">(Buy points)</a></p>
            <div class="shop-tabs">
                <ul>
                    <li><a href="?category=all" class="{{ request('category', 'all') == 'all' ? 'active' : '' }}">ALL</a></li>
                    <li><a href="?category=items" class="{{ request('category') == 'items' ? 'active' : '' }}">ITEMS</a></li>
                    <li><a href="?category=premium" class="{{ request('category') == 'premium' ? 'active' : '' }}">PREMIUM</a></li>
                    <li><a href="?category=outfits" class="{{ request('category') == 'outfits' ? 'active' : '' }}">OUTFITS</a></li>
                    <li><a href="?category=mounts" class="{{ request('category') == 'mounts' ? 'active' : '' }}">MOUNTS</a></li>
                    <li><a href="?category=misc" class="{{ request('category') == 'misc' ? 'active' : '' }}">MISC</a></li>
                </ul>
            </div>
            <div class="shop-offers">
                @php $cat = request('category', 'all'); @endphp
                @if($cat == 'all' || $cat == 'items')
                <h3>Items</h3>
                <table>
                    <tr><th>Item</th><th>Image</th><th>Count</th><th>Points</th><th>Action</th></tr>
                    @foreach($offers['items'] as $item)
                        <tr>
                            <td>{{ $item['name'] }}</td>
                            <td><img src="/images/shop/{{ $item['image'] }}" width="24"></td>
                            <td>{{ $item['count'] }}</td>
                            <td>{{ $item['points'] }}</td>
                            <td><button class="shop-btn">PURCHASE</button></td>
                        </tr>
                    @endforeach
                </table>
                @endif
                @if($cat == 'all' || $cat == 'premium')
                <h3>Premium</h3>
                <table>
                    <tr><th>Description</th><th>Image</th><th>Duration</th><th>Points</th><th>Action</th></tr>
                    @foreach($offers['premium'] as $item)
                        <tr>
                            <td>{{ $item['name'] }}</td>
                            <td><img src="/images/shop/{{ $item['image'] }}" width="24"></td>
                            <td>{{ $item['duration'] }}</td>
                            <td>{{ $item['points'] }}</td>
                            <td><button class="shop-btn">PURCHASE</button></td>
                        </tr>
                    @endforeach
                </table>
                @endif
                @if($cat == 'all' || $cat == 'outfits')
                <h3>Outfits</h3>
                <table>
                    <tr><th>Description</th><th>Image</th><th>Points</th><th>Action</th></tr>
                    @foreach($offers['outfits'] as $item)
                        <tr>
                            <td>{{ $item['name'] }}</td>
                            <td><img src="/images/shop/{{ $item['image'] }}" width="24"></td>
                            <td>{{ $item['points'] }}</td>
                            <td><button class="shop-btn">PURCHASE</button></td>
                        </tr>
                    @endforeach
                </table>
                @endif
                @if($cat == 'all' || $cat == 'mounts')
                <h3>Mounts</h3>
                <table>
                    <tr><th>Description</th><th>Image</th><th>Points</th><th>Action</th></tr>
                    @foreach($offers['mounts'] as $item)
                        <tr>
                            <td>{{ $item['name'] }}</td>
                            <td><img src="/images/shop/{{ $item['image'] }}" width="24"></td>
                            <td>{{ $item['points'] }}</td>
                            <td><button class="shop-btn">PURCHASE</button></td>
                        </tr>
                    @endforeach
                </table>
                @endif
                @if($cat == 'all' || $cat == 'misc')
                <h3>Misc</h3>
                <table>
                    <tr><th>Description</th><th>Count/duration</th><th>Points</th><th>Action</th></tr>
                    @foreach($offers['misc'] as $item)
                        <tr>
                            <td>{{ $item['name'] }}</td>
                            <td>{{ $item['count'] ?? '' }}</td>
                            <td>{{ $item['points'] }}</td>
                            <td><button class="shop-btn">PURCHASE</button></td>
                        </tr>
                    @endforeach
                </table>
                @endif
            </div>
        </div>
    </div>
@endsection
