@extends('frontend.master')
@section('title','| The Job')
@section('top_menu')
        @include('frontend.include.top_menu')
@endsection


@section('stylesheet')

  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="https:/resources/demos/style.css">

  </script>
@endsection


@section('asksection')
{!! Html::style('frontend-style/css/group.css') !!}
        
        <div class="col-md-8 col-md-offset-2">
            {{ Form::open(['url' =>'/search-group', 'method' => 'POST']) }}
            <input type="text" name="search_group" id="search_group" style="height: 40px;width: 80%" 
            >
      
    <input type="hidden" name="id" id="id">
    <input type="submit" value="Search Group" class="btn btn-success" style="height: 37px;
margin-top: -3px;">
   
{{ Form::close() }}

@if(!empty($search_result))
<div class="text-center">
    <h3> {{ $search_result }} </h3>
 </div>
@endif
        </div>




@endsection    

@section('script')

  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
 
 $('input:text').bind({

 });
    $( "#search_group" ).autocomplete({
      minLength:1,
      autoFocus:true,
      source: "{{ URL('search-group') }}",
      select: function(event, ui) {
        $('#id').val(ui.item.id);
        $('#search_group').val(ui.item.value);
}
    });
  });
  </script>
@endsection