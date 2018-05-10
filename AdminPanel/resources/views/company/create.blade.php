@extends('layouts.app')

@section('title', 'Add Company Information')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            
            <div class="panel panel-default">
            	<div class="panle-heading" style="padding-left: 20px"><h2>Add Company Information</h2></div>
            	<div class="panle-body" style="padding: 20px">
            		
            		<form action="{{route('company.submit')}}" method="POST" enctype="multipart/form-data">

            			{{ csrf_field() }}

            			<div class="form-group">
						    <label for="name">Company Name</label>
						    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Company Name">
					  	</div>

						<div class="form-group">
						    <label for="email">Company Email</label>
						    <input type="email" class="form-control" id="email" name="email" placeholder="Enter Company Email">
					  	</div>
					  <div class="form-group">
					    <label for="cmmi">Select CMMI Level</label>
					    <select class="form-control" id="cmmi" name="cmmi">
					      <option value="1">1</option>
					      <option value="2">2</option>
					      <option value="3">3</option>
					      <option value="4">4</option>
					      <option value="5">5</option>
					    </select>
					  </div>
					  <div class="form-group">
					    <label for="branches">Select Branches</label>
					    <select multiple class="form-control" name="branches[]" id="branches">
					      <option value="Dhaka">Dhaka</option>
					      <option value="Chaitagong">Chaitagong</option>
					      <option value="Rajshahi">Rajshahi</option>
					      <option value="Sylhet">Sylhet</option>
					      <option value="Khulna">Khulna</option>
					      <option value="Mymensing">Mymensing</option>
					      <option value="Rangpur">Rangpur</option>
					      <option value="Cumilla">Cumilla</option>
					      <option value="Barishal">Barishal</option>
					    </select>
					  </div>
					  <div class="form-group">
					    <label for="address">Company Address</label>
					    <textarea class="form-control" id="address" name="address" rows="3"></textarea>
					  </div>
					  <div class="form-group">
					    <label for="logo">Company Logo</label>
					    <input type="file" class="form-control-file" id="logo" name="logo">
					  </div>
					  <fieldset class="form-group">
					    <legend>Company Type</legend>
					    <div class="form-check">
					      <label class="form-check-label">
					        <input type="radio" class="form-check-input" name="type" id="nonGovernment" value="nonGovernment" checked>
					        Non Government
					      </label>
					    </div>
					    <div class="form-check">
					      <label class="form-check-label">
					        <input type="radio" class="form-check-input" name="type" id="Government" value="Government">
					        Government
					      </label>
					    </div>
					    <div class="form-check">
					      <label class="form-check-label">
					        <input type="radio" class="form-check-input" name="type" id="semiGovernment" value="semiGovernment">
					        Semi Government
					      </label>
					    </div> 
					  </fieldset>
					  <br>
					  <div class="form-check">
					    <label class="form-check-label">
					      <input type="checkbox" class="form-check-input" name="Licensed">
					      Licensed Company
					    </label>
					  </div>
					  <br>
					  <button type="submit" class="btn btn-primary">Submit</button>
					</form>
            	</div>

            </div>
        </div>
    </div>
</div>
@endsection