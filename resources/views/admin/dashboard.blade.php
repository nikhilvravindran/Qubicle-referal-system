@extends('admin.adminmaster')

@section('content')

<section class="col-12 col-md-12 col-xl-8 col-sm-8">
<table border='1' class="category-table">

   <tr>
      <th>User</th>
      <th>Referel Code</th>
      <th>Parent Referal Code</th>
      <th>Points</th>
   </tr>
   @foreach($users as $user)
   <tr>


    <td>{{$user->name}}</td>
    <td>{{$user->referal_code}}</td>
    <td>{{$user->parent_referal_code ? $user->parent_referal_code : 'NULL'}}</td>
    <td>{{$user->points ? $user->points : 0}}</td>

   </tr>
   @endforeach
</table>

</section>



@endsection