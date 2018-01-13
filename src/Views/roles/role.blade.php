@extends('advancetrust::layout.layout')

@section('content')
  <a href="/advancetrust">Home</a> | <a href="/advancetrust/role/create">Add new role</a>
  <table border='1'>
    <tr>
      <th>Role</th>
      <th>Description</th>
      <th>Display name</th>
      <th>Action</th>
    </tr>
    @foreach($roles as $role)            
      <tr>
        <td>{{ $role->name }}</td>
        <td>{{ $role->description }}</td>
        <td>{{ $role->display_name }}</td>
        <td>
          <a href="/advancetrust/role/{{ $role->id }}/show">View</a> |
          <a href="/advancetrust/role/{{ $role->id }}/edit">Edit</a> | 
          <a href="/advancetrust/role/{{ $role->id }}/add_permission">Add permission</a> |
          <a href="/advancetrust/role/{{ $role->id }}/delete">Delete</a>
        </td>        
      </tr>           
    @endforeach
  </table> 

@stop
