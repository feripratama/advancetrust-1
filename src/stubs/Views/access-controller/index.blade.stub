@extends('layouts/default') 
{{-- Page title --}} 
@section('title') 
{{ $title }} 
@stop {{-- local styles --}} 
@section('header_styles') 
@stop 
{{-- Page Header--}} 
@section('page-header')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>{{ $title }}</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{url('index')}}">
                <i class="fa fa-fw fa-home"></i> Dashboard
            </a>
        </li>
        <li class="active">
            Access contrller
        </li>
    </ol>
</section>
@stop {{-- Page content --}} 

@section('content') 

<div>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul style="padding:0;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if(session()->has('message'))
    <div class="alert alert-success">
        <ul style="padding:0;">
            <li>{{ session()->get('message') }}</li>
        </ul>
    </div>
@endif
</div>   

<div class="row">
    <div class="col-lg-12">
        
    </div>
</div>
<br><br>
<div class="row">  	
	{!! Form::open(['route' => 'accessControlIndex','method' => 'GET','class' => 'form-horizontal']) !!} 
        <div class="col-lg-12">
		    <div class="input-group">
		      	<input type="text" name="search" class="form-control" placeholder="Search for..." value="{{ Request::get('search') }}">
		      	<span class="input-group-btn">
		        <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
		      	</span>
		    </div>
		</div>
	{!! Form::close() !!}
	<br>
	<br>
    <div class="col-lg-12">    	
        <div class="panel ">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="ti-list"></i> Route List
                </h3>
                <span class="pull-right">
                    <i class="fa fa-fw ti-angle-up clickable"></i>
                </span>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table id="mytable" class="table table-bordred table-striped">
                        <thead>
                            <tr>
                                <th>Route name</th>
                                <th>Url</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($routes as $key => $route)
	                            @if(!empty($route['name']))
					            	<tr>
		                                <td>
											<a href="{{ route('accessControlShow',$key) }}">{{ $route['name'] }}</a>

		                            	</td>
		                                <td>{{ $route['url'] }}</td>
		                            </tr>
					            @endif                            
                            @empty
                                <tr>
                                    <td colspan='2' align="center"><b>belum ada data</b></td>
                                </tr>
                            @endforelse                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{ $routes->links() }}
    </div>
</div>

@stop {{-- local scripts --}} 


@section('footer_scripts') @stop


