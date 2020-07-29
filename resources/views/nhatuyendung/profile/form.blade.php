<?php
$tomorrow = mktime(0, 0, 0, date("m"), date("d") + 30, date("Y"));
?>
<style type="text/css">
  label
  {
    margin-bottom: 5px;
    font-weight: bold;
  }
  .star
  {
    color: red;
  }
  .useraccount h3
  {
    color: red;
  }
  span.bat-buoc
  {
    font-size: 14px;
    font-weight: initial;
  }
</style>
<form action="" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <div class="useraccount">
            <div class="formpanel">

              <!-- Personal Information -->
              <h3 style="text-align: center;">Đăng tin tuyển dụng</h3>
              <div class="row">
                {{-- <div class="col-md-12">
                  <div id="googleMap" style="width:auto;height:200px;"></div>
                </div> --}}
                <div class="col-md-12">
                  <div class="formrow">
                    <label>Nhập địa chỉ<span class="star">*</span></label>
                    <input type="text" name="autocomplete" id="autocomplete" class="form-control" value="{{ old('address', isset($map->address) ? $map->address : '24 Nguyễn Văn Bảo, Gò Vấp, Hồ Chí Minh, Việt Nam') }}" placeholder="Địa chỉ" required>
                    <input type="hidden" name="latitude" id="latitude" value="{{ old('latitude', isset($map->latitude) ? $map->latitude : '') }}" class="form-control">
                    <input type="hidden" name="longitude" id="longitude" value="{{ old('longitude', isset($map->longitude) ? $map->longitude : '') }}" class="form-control">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="formrow">
                    <label>Tiêu đề<span class="star">*</span></label>
                    <input type="text" name="pr_title" class="form-control" value="{{ old('pr_title', isset($employerProfile->pr_title) ? $employerProfile->pr_title : 'Tuyển dụng 1') }}" placeholder="User Name" required>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="formrow">
                    <label>Số lượng <span class="star">*</span></label>
                    <input type="number" name="pr_quantity" class="form-control" value="{{ old('pr_quantity', isset($employerProfile->pr_quantity) ? $employerProfile->pr_quantity : '1') }}" placeholder="User Name" required>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="formrow">
                    <label>Giới tính <span class="star">*</span></label>
                    <select class="form-control" name="pr_gender">
                      <option value="{{ old('pr_gender',isset($employerProfile->pr_gender) ? $employerProfile->pr_gender : 'Không yêu cầu') }}">
                        {{ old('pr_gender',isset($employerProfile->pr_gender) ? $employerProfile->pr_gender : 'Không yêu cầu') }}
                      </option>
                      <option value="Không yêu cầu">Không yêu cầu</option>
                      <option value="Nam">Nam</option>
                      <option value="Nữ">Nữ</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="formrow">
                    <label>Mô tả công việc <span class="star">*</span></label>
                    <textarea name="pr_description" class="form-control" required>{{ old('pr_description', isset($employerProfile->pr_description) ? $employerProfile->pr_description : '') }}</textarea>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="formrow">
                    <label>Yêu cầu công việc <span class="star">*</span></label>
                    <textarea name="pr_skill" class="form-control" required>{{ old('pr_skill', isset($employerProfile->pr_skill) ? $employerProfile->pr_skill : '') }}</textarea>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="formrow">
                    <label>Tính chất công việc <span class="star">*</span></label>
                    <select class="form-control" name="pr_attribute" required>
                      <option value="{{ old('pr_attribute',isset($employerProfile->pr_attribute) ? $employerProfile->pr_attribute : 'Giờ hành chính') }}">
                        {{ old('pr_attribute',isset($employerProfile->pr_attribute) ? $employerProfile->pr_attribute : 'Giờ hành chính') }}
                      </option>
                      <option value="Giờ hành chính">Giờ hành chính</option>
                      <option value="Việc làm thu nhập cao">Việc làm thu nhập cao</option>
                      <option value="Việc làm thêm/ Làm việc ngoài giờ">Việc làm thêm/ Làm việc ngoài giờ</option>
                      <option value="Thầu dự án/ Freelance/ Việc làm tự do">Thầu dự án/ Freelance/ Việc làm tự do</option>
                      <option value="Việc làm online">Việc làm online</option>
                      <option value="Kinh doanh mạng lưới">Kinh doanh mạng lưới</option>
                      <option value="Giúp việc gia đình">Giúp việc gia đình</option>
                      <option value="Hợp tác lao động/ nước ngoài">Hợp tác lao động/ nước ngoài</option>
                      <option value="Việc làm người khuyết tật">Việc làm người khuyết tật</option>
                      <option value="Việc làm theo ca/ Đổi ca">Việc làm theo ca/ Đổi ca</option>
                      <option value="Việc làm cho người trên 50 tuổi">Việc làm cho người trên 50 tuổi</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="formrow option-btn">
                    <label>Trình độ <span class="star">*</span></label>
                    <select class="form-control" name="pr_level" required>
                      <option value="{{ old('pr_level',isset($employerProfile->pr_level) ? $employerProfile->pr_level : 'Đại học') }}">
                        {{ old('pr_level',isset($employerProfile->pr_level) ? $employerProfile->pr_level : 'Đại học') }}
                      </option>
                        <option value="Đại học">Đại học</option>
	                      <option value="Cao đẳng">Cao đẳng</option>
	                      <option value="Trung cấp">Trung cấp</option>
	                      <option value="Cao học">Cao học</option>
	                      <option value="Trung học">Trung học</option>
	                      <option value="Chứng chỉ">Chứng chỉ</option>
                        <option value="Lao động phổ thông">Lao động phổ thông</option>
                        <option value="Không yêu cầu">Không yêu cầu</option>
                    </select>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="formrow">
                    <label>Kinh nghiệm <span class="star">*</span></label>
                    <select class="form-control" name="pr_experience" required>
                      <option value="{{ old('pr_experience',isset($employerProfile->pr_experience) ? $employerProfile->pr_experience : 'Chưa có kinh nghiệm') }}">
                        {{ old('pr_experience',isset($employerProfile->pr_experience) ? $employerProfile->pr_experience : 'Chưa có kinh nghiệm') }}
                      </option>
                      <option value="Chưa có kinh nghiệm">Chưa có kinh nghiệm</option>
                      <option value="Dưới 1 năm">Dưới 1 năm</option>
                      <option value="1 năm">1 năm</option>
                      <option value="2 năm">2 năm</option>
                      <option value="3 năm">3 năm</option>
                      <option value="4 năm">4 năm</option>
                      <option value="5 năm">5 năm</option>
                      <option value="Trên 5 năm">Trên 5 năm</option>
                      <option value="Không yêu cầu kinh nghiệm">Không yêu cầu kinh nghiệm</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="formrow option-btn">
                    <label>Mức lương <span class="star">*</span></label>
                    <select class="form-control" name="pr_salary" required>
                        <option value="{{ old('pr_salary',isset($employerProfile->pr_salary) ? $employerProfile->pr_salary : '15-20 triệu') }}">
                          {{ old('pr_salary',isset($employerProfile->pr_salary) ? $employerProfile->pr_salary : '15-20 triệu') }}
                        </option>
                        <option value="Dưới 3 triệu">Dưới 3 triệu</option>
	                      <option value="3-5 triệu">3-5 triệu</option>
	                      <option value="5-7 triệu">5-7 triệu</option>
	                      <option value="7-10 triệu">7-10 triệu</option>
	                      <option value="10-12 triệu">10-12 triệu</option>
	                      <option value="12-15 triệu">12-15 triệu</option>
                        <option value="15-20 triệu">15-20 triệu</option>
                        <option value="20-25 triệu">20-25 triệu</option>
                        <option value="25-30 triệu">25-30 triệu</option>
                        <option value="30-40 triệu">30-40 triệu</option>
                        <option value="40-50 triệu">40-50 triệu</option>
                        <option value="Trên 50 triệu">Trên 50 triệu</option>
                    </select>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="formrow">
                    <label>Hình thức làm việc <span class="star">*</span></label>
                    <select class="form-control" name="pr_work_time" required>
                      <option value="{{ old('pr_work_time',isset($employerProfile->pr_work_time) ? $employerProfile->pr_work_time : 'Nhân viên chính thức') }}">
                          {{ old('pr_work_time',isset($employerProfile->pr_work_time) ? $employerProfile->pr_work_time : 'Nhân viên chính thức') }}
                      </option>
                      <option value="Nhân viên chính thức">Nhân viên chính thức</option>
                      <option value="Nhân viên thời vụ">Nhân viên thời vụ</option>
                      <option value="Bán thời gian">Bán thời gian</option>
                      <option value="Làm việc ngoài giờ">Làm việc ngoài giờ</option>
                      <option value="Thực tập và dự án">Thực tập và dự án</option>
                      <option value="Quản lý cấp cao">Quản lý cấp cao</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="formrow option-btn">
                    <label>Thời gian thử việc <span class="star">*</span></label>
                    <select class="form-control" name="pr_probation_time" required>
                        <option value="{{ old('pr_probation_time',isset($employerProfile->pr_probation_time) ? $employerProfile->pr_probation_time : 'Nhận việc ngay') }}">
                            {{ old('pr_probation_time',isset($employerProfile->pr_probation_time) ? $employerProfile->pr_probation_time : 'Nhận việc ngay') }}
                        </option>
                        <option value="Nhận việc ngay">Nhận việc ngay</option>
	                      <option value="1 tháng">1 tháng</option>
	                      <option value="2 tháng">2 tháng</option>
	                      <option value="3 tháng">3 tháng</option>
	                      <option value="Trao đổi trực tiếp khi phỏng vấn">Trao đổi trực tiếp khi phỏng vấn</option>
	                      <option value="Quản lý cấp cao">Quản lý cấp cao</option>
                    </select>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="formrow">
                    <label>Quyền lợi <span class="star">*</span></label>
                    <textarea name="pr_benefit" class="form-control" required>{{ old('pr_benefit', isset($employerProfile->pr_benefit) ? $employerProfile->pr_benefit : '') }}</textarea>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="formrow">
                    <label>Ngành hiển thị chính <span class="star">*</span></label>
                    <select class="form-control" name="pr_career" required>
                      @if(isset($jobs))
                        @foreach($jobs as $job)
                          <option value="{{ $job->name }}" {{ old('pr_career', isset($employerProfile->pr_career) ? $employerProfile->pr_career : '') == $job->name ? "selected='selected'" : "" }}>{{ $job->name }}
                          </option>
                        @endforeach
                      @endif
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="formrow option-btn">
                    <label>Ngành hiển thị phụ <span class="star">*</span></label>
                    <select class="form-control" name="pr_career_2" required>
                        @if(isset($jobs))
                        @foreach($jobs as $job)
                          <option value="{{ $job->name }}" {{ old('pr_career_2', isset($employerProfile->pr_career_2) ? $employerProfile->pr_career_2 : '') == $job->name ? "selected='selected'" : "" }}>{{ $job->name }}
                          </option>
                        @endforeach
                      @endif
                    </select>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="formrow">
                    <label>Nơi làm việc <span class="star">*</span></label>
                    <select class="form-control" name="pr_provinces" required>
                      @if(isset($provinces))
                        @foreach($provinces as $province)
                          <option value="{{ $province->name }}" {{ old('pr_provinces', isset($employerProfile->pr_provinces) ? $employerProfile->pr_provinces : '') == $province->name ? "selected='selected'" : "" }}>{{ $province->name }}
                          </option>
                        @endforeach
                      @endif
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="formrow option-btn">
                    <label>Hết hạn <span class="star">*</span></label>
						        <input type="date" name="pr_expired_at" id="datePicker" class="form-control" value="{{  date('Y-m-d', $tomorrow) }}" placeholder="User Name" required>
                  </div>
                </div>
              </div>
              <hr>


              <br>
              <input type="submit" name="submit" class="btn" value="Lưu bài đăng">
            </div>
          </div>
        </div>
      </div>
    </div>
</form>
@section('script')
  <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
  <script>
    CKEDITOR.replace('pr_skill');
    CKEDITOR.replace('pr_description');
    CKEDITOR.replace('pr_benefit');
  </script>

<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
{{-- javascript code --}}
<script src="https://maps.google.com/maps/api/js?key=AIzaSyARuxTvO42oUK9Bj5j-fCGKPbvA-VsMIhY&libraries=places&callback=initAutocomplete" type="text/javascript"></script>

<script>
   $(document).ready(function() {
    $(window).keydown(function(event){
      if(event.keyCode == 13) {
        event.preventDefault();
        return false;
      }
    });
  });
</script>


<script>
  google.maps.event.addDomListener(window, 'load', initialize);


   function initialize() {

       var input = document.getElementById('autocomplete');
       var autocomplete = new google.maps.places.Autocomplete(input);
       autocomplete.addListener('place_changed', function() {
           var place = autocomplete.getPlace();
           $('#latitude').val(place.geometry['location'].lat());
           $('#longitude').val(place.geometry['location'].lng());

           var lat =place.geometry.location.lat();
            var lng = place.geometry.location.lng();
            var uluru = {lat: lat, lng: lng};
            var map = new google.maps.Map(
          document.getElementById('map'), {
            zoom: 15, center: uluru
          });
          var marker = new google.maps.Marker({
            position: uluru,
            map: map
          });
       });

       // map = new google.maps.Map(document.getElementById('googleMap'), {
       //    center: {lat: 10.8231, lng: 106.6297},
       //    zoom: 15
       //  });
   }

</script>


@stop