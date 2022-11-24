<div class="row">
    <div class="col-md-6">
        <p class="mb-4 font-weight-bold">@lang('notifications.title')</p>
        <hr>
        {{ BsForm::text('title')->required() }}
        {{ BsForm::textarea('body')->rows(5)->required() }}
    </div>
    <div class="col-md-6 my-5">
        <label for="cities">{{__('notifications.to')}}</label>
        
        {{ BsForm::radio('users', 'all')->label(__('users.all')) }}
        {{ BsForm::radio('users', 'sellers')->label(__('sellers.plural')) }}
        {{ BsForm::radio('users', 'stores')->label(__('stores.plural')) }}
        {{ BsForm::radio('users', 'certified_stores')->label(__('certifiedstores.plural')) }}

        <hr>
        <div class="form-check">
            <input type="checkbox" name="check_all_cities"
                    class="check_all_cities form-check-input" id="check_all_cities">
            <label class="form-check-label" for="exampleCheck1">@lang('notifications.check_all')</label>
        </div>
        
        <select name="country_id" id="country_id">
            <option value="">{{__('countries.select')}}</option>
            @foreach($countries as $country)
            <option value="{{$country->id}}">{{$country->name}}</option>
            @endforeach
        </select>
        <div class="cities d-none">
        {{ BsForm::select('cities')->multiple()->label(trans('cities.plural'))
            ->name('cities')->options([])
        }}
        </div>
        
    </div>
    
</div>


@prepend('scripts')
<script>
    $(document).ready(function () {
        $('#check_all_users').click(function () {
            if ($(this).is(":checked")) {
                $('#users').addClass("disabledbutton");
                $.ajax({
                    url: '{{route('api.notifications.clearOptions.select')}}',
                    data: {
                        sellers_city_id: $(this).val()
                    },
                });
            } else {
                $('#sellers_city').removeClass("disabledbutton");
            }
        });
        

        $('#check_all_cities').click(function () {
            if ($(this).is(":checked")) {
                $('#cities').addClass("disabledbutton");
                $.ajax({
                    url: '{{route('api.notifications.clearOptions.select')}}',
                    data: {
                        stores_city_id: $(this).val()
                    },
                });
            } else {
                $('#cities').removeClass("disabledbutton");
            }
        });

        $('#country_id').change(() => {
            var id = $('#country_id').val()
            $.ajax({
                url: "/api/countries/cities/options",
                data: {
                    country_id: id
                },
                success: function (data) {
                    var select = $('form select[name=cities]');
                    $('.cities').removeClass('d-none');
                    select.empty();
                    $.each(data, function (key, value) {
                        select.append('<option value=' + key + '>' + value + '</option>');
                    });
                }
            });
        })
    });
</script>
@endprepend