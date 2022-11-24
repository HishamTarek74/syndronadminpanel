<div class="card radius-10{{ isset($style) ? ' bg-'.$style : '' }}">
    <div class="card-body" style="position: relative;">
        <div class="d-flex align-items-center">
            <div>
                <p class="mb-0 text-secondary">{{ $text }}</p>
                <h4 class="my-1">{{ $number }}</h4>
                <!-- <p class="mb-0 font-13 text-success"><i class="bx bxs-up-arrow align-middle"></i>$34 Since last week</p> -->
            </div>
            <div class="widgets-icons bg-light-success {{ isset($icon_color) ? ' text-'.$icon_color : '' }} ms-auto">
                <i class="fa fa-{{ $icon }}"></i>
            </div>
        </div>
    </div>
</div>