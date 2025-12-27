<table class="table-auto">
  <thead>
    <tr>
      <th>Name</th>
      <th>Merchandise Cut </th>
    </tr>
  </thead>
  <tbody>
    
    @foreach( $merchandise_types as $mt)
    <tr>
        <td>{{ $mt->merchandise_type_name }}</td>
        <td>{{ $mt->patong }}</td>
    </tr>
    @endforeach
  </tbody>
</table>