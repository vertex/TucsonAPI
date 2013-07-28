@extends('template')

@section('content')

  <h2>{{ studly_case($collection) }}</h2>
  <div id="map">

    <div id="map_canvas" style="height: 300px; width: 100%;"></div>
  </div>
  <div id="data">
  </div>
  <ul class="pagination">
    <li><a href="#">&laquo;</a></li>
    <li><a href="#">1</a></li>
    <li><a href="#">2</a></li>
    <li><a href="#">3</a></li>
    <li><a href="#">4</a></li>
    <li><a href="#">5</a></li>
    <li><a href="#">&raquo;</a></li>
  </ul>
  <script>

    $(function() {
      $('#map').hide();
      $.post(null,{},function(data, textStatus, jqXHR)
        {
          for(x in data)
          {
            $table = $('<table id="data" class="table table-striped table-bordered">');

            if(data[x]['lat'])
            {
              $('#map:hidden').show();

            }

            for(key in data[x])
            {
              var $row = $('<tr></td>');
              $head = $('<td class="col-lg-6"><strong>' + key + '</strong></td>').appendTo($row);
              $value = $('<td class="col-lg-6">' + data[x][key] + '</td>').appendTo($row);
              $table.append($row);
            }
            $table.appendTo('#data');
          }
        },'json');
    });
  </script>
@stop