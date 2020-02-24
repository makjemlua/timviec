<?php
$tomorrow = mktime(0, 0, 0, date("m"), date("d") + 1, date("Y"));
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
                <div class="col-md-6">
                  <div class="formrow">
                    <label>Tiêu đề<span class="star">*</span></label>
                    <input type="text" name="pr_title" class="form-control" value="{{ old('pr_title', isset($employerProfile->pr_title) ? $employerProfile->pr_title : '') }}" placeholder="User Name">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="formrow">
                    <label>Số lượng <span class="star">*</span></label>
                    <input type="number" name="pr_quantity" class="form-control" value="{{ old('pr_quantity', isset($employerProfile->pr_quantity) ? $employerProfile->pr_quantity : '') }}" placeholder="User Name">
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
                    <textarea name="pr_description" class="form-control">{{ old('pr_description', isset($employerProfile->pr_description) ? $employerProfile->pr_description : '') }}</textarea>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="formrow">
                    <label>Yêu cầu công việc <span class="star">*</span></label>
                    <textarea name="pr_skill" class="form-control">{{ old('pr_skill', isset($employerProfile->pr_skill) ? $employerProfile->pr_skill : '') }}</textarea>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="formrow">
                    <label>Tính chất công việc <span class="star">*</span></label>
                    <select class="form-control" name="pr_attribute">
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
                    <select class="form-control" name="pr_level">
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
                    <select class="form-control" name="pr_experience">
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
                    <select class="form-control" name="pr_salary">
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
                    <select class="form-control" name="pr_work_time">
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
                    <select class="form-control" name="pr_probation_time">
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
                    <textarea name="pr_benefit" class="form-control">{{ old('pr_benefit', isset($employerProfile->pr_benefit) ? $employerProfile->pr_benefit : '') }}</textarea>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="formrow">
                    <label>Ngành hiển thị chính <span class="star">*</span></label>
                    <select class="form-control" name="pr_career">
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
                    <select class="form-control" name="pr_career_2">
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
                    <select class="form-control" name="pr_provinces">
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
						        <input type="date" name="pr_expired_at" id="datePicker" class="form-control" value="{{  date('Y-m-d', $tomorrow) }}" placeholder="User Name">
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
@stop