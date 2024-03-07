@extends('layouts.dashborad')
@section('content')
<div class="hero">
   <div class="container mt-4">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Create Time</th>
            <th scope="col">Update Time</th>
          </tr>
        </thead>
        <tbody>
          {{-- <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
          </tr>
          <tr>
            <th scope="row">3</th>
            <td>Larry</td>
            <td>the Bird</td>
            <td>@twitter</td>
          </tr> --}}
          @foreach ($times as $list)
          <tr>
            <th scope="row">{{ $list->id }}</th>
            <td>{{ $list->created_at }}</td>
            <td>{{ $list->updated_at }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
   </div>
</div>
@endsection
