@extends('layouts.dashborad')
@section('content')
<div class="hero">
   <div class="container mt-4">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">email</th>
            <th scope="col">Job sent to queue</th>
            <th scope="col">Queue executed Time</th>
          </tr>
        </thead>
        <tbody>

          @foreach ($mails as $mail)
          <tr>
            <th scope="row">{{ $mail->id }}</th>
            <td>{{ $mail->email }}</td>
            <td>{{ $mail->sent_at }}</td>
            <td>{{ $mail->updated_at }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
   </div>
</div>
@endsection
