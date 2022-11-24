@can('forceDelete', $seller)
    <a href="#seller-{{ $seller->id }}-force-delete-model"
       class="btn btn-outline-danger btn-sm"
       data-toggle="modal">
        <i class="fas fa fa-fw fa-trash"></i>
    </a>

    <!-- Modal -->
    <div class="modal fade" id="seller-{{ $seller->id }}-force-delete-model" tabindex="-1" role="dialog"
         aria-labelledby="modal-title-{{ $seller->id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-title-{{ $seller->id }}">@lang('sellers.dialogs.forceDelete.title')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @lang('sellers.dialogs.forceDelete.info')
                </div>
                <div class="modal-footer">
                    {{ BsForm::delete(route('dashboard.sellers.forceDelete', $seller)) }}
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        @lang('sellers.dialogs.forceDelete.cancel')
                    </button>
                    <button type="submit" class="btn btn-danger">
                        @lang('sellers.dialogs.forceDelete.confirm')
                    </button>
                    {{ BsForm::close() }}
                </div>
            </div>
        </div>
    </div>
@endcan
