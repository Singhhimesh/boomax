@extends('layouts.master')
@section('title',__('Backup Manager'))
@section('breadcum')
	<div class="breadcrumbbar">
	    <h4 class="page-title">{{ __('Database Backup') }}</h4>
	    <div class="breadcrumb-list">
	        <ol class="breadcrumb">
	          <li class="breadcrumb-item"><a href="{{url('/admin')}}" title="{{ __('Dashboard') }}">{{ __('Dashboard') }}</a></li>
	          <li class="breadcrumb-item active" aria-current="page">{{ __('Database Backup') }}</li>
	        </ol>
	    </div>
    </div>
@endsection
@section('maincontent')
<div class="contentbar"> 
    <div class="row">
		@if ($errors->any())
		<div class="alert alert-danger" role="alert">
			@foreach($errors->all() as $error)
			<p>{{ $error}}<button type="button" class="close" data-dismiss="alert" aria-label="Close" title="{{ __('Close') }}">
					<span aria-hidden="true" style="color:red;">&times;</span></button></p>
			@endforeach
		</div>
		@endif
		<div class="col-lg-12">
			<div class="card m-b-30">
				<div class="card-header">
					<h5 class="box-title">{{ __('Database Backup Manager') }}</h5>
				</div>
				<div class="card-body ml-2">
					<form action="{{route('admin.backup.path')}}" method="POST">
						@csrf

						<div class="col-md-6">
							<label for="">{{ __('MySQL Dump Path:')}}</label>
							<div class="input-group">
								<input name="DUMP_BINARY_PATH" required type="text" class="form-control"
									placeholder="/usr/bin/mysql/mysql-5.7.24-winx64/bin" value="{{env('BINARY_PATH') ? env('BINARY_PATH') : ''}}" aria-describedby="basic-addon2">
								<span class="input-group-addon" id="basic-addon2">
									<button type="submit" class="btn btn-primary" title="{{ __('Save!')}}">{{ __('Save!')}}</button>
								</span>
							</div>
						</div>
						<div class="col-md-12">
							<br>
							<div class="card bg-primary-rgba m-b-30">
								<div class="card-body">
									<div class="row align-items-center">
										<div class="text-primary process-fonts"><i class="fa fa-primary-circle"></i>
											{{ __('Important Note for MySQL Dump Path :') }}

											<ul class="process-font">
												<li>
													{{ __('Usually in all hosting dump path for MYSQL is /usr/bin')}}
												</li>

												<li>
													{{ __('If that path not work than contact your hosting provider with
													subject "What is my
													MYSQL DUMP Binary path ?"')}}'
												</li>
												<li>
													{{ __('Enter the path without')}} <b> {{ __('mysqldump')}}</b>{{ __(' in path')}}
												</li>
											</ul>


										</div>
									</div>
								</div>
							</div>
						</div>

					</form>
					<div class="card-body">
						<div class="row">
							<div class="col-md-12 p-1 mb-2 bg-danger text-white rounded">
								<i class="fa fa-info-circle"></i> {{ __('Note:')}}
								<ul>
									<li>
										{{ __('It will generate only database backup of your site.') }}
									</li>

									<li>
										<b>{{ __('Download URL is valid only for 1 minute.') }}</b>
									</li>

									<li>
										{{ __('Make sure')}} <b> {{ __('mysql dump is enabled on your server') }} </b> {{ __(' for database backup and
										before run
										this or
										run only database backup command make sure you save the mysql dump path in')}}
										<b> {{ __('config/database.php')}}</b>.
									</li>
								</ul>
							</div>
						</div>

						<div class="col-md-6">
							<br>
							<a @if(env('BINARY_PATH') != '' ) href="{{ url('admin/backups/process?type=onlydb') }}"
								@else href="#" disabled @endif class="btn btn-md btn-primary-rgba" title="Generate database backup">
								<i class="fa fa-refresh"></i> {{ __('Generate database backup') }}
							</a>
						</div>

					</div>
					<div class="row">
						<div class="text-center col-md-8">
							{{-- {!! $html !!} --}}
						</div>

						<div class="col-md-4">
							<div class="well">
								<p class="text-success"> <b>{{ __('Download the latest backup')}}</b> </p>

								@php

								$dir17 = storage_path() . '/app/'.config('app.name');
								@endphp

								<ul>

									@foreach (array_reverse(glob("$dir17/*")) as $key=> $file)

									@if($loop->first)
									<li><a href="{{ URL::temporarySignedRoute('admin.backup.download', now()->addMinutes(1), ['filename' => basename($file)]) }}"><b>{{ basename($file)  }}
												(Latest)</b></a></li>
									@else
									<li><a href="{{ URL::temporarySignedRoute('admin.backup.download', now()->addMinutes(1), ['filename' => basename($file)]) }}">{{ basename($file)  }}</a>
									</li>
									@endif

									@endforeach

								</ul>

							</div>
						</div>

					</div>

				</div>
			</div>
		</div>
</div>
@endsection 
@section('script')
   

@endsection