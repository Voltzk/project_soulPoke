@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div style="max-width: 700px; margin: 2rem auto;">
        @foreach($news as $item)
            <div class="znote-box">
                <div class="znote-title">
                    {{ \Carbon\Carbon::createFromTimestamp($item->date)->format('d F Y (H:i)') }}
                    by {!! $item->author ? '<a href="#" style="color: #bfa76f; font-weight: bold;">' . e($item->author) . '</a>' : '-' !!}
                    - [UPDATE]
                </div>
                <div class="znote-content">
                    @if(!empty($item->text))
                        <div style="margin-bottom: 1em;">{!! $item->text !!}</div>
                    @endif
                    @if(!empty($item->image))
                        <img src="{{ asset('images/' . $item->image) }}" class="galleryImage" style="max-width:100%;border:1px solid #bfa76f;border-radius:4px;">
                    @endif
                </div>
            </div>
        @endforeach
    </div>
@endsection
