@can('restore', $seller)
    <a href="#seller-{{ $seller->id }}-restore-model"
       class="btn btn-outline-primary btn-sm"
       data-toggle="modal">
        <i class="fas fa fa-fw fa-trash-restore"></i>
    </a>

    <!-- Modal -->
    <div class="modal fade" id="seller-{{ $seller->id }}-restore-model" tabindex="-1" role="dialog"
         aria-labelledby="modal-title-{{ $seller->id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"
                        id="modal-title-{{ $seller->id }}">@lang('sellers.dialogs.restore.title')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @lang('sellers.dialogs.restore.info')
                </div>
                <div class="modal-footer">
                    {{ BsForm::post(route('dashboard.sellers.restore', $seller)) }}
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        @lang('sellers.dialogs.restore.cancel')
                    </button>
                    <button type="submit" class="btn btn-primary">
                        @lang('sellers.dialogs.restore.confirm')
                    </button>
                    {{ BsForm::close() }}
                </div>
            </div>
        </div>
    </div>
@endcan
