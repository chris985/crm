@extends('common')

@section('content')
<div class="card">
  <h2>Laravel 5 - Dynamic autocomplete search using select2 JS Ajax</h2>
  <br/>
  <form>
    <select class="search form-control multiple" name="search" multiple="multiple"></select>
  </form>
</div>
@endsection

@section('js')
<script type="text/javascript">
  $('.search').select2({
    placeholder: 'Select an item',
    ajax: {
      url: 'globalsearch-autocomplete',
      dataType: 'json',
      delay: 250,
      processResults: function (data) {
        return {
          results: $.map(data, function (item) {
            return {
              text: item.name,
              id: item.id
            }
          })
        };
      },
      cache: true
    }
  });
</script>
@endsection