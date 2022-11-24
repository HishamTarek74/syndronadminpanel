<div class="card card-gray card-outline">
    @if(isset($title) || isset($tools))
        <div class="card-header border-0">
            <h3 class="card-title m-0">{{ $title ?? '' }}</h3>

            <div class="card-tools">
                {{ $tools ?? '' }}
            </div>
        </div>
    @endif

    <div class="card-body table-responsive p-0">
        <table id="example2" class="table table-striped table-bordered">
            {{ $slot }}
        </table>
    </div>

    @isset($footer)
        <div class="card-footer">
            {{ $footer }}
        </div>
    @endisset
</div>
<!-- /.card -->

