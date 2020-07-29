<form action="" method="POST" enctype="multipart/form-data">
	@csrf
	<div class="row">
		<div class="col-md-4 col-md-offset-2">
			<div class="form-group">
				<label for="name">Tên:</label>
				<input type="text" class="form-control" name="name" value="{{ old('name',isset($admin->name) ? $admin->name : '') }}" placeholder="Tên" required pattern=".{5,10}" title="5 tới 10 ký tự">
				@if ($errors->has('name'))
				<div class="error">{{ $errors->first('name') }}</div>
				@endif
			</div>
			@if(isset($admin->email))
			@else
			<div class="form-group">
				<label for="email">Email:</label>
				<input type="text" class="form-control" name="email" value="{{ old('email',isset($admin->email) ? $admin->email : '') }}" placeholder="Email"></input>
				@if ($errors->has('email'))
				<div class="error">{{ $errors->first('email') }}</div>
				@endif
			</div>
			@endif
			<div class="form-group">
				<label for="role">Role:</label>
				<div class="">
					<select class="form-control col-md-3" name="role">
	                  <option value="{{ old('role',isset($admin->role) ? $admin->role : '') }}">
	                    @if(isset($admin->role))
                 			@if($admin->role==2)
                				Admin
                			@elseif($admin->role==1)
                				Mod
                			@elseif($admin->role==0)
                				User
                			@endif
		            	@else
                    		--Chọn--
						@endif
	                  </option>
	                  <option value="2">Admin</option>
	                  <option value="1">Mod</option>
	                  <option value="0">User</option>
	                </select>
				</div>

				@if ($errors->has('role'))
				<div class="error">{{ $errors->first('role') }}</div>
				@endif
			</div>
			@if(isset($admin->email))
			@else
			<div class="text-dark col-md-12">
				Pass mặc định: 12345
			</div>
			@endif
			<div class="form-group col-md-12">
				<input type="hidden" name="active" value="0">
				<input type="checkbox" name="active" {{ isset($admin->active)&&($admin->active)==1 ? 'checked' : '' }} value="1"> <label>Hiển thị</label>
			</div>

			<button type="submit" class="btn btn-success">Lưu thông tin</button>

		</div>
	</div>
</form>