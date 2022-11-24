@can('forceDelete', $certifiedstore)
    <a href="#seller-{{ $certifiedstore->id }}-force-delete-model"
       class="btn btn-outline-danger btn-sm"
       data-toggle="modal">
        <i class="fas fa fa-fw fa-trash"></i>
    </a>

    <!-- Modal -->
    <div class="modal fade" id="seller-{{ $certifiedstore->id }}-force-delete-model" tabindex="-1" role="dialog"
         aria-labelledby="modal-title-{{ $certifiedstore->id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-title-{{ $certifiedstore->id }}">@lang('certifiedstores.dialogs.forceDelete.title')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @lang('certifiedstores.dialogs.forceDelete.info')
                </div>
                <div class="modal-footer">
                    {{ BsForm::delete(route('dashboard.certifiedstores.forceDelete', $certifiedstore)) }}
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        @lang('certifiedstores.dialogs.forceDelete.cancel')
                    </button>
                    <button type="submit" class="btn btn-danger">
                        @lang('certifiedstores.dialogs.forceDelete.confirm')
                    </button>
                    {{ BsForm::close() }}
                </div>
            </div>
        </div>
    </div>
@endcan
