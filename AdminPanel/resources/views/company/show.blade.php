@extends('layouts.app')

@section('title', 'Company Information')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            
            <div class="panel panel-default">
            	<div class="panle-heading" style="padding-left: 20px"><h4>Companies</h4>
            	</div>
                <hr>
            	<div class="panle-body" style="padding-left: 20px">
                    <a class="btn btn-success btn-md" href="{{route('company.create')}}">Create new company</a>

                    <br> <br>

                    <table class="table table-bordered">
                        <thead>
                          <tr>
                              <td colspan="10">Companies List</td>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>CMMI</th>
                            <th>Branches</th>
                            <th>Address</th>
                            <th>Website</th>
                            <th>Logo</th>
                            <th>Type</th>
                            <th>License</th>
                            <th></th>
                          </tr>
                        @foreach($companies as $company)
                          <tr>
                            <td>{{$company->name}}</td>
                            <td>{{$company->email}}</td>
                            <td>{{$company->cmmi}}</td>
                            <td>@foreach($company->branches as $branch)
                                {{ $branch }} <br>
                                @endforeach
                            </td>
                            <td>{!! $company->address !!}</td>
                            <td>{{$company->website}}</td>
                            <td>{{$company->logo}}</td>
                            <td>{{$company->type}}</td>
                            <td>{{$company->license}}</td>
                            <td> <a class="btn btn-default btn-sm">Edit</a> <br>
                                <a class="btn btn-danger btn-sm">Delete</a>
                            </td>
                          </tr>
                        @endforeach
                        </tbody>
                      </table>
            	</div>
            </div>
        </div>
    </div>
</div>
@endsection