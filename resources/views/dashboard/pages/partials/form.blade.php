@include('dashboard.errors')
@bsMultilangualFormTabs
{{ BsForm::text('title') }}
{{ BsForm::textarea('content')
->attribute('class', 'form-control editor') }}
@endBsMultilangualFormTabs

@push('scripts')
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

<script>
      tinymce.init({
        selector: '.editor'
      });
    </script>
    
@endpush
