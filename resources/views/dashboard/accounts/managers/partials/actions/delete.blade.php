@can('delete', $manager)
    <a href="#manager-{{ $manager->id }}-delete-model"
       class="btn btn-outline-danger btn-sm"
       data-toggle="modal">
        <i class="fas fa fa-fw fa-user-times"></i>
    </a>


    <!-- Modal -->
    <div class="modal fade" id="manager-{{ $manager->id }}-delete-model" tabindex="-1" role="dialog"
         aria-labelledby="modal-title-{{ $manager->id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-title-{{ $manager->id }}">@lang('managers.dialogs.delete.title')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @lang('managers.dialogs.delete.info')
                </div>
                <div class="modal-footer">
                    {{ BsForm::delete(route('dashboard.managers.destroy', $manager)) }}
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        @lang('managers.dialogs.delete.cancel')
                    </button>
                    <button type="submit" class="btn btn-danger">
                        @lang('managers.dialogs.delete.confirm')
                    </button>
                    {{ BsForm::close() }}
                </div>
            </div>
        </div>
    </div>
@endcan