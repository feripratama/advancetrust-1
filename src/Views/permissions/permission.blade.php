@extends('advancetrust::layout.layout')

@section('content')
  <a href="/advancetrust">Home</a> | <a href="/advancetrust/permission/create">Add new permission</a>
  <table border='1'>
    <tr>
      <th>Name</th>
      <th>Description</th>
      <th>Display name</th>
      <th>Action</th>
    </tr>
    @foreach($permissions as $permission)            
      <tr>
        <td>{{ $permission->name }}</td>
        <td>{{ $permission->description }}</td>
        <td>{{ $permission->display_name }}</td>
        <td>
          <a href="/advancetrust/permission/{{ $permission->id }}/show">View</a> |
          <a href="/advancetrust/permission/{{ $permission->id }}/edit">Edit</a> | 
          <a href="/advancetrust/permission/{{ $permission->id }}/delete">Delete</a>
        </td>        
      </tr>           
    @endforeach
  </table> 

@stop
