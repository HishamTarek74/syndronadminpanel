<div class="card">
    <div class="card-body  {{ $bodyClass ?? '' }}">
        {{ $slot }}
    </div>

    @isset($footer)
    <div class="card-footer">
        {{ $footer }}
    </div>
    @endisset
    
</div>