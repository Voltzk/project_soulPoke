@extends('layouts.app')

@section('title', 'Shop')
@section('content')
    <div class="znote-box shop-box">
        <div class="znote-title">Shop</div>
        <div class="znote-content">
            <h2>Shop Offers</h2>
            <p>You have {{ auth()->check() ? (auth()->user()->account->points ?? 0) : 0 }} points. <a href="#">(Buy points)</a></p>
            <div class="shop-tabs">
                <ul>
                    <li><a href="?category=all" class="{{ request('category', 'all') == 'all' ? 'active' : '' }}">ALL</a></li>
                    @foreach(['items','premium','outfits','mounts','misc','points'] as $catName)
                        @if(isset($offers[$catName]))
                        <li><a href="?category={{ $catName }}" class="{{ request('category') == $catName ? 'active' : '' }}">{{ strtoupper($catName) }}</a></li>
                        @endif
                    @endforeach
                </ul>
            </div>
            <div class="shop-offers">
                @php $cat = request('category', 'all'); @endphp
                @foreach(['points','items','premium','outfits','mounts','misc'] as $catName)
                    @if(($cat == 'all' || $cat == $catName) && isset($offers[$catName]))
                        <h3>{{ ucfirst($catName) }}</h3>
                        <table>
                            <tr>
                                @if($catName == 'points')
                                    <th>Name</th><th>Image</th><th>Item ID</th><th>Points Received</th><th>Cost</th><th>Action</th>
                                @elseif($catName == 'items')
                                    <th>Item</th><th>Image</th><th>Count</th><th>Points</th><th>Action</th>
                                @elseif($catName == 'premium')
                                    <th>Description</th><th>Image</th><th>Duration</th><th>Points</th><th>Action</th>
                                @elseif($catName == 'outfits' || $catName == 'mounts')
                                    <th>Description</th><th>Image</th><th>Points</th><th>Action</th>
                                @elseif($catName == 'misc')
                                    <th>Description</th><th>Count/duration</th><th>Points</th><th>Action</th>
                                @endif
                            </tr>
                            @foreach($offers[$catName] as $item)
                                <tr>
                                    @if($catName == 'points')
                                        <td>{{ $item->name }}</td>
                                        <td><img src="/images/shop/{{ $item->image }}" width="24"></td>
                                        <td>{{ $item->item_id }}</td>
                                        <td>{{ $item->value }}</td>
                                        <td>{{ $item->cost }}</td>
                                        <td>
                                            @if(auth()->check())
                                            <form action="{{ route('shop.purchase', $item->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="shop-btn">PURCHASE</button>
                                            </form>
                                            @else
                                            <span class="text-muted">Login to purchase</span>
                                            @endif
                                        </td>
                                    @elseif($catName == 'items')
                                        <td>{{ $item['name'] ?? '' }}</td>
                                        <td><img src="/images/shop/{{ $item['image'] ?? '' }}" width="24"></td>
                                        <td>{{ $item['count'] ?? '' }}</td>
                                        <td>{{ $item['points'] ?? '' }}</td>
                                        <td><span class="text-muted">Indisponível</span></td>
                                    @elseif($catName == 'premium')
                                        <td>{{ $item['name'] ?? '' }}</td>
                                        <td><img src="/images/shop/{{ $item['image'] ?? '' }}" width="24"></td>
                                        <td>{{ $item['duration'] ?? '' }}</td>
                                        <td>{{ $item['points'] ?? '' }}</td>
                                        <td><span class="text-muted">Indisponível</span></td>
                                    @elseif($catName == 'outfits' || $catName == 'mounts')
                                        <td>{{ $item['name'] ?? '' }}</td>
                                        <td><img src="/images/shop/{{ $item['image'] ?? '' }}" width="24"></td>
                                        <td>{{ $item['points'] ?? '' }}</td>
                                        <td><span class="text-muted">Indisponível</span></td>
                                    @elseif($catName == 'misc')
                                        <td>{{ $item['name'] ?? '' }}</td>
                                        <td>{{ $item['count'] ?? '' }}</td>
                                        <td>{{ $item['points'] ?? '' }}</td>
                                        <td><span class="text-muted">Indisponível</span></td>
                                    @endif
                                </tr>
                            @endforeach
                        </table>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection
