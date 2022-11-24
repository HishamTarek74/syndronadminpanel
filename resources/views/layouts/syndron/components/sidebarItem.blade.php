@if(isset($can['ability'], $can['model'])
    && Gate::allows($can['ability'], $can['model'])
    || ! isset($can))
    <li>
        <a href="{{ isset($tree) ? '#' : $url }}" class="{{ isset($tree) && is_array($tree) ? ' has-arrow' : '' }}">
            @isset($icon)

            <div class="parent-icon">
                <i class='{{ $icon }}'></i>
            </div>
            @endisset
            <div class="menu-title">
                {{ $name }}
                @isset($badge)
                    <span class="right badge badge-{{ $badgeLevel ?? 'danger' }}">{{ $badge }}</span>
                @endisset
            </div>
        </a>
        @if(isset($tree) && is_array($tree) && count($tree))
        <ul>
            @foreach($tree as $item)
                @if(isset($item['can']['ability'], $item['can']['model'])
                    && Gate::allows($item['can']['ability'], $item['can']['model'])
                    || ! isset($item['can']))
                    <li>
                        <a href="{{ $item['url'] }}" class="{{ isset($item['active']) && $item['active'] ? ' active' : '' }}">
                            <i class="bx bx-left-arrow-alt"></i>
                            {{ $item['name'] }}
                        @isset($item['badge'])
                                <span class="right badge badge-{{ $item['badgeLevel'] ?? 'danger' }}">
                                {{ $item['badge'] }}
                                </span>
                            @endisset
                        </a>
                    </li>
                @endif
            @endforeach


        </ul>
        @endif
    </li>


@endif
