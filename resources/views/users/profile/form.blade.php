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
  .useraccount h5
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
  <div class="listpgWraper">
    <div class="container">
      <a class="btn btn-danger" href="{{ route('user.profile.index') }}"><i class="fa fa-chevron-circle-left"></i> Quay lại DS hồ sơ</a>
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <div class="useraccount">
            <div class="formpanel">

              <!-- Personal Information -->
              <h5>Thông tin chung <span class="bat-buoc">(bắt buộc)</span></h5>
              <div class="row">
                <div class="col-md-6">
                  <div class="formrow">
                    <label>Tiêu đề hồ sơ <span class="star">*</span></label>
                    <input type="text" name="ge_title" class="form-control" value="{{ old('ge_title', isset($userProfile->ge_title) ? $userProfile->ge_title : '') }}" placeholder="User Name">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="formrow">
                    <label>Trình độ cao nhất <span class="star">*</span></label>
                    <select class="form-control" name="ge_level">
                      <option value="{{ old('ge_level',isset($userProfile->ge_level) ? $userProfile->ge_level : 'Lao động phổ thông') }}">
                        {{ old('ge_level',isset($userProfile->ge_level) ? $userProfile->ge_level : 'Lao động phổ thông') }}
                      </option>
                      <option value="Đại học">Đại học</option>
                      <option value="Cao đẳng">Cao đẳng</option>
                      <option value="Trung cấp">Trung cấp</option>
                      <option value="Cao học">Cao học</option>
                      <option value="Trung học">Trung học</option>
                      <option value="Chứng chỉ">Chứng chỉ</option>
                      <option value="Lao động phổ thông">Lao động phổ thông</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="formrow">
                    <label>Số năm kinh nghiệm <span class="star">*</span></label>
                    <select class="form-control" name="ge_experience">
                      <option value="{{ old('ge_experience',isset($userProfile->ge_experience) ? $userProfile->ge_experience : 'Trên 5 Năm') }}">
                        {{ old('ge_experience',isset($userProfile->ge_experience) ? $userProfile->ge_experience : 'Trên 5 Năm') }}
                      </option>
                      <option value="Chưa có kinh nghiệm">Chưa có kinh nghiệm</option>
                      <option value="Dưới 1 Năm">Dưới 1 Năm</option>
                      <option value="1 Năm">1 Năm</option>
                      <option value="2 Năm">2 Năm</option>
                      <option value="3 Năm">3 Năm</option>
                      <option value="4 Năm">4 Năm</option>
                      <option value="5 Năm">5 Năm</option>
                      <option value="Trên 5 Năm">Trên 5 Năm</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="formrow">
                    <label>Cấp bậc hiện tại <span class="star">*</span></label>
                    <select class="form-control" name=" ge_position_current">
                      <option value="{{ old('ge_position_current',isset($userProfile->ge_position_current) ? $userProfile->ge_position_current : 'Quản lý cấp cao') }}">
                        {{ old('ge_position_current',isset($userProfile->ge_position_current) ? $userProfile->ge_position_current : 'Quản lý cấp cao') }}
                      </option>
                      <option value="Nhân viên">Nhân viên</option>
                      <option value="CTV">CTV</option>
                      <option value="Trưởng nhóm">Trưởng nhóm</option>
                      <option value="Chuyên gia">Chuyên gia</option>
                      <option value="Trưởng phó phòng">Trưởng phó phòng</option>
                      <option value="Quản lý cấp cao">Quản lý cấp cao</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="formrow">
                    <label>Cấp bậc mong muốn <span class="star">*</span></label>
                    <select class="form-control" name="ge_position">
                      <option value="{{ old('ge_position', isset($userProfile->ge_position) ? $userProfile->ge_position : 'Quản lý cấp cao') }}">
                        {{ old('ge_position', isset($userProfile->ge_position) ? $userProfile->ge_position : 'Quản lý cấp cao') }}
                      </option>
                      <option value="Nhân viên">Nhân viên</option>
                      <option value="CTV">CTV</option>
                      <option value="Trưởng nhóm">Trưởng nhóm</option>
                      <option value="Chuyên gia">Chuyên gia</option>
                      <option value="Trưởng phó phòng">Trưởng phó phòng</option>
                      <option value="Quản lý cấp cao">Quản lý cấp cao</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="formrow option-btn">
                    <label>Ngành nghề mong muốn <span class="star">*</span></label>
                    <select class="form-control" name="ge_profession">
                      {{-- <option value="{{ old('ge_profession',isset($userProfile->ge_profession) ? $userProfile->ge_profession : '1') }}">
                        {{ old('ge_profession',isset($userProfile->ge_profession) ? $userProfile->ge_profession : 'Nhân viên') }}
                      </option>
                      <option value="Bán hàng">Bán hàng</option>
                      <option value="Tài chính/Kế toán/Kiểm toán">Tài chính/Kế toán/Kiểm toán</option>
                      <option value="Hành chính/Thư ký/Trợ lý">Hành chính/Thư ký/Trợ lý</option>
                      <option value="Kinh doanh">Kinh doanh</option>
                      <option value="Thời vụ/Bán thời gian">Thời vụ/Bán thời gian</option>
                      <option value="6">Chăm sóc khách hàng</option>
                      <option value="7">Điện/Điện tử/Điện lạnh</option>
                      <option value="8">Giáo dục/Đào tạo/Thư viện</option>
                      <option value="9">Nhân sự</option>
                      <option value="10">Báo chí/Biên tập viên</option>
                      <option value="11">Bảo vệ/Vệ sĩ/An ninh</option>
                      <option value="12">Bất động sản</option>
                      <option value="13">Biên dịch/Phiên dịch</option>
                      <option value="14">Bưu chính viễn thông</option>
                      <option value="15">Cơ khí/Kĩ thuật ứng dụng</option>
                      <option value="16">Công nghệ thông tin</option>
                      <option value="17">Dầu khí/Địa chất</option>
                      <option value="18">Dệt may</option>
                      <option value="19">Du lịch/Nhà hàng/Khách sạn</option>
                      <option value="20">Dược/Hóa chất/Sinh hóa</option>
                      <option value="21">Giải trí/Vui chơi</option>
                      <option value="22">Giao thông/Vận tải/Thủy lợi/Cầu đường</option>
                      <option value="23">Giày da/Thuộc da</option>
                      <option value="24">Khác</option>
                      <option value="25">Kho vận/Vật tư/Thu mua</option>
                      <option value="26">Khu chế xuất/Khu công nghiệp</option>
                      <option value="27">Kiến trúc/Nội thất</option>
                      <option value="28">Làm đẹp/Thể lực/Spa</option>
                      <option value="29">Lao động phổ thông</option>
                      <option value="30">Luật/Pháp lý</option>
                      <option value="31">Môi trường/Xử lý chất thải</option>
                      <option value="32">Mỹ phẩm/Thời trang/Trang sức</option>
                      <option value="33">Ngân hàng/Chứng khoán/Đầu tư</option>
                      <option value="34">Nghệ thuật/Điện ảnh</option>
                      <option value="35">Ngoại ngữ</option>
                      <option value="36">Nông/Lâm/Ngư nghiệp</option>
                      <option value="37">PG/PB/Lễ tân</option>
                      <option value="38">Phát triển thị trường</option>
                      <option value="39">Phục vụ/Tạp vụ/Giúp việc</option>
                      <option value="40">Quan hệ đối ngoại</option>
                      <option value="41">Quản lý điều hành</option>
                      <option value="42">Quảng cáo/Marketing/PR</option>
                      <option value="43">Sản xuất/Vận hành sản xuất</option>
                      <option value="44">Sinh viên/Mới tốt nghiệp/Thực tập</option>
                      <option value="45">Tài xế/Lái xe/Giao nhận</option>
                      <option value="46">Thẩm định/Giám định/Quản lý chất lượng</option>
                      <option value="47">Thể dục/Thể thao</option>
                      <option value="48">Thiết kế/Mỹ thuật</option>
                      <option value="49">Thực phẩm/DV ăn uống</option>
                      <option value="50">Trang thiết bị công nghiệp</option>
                      <option value="51">Trang thiết bị gia dụng</option>
                      <option value="52">Trang thiết bị văn phòng</option>
                      <option value="53">Tư vấn bảo hiểm</option>
                      <option value="54">Xây dựng</option>
                      <option value="55">Xuất-Nhập khẩu/Ngoại thương</option>
                      <option value="56">Y tế</option> --}}
                      @if(isset($jobs))
                        @foreach($jobs as $job)
                          <option value="{{ $job->name }}" {{ old('ge_profession', isset($userProfile->ge_profession) ? $userProfile->ge_profession : '') == $job->name ? "selected='selected'" : "" }}>{{ $job->name }}
                          </option>
                        @endforeach
                      @endif
                    </select>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="formrow">
                    <label>Mong muốn mức lương tối thiểu <span class="star">(VNĐ) *</span></label>
                    <input type="number" name="ge_salary_min" class="form-control" value="{{ old('ge_salary_min', isset($userProfile->ge_salary_min) ? $userProfile->ge_salary_min : '0') }}" placeholder="999">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="formrow">
                    <label>Nơi làm việc mong muốn <span class="star">*</span></label>
                    <select class="form-control" name="ge_provinces">
                      @if(isset($provinces))
                        @foreach($provinces as $province)
                          <option value="{{ $province->name }}" {{ old('ge_provinces', isset($userProfile->ge_provinces) ? $userProfile->ge_provinces : '') == $province->name ? "selected='selected'" : "" }}>{{ $province->name }}
                          </option>
                        @endforeach
                      @endif
                    </select>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="formrow">
                    <label>Mục tiêu nghề nghiệp <span class="star">*</span></label>
                    <textarea name="ge_career" class="form-control">{{ (isset($userProfile->ge_career) ? $userProfile->ge_career : '<p>&bull; Mong muốn t&igrave;m được chỗ l&agrave;m ổn định l&acirc;u d&agrave;i để gắn b&oacute;.</p><p>&bull; Mong muốn t&igrave;m được chỗ l&agrave;m c&oacute; cơ hội thăng tiến tốt, c&oacute; nhiều cơ hội để ph&aacute;t triển.</p><p>&bull; Mong muốn t&igrave;m được nơi c&oacute; cơ hội cống hiến bản th&acirc;n tốt.</p><p>&bull; Mức lương ph&ugrave; hợp với năng lực v&agrave; kinh nghiệm bản th&acirc;n</p>') }}</textarea>
                  </div>
                </div>
              </div>
              <hr>

              <!-- Experience -->
              <h5>Kinh nghiệm làm việc <span class="bat-buoc">(không bắt buộc)</span></h5>
              <div class="row">
                <div class="col-md-6">
                  <div class="formrow">
                    <label>Công ty <span class="star">*</span></label>
                    <input type="text" name="ex_company_name" class="form-control" value="{{ old('ex_company_name', isset($userProfileExp->ex_company_name) ? $userProfileExp->ex_company_name : '') }}" placeholder="Company">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="formrow">
                    <label>Chức danh <span class="star">*</span></label>
                    <input type="text" name=" ex_position_exp" class="form-control" value="{{ old('ex_position_exp', isset($userProfileExp->ex_company_name) ? $userProfileExp->ex_company_name : '') }}" placeholder="Company Website">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="formrow">
                    <label>Từ tháng <span class="star">*</span></label>
                    <select class="form-control" name="ex_month_from">
                      <option value="{{ old('ex_month_from',isset($userProfileExp->ex_month_from) ? $userProfileExp->ex_month_from : '') }}">
                        {{ old('ex_month_from',isset($userProfileExp->ex_month_from) ? $userProfileExp->ex_month_from : 'Tháng') }}
                      </option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                      <option value="7">7</option>
                      <option value="8">8</option>
                      <option value="9">9</option>
                      <option value="10">10</option>
                      <option value="11">11</option>
                      <option value="12">12</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="formrow">
                    <label>Năm <span class="star">*</span></label>
                    <select class="form-control" name="ex_year_from">
                      <option value="{{ old('ex_year_from',isset($userProfileExp->ex_year_from) ? $userProfileExp->ex_year_from : '') }}">
                        {{ old('ex_year_from',isset($userProfileExp->ex_year_from) ? $userProfileExp->ex_year_from : 'Năm') }}
                      </option>
                      <option value="2020">2020</option>
                      <option value="2019">2019</option>
                      <option value="2018">2018</option>
                      <option value="2017">2017</option>
                      <option value="2016">2016</option>
                      <option value="2015">2015</option>
                      <option value="2014">2014</option>
                      <option value="2013">2013</option>
                      <option value="2012">2012</option>
                      <option value="2011">2011</option>
                      <option value="2010">2010</option>

                      <option value="2009">2009</option>
                      <option value="2008">2008</option>
                      <option value="2007">2007</option>
                      <option value="2006">2006</option>
                      <option value="2005">2005</option>
                      <option value="2004">2004</option>
                      <option value="2003">2003</option>
                      <option value="2002">2002</option>
                      <option value="2001">2001</option>
                      <option value="2000">2000</option>

                      <option value="1999">1999</option>
                      <option value="1998">1998</option>
                      <option value="1997">1997</option>
                      <option value="1996">1996</option>
                      <option value="1995">1995</option>
                      <option value="1994">1994</option>
                      <option value="1993">1993</option>
                      <option value="1992">1992</option>
                      <option value="1991">1991</option>
                      <option value="1990">1990</option>

                      <option value="1989">1989</option>
                      <option value="1988">1988</option>
                      <option value="1987">1987</option>
                      <option value="1986">1986</option>
                      <option value="1985">1985</option>
                      <option value="1984">1984</option>
                      <option value="1983">1983</option>
                      <option value="1982">1982</option>
                      <option value="1981">1981</option>
                      <option value="1980">1980</option>

                      <option value="1979">1979</option>
                      <option value="1978">1978</option>
                      <option value="1977">1977</option>
                      <option value="1976">1976</option>
                      <option value="1975">1975</option>
                      <option value="1974">1974</option>
                      <option value="1973">1973</option>
                      <option value="1972">1972</option>
                      <option value="1971">1971</option>
                      <option value="1970">1970</option>

                      <option value="1969">1969</option>
                      <option value="1968">1968</option>
                      <option value="1967">1967</option>
                      <option value="1966">1966</option>
                      <option value="1965">1965</option>
                      <option value="1964">1964</option>
                      <option value="1963">1963</option>
                      <option value="1962">1962</option>
                      <option value="1961">1961</option>
                      <option value="1960">1960</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="formrow">
                    <label>Đến tháng <span class="star">*</span></label>
                    <select class="form-control" name="ex_month_to">
                      <option value="{{ old('ex_month_to',isset($userProfileExp->ex_month_to) ? $userProfileExp->ex_month_to : '') }}">
                        {{ old('ex_month_to',isset($userProfileExp->ex_month_to) ? $userProfileExp->ex_month_to : 'Tháng') }}
                      </option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                      <option value="7">7</option>
                      <option value="8">8</option>
                      <option value="9">9</option>
                      <option value="10">10</option>
                      <option value="11">11</option>
                      <option value="12">12</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="formrow">
                    <label>Năm <span class="star">*</span></label>
                    <select class="form-control" name="ex_year_to">
                      <option value="{{ old('ex_year_to',isset($userProfileExp->ex_year_to) ? $userProfileExp->ex_year_to : '') }}">
                        {{ old('ex_year_to',isset($userProfileExp->ex_year_to) ? $userProfileExp->ex_year_to : 'Năm') }}
                      </option>
                      <option value="2020">2020</option>
                      <option value="2019">2019</option>
                      <option value="2018">2018</option>
                      <option value="2017">2017</option>
                      <option value="2016">2016</option>
                      <option value="2015">2015</option>
                      <option value="2014">2014</option>
                      <option value="2013">2013</option>
                      <option value="2012">2012</option>
                      <option value="2011">2011</option>
                      <option value="2010">2010</option>

                      <option value="2009">2009</option>
                      <option value="2008">2008</option>
                      <option value="2007">2007</option>
                      <option value="2006">2006</option>
                      <option value="2005">2005</option>
                      <option value="2004">2004</option>
                      <option value="2003">2003</option>
                      <option value="2002">2002</option>
                      <option value="2001">2001</option>
                      <option value="2000">2000</option>

                      <option value="1999">1999</option>
                      <option value="1998">1998</option>
                      <option value="1997">1997</option>
                      <option value="1996">1996</option>
                      <option value="1995">1995</option>
                      <option value="1994">1994</option>
                      <option value="1993">1993</option>
                      <option value="1992">1992</option>
                      <option value="1991">1991</option>
                      <option value="1990">1990</option>

                      <option value="1989">1989</option>
                      <option value="1988">1988</option>
                      <option value="1987">1987</option>
                      <option value="1986">1986</option>
                      <option value="1985">1985</option>
                      <option value="1984">1984</option>
                      <option value="1983">1983</option>
                      <option value="1982">1982</option>
                      <option value="1981">1981</option>
                      <option value="1980">1980</option>

                      <option value="1979">1979</option>
                      <option value="1978">1978</option>
                      <option value="1977">1977</option>
                      <option value="1976">1976</option>
                      <option value="1975">1975</option>
                      <option value="1974">1974</option>
                      <option value="1973">1973</option>
                      <option value="1972">1972</option>
                      <option value="1971">1971</option>
                      <option value="1970">1970</option>

                      <option value="1969">1969</option>
                      <option value="1968">1968</option>
                      <option value="1967">1967</option>
                      <option value="1966">1966</option>
                      <option value="1965">1965</option>
                      <option value="1964">1964</option>
                      <option value="1963">1963</option>
                      <option value="1962">1962</option>
                      <option value="1961">1961</option>
                      <option value="1960">1960</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="formrow">
                    <label>Mức lương</label>
                    <input type="number" name="ex_current_salary" class="form-control" value="{{ old('ex_current_salary', isset($userProfileExp->ex_current_salary) ? $userProfileExp->ex_current_salary : '') }}" placeholder="Location">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="formrow">
                    <label>Mô tả công việc <span class="star">*</span></label>
                    <textarea class="form-control" name="ex_description" placeholder="About Company">{{ old('ex_description', isset($userProfileExp->ex_description) ? $userProfileExp->ex_description : '') }}</textarea>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="formrow">
                    <label>Thành tích đạt được</label>
                    <textarea class="form-control" name="ex_achieve" placeholder="Thành tích đạt được">{{ old('ex_achieve', isset($userProfileExp->ex_achieve) ? $userProfileExp->ex_achieve : '') }}</textarea>
                  </div>
                </div>
              </div>
              {{-- <a href="">Add Other</a> --}}
              <hr>

              <!-- Học vấn -->
              <h5>Trình độ & bằng cấp <span class="bat-buoc">(không bắt buộc)</span></h5>
              1
              <div class="row">
                <div class="col-md-6">
                  <div class="formrow">
                    <label>Trình độ</label>
                    <select class="form-control" name="de_level_1">
                      <option value="{{ old('de_level_1',isset($degrees->de_level_1) ? $degrees->de_level_1 : '') }}">
                        {{ old('de_level_1',isset($degrees->de_level_1) ? $degrees->de_level_1 : 'Loại') }}
                      </option>
                      <option value="Đại học">Đại học</option>
                      <option value="Cao Đẳng">Cao Đẳng</option>
                      <option value="Trung cấp">Trung cấp</option>
                      <option value="Cao học">Cao học</option>
                      <option value="Trung học">Trung học</option>
                      <option value="Chứng chỉ">Chứng chỉ</option>
                      <option value="Lao động phổ thông">Lao động phổ thông</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="formrow">
                    <label>Đơn vị đào tạo</label>
                    <input type="text" name="de_school_1" class="form-control" value="{{ old('de_school_1', isset($degrees->de_school_1) ? $degrees->de_school_1 : '') }}" placeholder="Location">
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="formrow">
                    <label>Thời gian từ</label>
                    <select class="form-control" name="de_year_from_1">
                      <option value="{{ old('de_year_from_1',isset($degrees->de_year_from_1) ? $degrees->de_year_from_1 : '') }}">
                        {{ old('de_year_from_1',isset($degrees->de_year_from_1) ? $degrees->de_year_from_1 : 'Năm') }}
                      </option>
                      <option value="2020">2020</option>
                      <option value="2019">2019</option>
                      <option value="2018">2018</option>
                      <option value="2017">2017</option>
                      <option value="2016">2016</option>
                      <option value="2015">2015</option>
                      <option value="2014">2014</option>
                      <option value="2013">2013</option>
                      <option value="2012">2012</option>
                      <option value="2011">2011</option>
                      <option value="2010">2010</option>

                      <option value="2009">2009</option>
                      <option value="2008">2008</option>
                      <option value="2007">2007</option>
                      <option value="2006">2006</option>
                      <option value="2005">2005</option>
                      <option value="2004">2004</option>
                      <option value="2003">2003</option>
                      <option value="2002">2002</option>
                      <option value="2001">2001</option>
                      <option value="2000">2000</option>

                      <option value="1999">1999</option>
                      <option value="1998">1998</option>
                      <option value="1997">1997</option>
                      <option value="1996">1996</option>
                      <option value="1995">1995</option>
                      <option value="1994">1994</option>
                      <option value="1993">1993</option>
                      <option value="1992">1992</option>
                      <option value="1991">1991</option>
                      <option value="1990">1990</option>

                      <option value="1989">1989</option>
                      <option value="1988">1988</option>
                      <option value="1987">1987</option>
                      <option value="1986">1986</option>
                      <option value="1985">1985</option>
                      <option value="1984">1984</option>
                      <option value="1983">1983</option>
                      <option value="1982">1982</option>
                      <option value="1981">1981</option>
                      <option value="1980">1980</option>

                      <option value="1979">1979</option>
                      <option value="1978">1978</option>
                      <option value="1977">1977</option>
                      <option value="1976">1976</option>
                      <option value="1975">1975</option>
                      <option value="1974">1974</option>
                      <option value="1973">1973</option>
                      <option value="1972">1972</option>
                      <option value="1971">1971</option>
                      <option value="1970">1970</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="formrow">
                    <label>Đến</label>
                    <select class="form-control" name="de_year_to_1">
                      <option value="{{ old('de_year_to_1',isset($degrees->de_year_to_1) ? $degrees->de_year_to_1 : '') }}">
                        {{ old('de_year_to_1',isset($degrees->de_year_to_1) ? $degrees->de_year_to_1 : 'Năm') }}
                      </option>
                      <option value="2020">2020</option>
                      <option value="2019">2019</option>
                      <option value="2018">2018</option>
                      <option value="2017">2017</option>
                      <option value="2016">2016</option>
                      <option value="2015">2015</option>
                      <option value="2014">2014</option>
                      <option value="2013">2013</option>
                      <option value="2012">2012</option>
                      <option value="2011">2011</option>
                      <option value="2010">2010</option>

                      <option value="2009">2009</option>
                      <option value="2008">2008</option>
                      <option value="2007">2007</option>
                      <option value="2006">2006</option>
                      <option value="2005">2005</option>
                      <option value="2004">2004</option>
                      <option value="2003">2003</option>
                      <option value="2002">2002</option>
                      <option value="2001">2001</option>
                      <option value="2000">2000</option>

                      <option value="1999">1999</option>
                      <option value="1998">1998</option>
                      <option value="1997">1997</option>
                      <option value="1996">1996</option>
                      <option value="1995">1995</option>
                      <option value="1994">1994</option>
                      <option value="1993">1993</option>
                      <option value="1992">1992</option>
                      <option value="1991">1991</option>
                      <option value="1990">1990</option>

                      <option value="1989">1989</option>
                      <option value="1988">1988</option>
                      <option value="1987">1987</option>
                      <option value="1986">1986</option>
                      <option value="1985">1985</option>
                      <option value="1984">1984</option>
                      <option value="1983">1983</option>
                      <option value="1982">1982</option>
                      <option value="1981">1981</option>
                      <option value="1980">1980</option>

                      <option value="1979">1979</option>
                      <option value="1978">1978</option>
                      <option value="1977">1977</option>
                      <option value="1976">1976</option>
                      <option value="1975">1975</option>
                      <option value="1974">1974</option>
                      <option value="1973">1973</option>
                      <option value="1972">1972</option>
                      <option value="1971">1971</option>
                      <option value="1970">1970</option>
                    </select>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="formrow">
                    <label>Chuyên ngành</label>
                    <input type="text" name="de_diploma_1" class="form-control" value="{{ old('de_diploma_1', isset($degrees->de_diploma_1) ? $degrees->de_diploma_1 : '') }}" placeholder="Location">
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="formrow">
                    <label>Loại</label>
                    <select class="form-control" name="de_loai_tn_1">
                      <option value="{{ old('de_loai_tn_1',isset($degrees->de_loai_tn_1) ? $degrees->de_loai_tn_1 : '') }}">
                        {{ old('de_loai_tn_1',isset($degrees->de_loai_tn_1) ? $degrees->de_loai_tn_1 : 'Loại') }}
                      </option>
                      <option value="Giỏi">Giỏi</option>
                      <option value="Khá">Khá</option>
                      <option value="Trung bình">Trung bình</option>
                    </select>
                  </div>
                </div>
              </div>

              2
              <div class="row">
                <div class="col-md-6">
                  <div class="formrow">
                    <label>Trình độ</label>
                    <select class="form-control" name="de_level_2">
                      <option value="{{ old('de_level_2',isset($degrees->de_level_2) ? $degrees->de_level_2 : '') }}">
                        {{ old('de_level_2',isset($degrees->de_level_2) ? $degrees->de_level_2 : 'Loại') }}
                      </option>
                      <option value="Đại học">Đại học</option>
                      <option value="Cao Đẳng">Cao Đẳng</option>
                      <option value="Trung cấp">Trung cấp</option>
                      <option value="Cao học">Cao học</option>
                      <option value="Trung học">Trung học</option>
                      <option value="Chứng chỉ">Chứng chỉ</option>
                      <option value="Lao động phổ thông">Lao động phổ thông</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="formrow">
                    <label>Đơn vị đào tạo</label>
                    <input type="text" name="de_school_2" class="form-control" value="{{ old('de_school_2', isset($degrees->de_school_2) ? $degrees->de_school_2 : '') }}" placeholder="Location">
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="formrow">
                    <label>Thời gian từ</label>
                    <select class="form-control" name="de_year_from_2">
                      <option value="{{ old('de_year_from_2',isset($degrees->de_year_from_2) ? $degrees->de_year_from_2 : '') }}">
                        {{ old('de_year_from_2',isset($degrees->de_year_from_2) ? $degrees->de_year_from_2 : 'Năm') }}
                      </option>
                      <option value="2020">2020</option>
                      <option value="2019">2019</option>
                      <option value="2018">2018</option>
                      <option value="2017">2017</option>
                      <option value="2016">2016</option>
                      <option value="2015">2015</option>
                      <option value="2014">2014</option>
                      <option value="2013">2013</option>
                      <option value="2012">2012</option>
                      <option value="2011">2011</option>
                      <option value="2010">2010</option>

                      <option value="2009">2009</option>
                      <option value="2008">2008</option>
                      <option value="2007">2007</option>
                      <option value="2006">2006</option>
                      <option value="2005">2005</option>
                      <option value="2004">2004</option>
                      <option value="2003">2003</option>
                      <option value="2002">2002</option>
                      <option value="2001">2001</option>
                      <option value="2000">2000</option>

                      <option value="1999">1999</option>
                      <option value="1998">1998</option>
                      <option value="1997">1997</option>
                      <option value="1996">1996</option>
                      <option value="1995">1995</option>
                      <option value="1994">1994</option>
                      <option value="1993">1993</option>
                      <option value="1992">1992</option>
                      <option value="1991">1991</option>
                      <option value="1990">1990</option>

                      <option value="1989">1989</option>
                      <option value="1988">1988</option>
                      <option value="1987">1987</option>
                      <option value="1986">1986</option>
                      <option value="1985">1985</option>
                      <option value="1984">1984</option>
                      <option value="1983">1983</option>
                      <option value="1982">1982</option>
                      <option value="1981">1981</option>
                      <option value="1980">1980</option>

                      <option value="1979">1979</option>
                      <option value="1978">1978</option>
                      <option value="1977">1977</option>
                      <option value="1976">1976</option>
                      <option value="1975">1975</option>
                      <option value="1974">1974</option>
                      <option value="1973">1973</option>
                      <option value="1972">1972</option>
                      <option value="1971">1971</option>
                      <option value="1970">1970</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="formrow">
                    <label>Đến</label>
                    <select class="form-control" name="de_year_to_2">
                      <option value="{{ old('de_year_to_2',isset($degrees->de_year_to_2) ? $degrees->de_year_to_2 : '') }}">
                        {{ old('de_year_to_2',isset($degrees->de_year_to_2) ? $degrees->de_year_to_2 : 'Năm') }}
                      </option>
                      <option value="2020">2020</option>
                      <option value="2019">2019</option>
                      <option value="2018">2018</option>
                      <option value="2017">2017</option>
                      <option value="2016">2016</option>
                      <option value="2015">2015</option>
                      <option value="2014">2014</option>
                      <option value="2013">2013</option>
                      <option value="2012">2012</option>
                      <option value="2011">2011</option>
                      <option value="2010">2010</option>

                      <option value="2009">2009</option>
                      <option value="2008">2008</option>
                      <option value="2007">2007</option>
                      <option value="2006">2006</option>
                      <option value="2005">2005</option>
                      <option value="2004">2004</option>
                      <option value="2003">2003</option>
                      <option value="2002">2002</option>
                      <option value="2001">2001</option>
                      <option value="2000">2000</option>

                      <option value="1999">1999</option>
                      <option value="1998">1998</option>
                      <option value="1997">1997</option>
                      <option value="1996">1996</option>
                      <option value="1995">1995</option>
                      <option value="1994">1994</option>
                      <option value="1993">1993</option>
                      <option value="1992">1992</option>
                      <option value="1991">1991</option>
                      <option value="1990">1990</option>

                      <option value="1989">1989</option>
                      <option value="1988">1988</option>
                      <option value="1987">1987</option>
                      <option value="1986">1986</option>
                      <option value="1985">1985</option>
                      <option value="1984">1984</option>
                      <option value="1983">1983</option>
                      <option value="1982">1982</option>
                      <option value="1981">1981</option>
                      <option value="1980">1980</option>

                      <option value="1979">1979</option>
                      <option value="1978">1978</option>
                      <option value="1977">1977</option>
                      <option value="1976">1976</option>
                      <option value="1975">1975</option>
                      <option value="1974">1974</option>
                      <option value="1973">1973</option>
                      <option value="1972">1972</option>
                      <option value="1971">1971</option>
                      <option value="1970">1970</option>
                    </select>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="formrow">
                    <label>Chuyên ngành</label>
                    <input type="text" name="de_diploma_2" class="form-control" value="{{ old('de_diploma_2', isset($degrees->de_diploma_2) ? $degrees->de_diploma_2 : '') }}" placeholder="Location">
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="formrow">
                    <label>Loại</label>
                    <select class="form-control" name="de_loai_tn_2">
                      <option value="{{ old('de_loai_tn_2',isset($degrees->de_loai_tn_2) ? $degrees->de_loai_tn_2 : '') }}">
                        {{ old('de_loai_tn_2',isset($degrees->de_loai_tn_2) ? $degrees->de_loai_tn_2 : 'Loại') }}
                      </option>
                      <option value="Giỏi">Giỏi</option>
                      <option value="Khá">Khá</option>
                      <option value="Trung bình">Trung bình</option>
                    </select>
                  </div>
                </div>
              </div>
              <hr>

              <!-- Education -->
              <h5>Ngoại ngữ & tin học <span class="bat-buoc">(không bắt buộc)</span></h5>
              <div class="row">
                <div class="col-md-6">
                  <div class="formrow">
                    <label>Ngoại ngữ</label>
                    <select class="form-control" name="la_language">
                      <option value="{{ old('la_language',isset($languages->la_language) ? $languages->la_language : '') }}">
                        {{ old('la_language',isset($languages->la_language) ? $languages->la_language : 'Chọn ngoại ngữ') }}
                      </option>
                      <option value="Tiếng Anh">Tiếng Anh</option>
                      <option value="Tiếng Pháp">Tiếng Pháp</option>
                      <option value="Tiếng Trung">Tiếng Trung</option>
                      <option value="Tiếng Nhật">Tiếng Nhật</option>
                      <option value="Tiếng Hàn">Tiếng Hàn</option>
                      <option value="Tiếng Nga">Tiếng Nga</option>
                      <option value="Tiếng Đức">Tiếng Đức</option>
                    </select>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="formrow">
                    <label>Trình độ</label>
                    <select class="form-control" name="la_language_level">
                      <option value="{{ old('la_language_level',isset($languages->la_language_level) ? $languages->la_language_level : '') }}">
                        {{ old('la_language_level',isset($languages->la_language_level) ? $languages->la_language_level : 'Chọn trình độ') }}
                      </option>
                      <option value="Sơ cấp">Sơ cấp</option>
                      <option value="Trung cấp">Trung cấp</option>
                      <option value="Cao cấp">Cao cấp</option>
                    </select>
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="formrow">
                    <label>Nghe</label>
                    <select class="form-control" name="la_listen">
                      <option value="{{ old('la_listen',isset($languages->la_listen) ? $languages->la_listen : '') }}">
                        {{ old('la_listen',isset($languages->la_listen) ? $languages->la_listen : 'Chọn') }}
                      </option>
                      <option value="Tốt">Tốt</option>
                      <option value="Khá">Khá</option>
                      <option value="Trung bình">Trung bình</option>
                      <option value="Kém">Kém</option>
                    </select>
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="formrow">
                    <label>Nói</label>
                    <select class="form-control" name="la_speak">
                      <option value="{{ old('la_speak',isset($languages->la_speak) ? $languages->la_speak : '') }}">
                        {{ old('la_speak',isset($languages->la_speak) ? $languages->la_speak : 'Chọn') }}
                      </option>
                      <option value="Tốt">Tốt</option>
                      <option value="Khá">Khá</option>
                      <option value="Trung bình">Trung bình</option>
                      <option value="Kém">Kém</option>
                    </select>
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="formrow">
                    <label>Đọc</label>
                    <select class="form-control" name="la_read">
                      <option value="{{ old('la_read',isset($languages->la_read) ? $languages->la_read : '') }}">
                        {{ old('la_read',isset($languages->la_read) ? $languages->la_read : 'Chọn') }}
                      </option>
                      <option value="Tốt">Tốt</option>
                      <option value="Khá">Khá</option>
                      <option value="Trung bình">Trung bình</option>
                      <option value="Kém">Kém</option>
                    </select>
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="formrow">
                    <label>Viết</label>
                    <select class="form-control" name="la_write">
                      <option value="{{ old('la_write',isset($languages->la_write) ? $languages->la_write : '') }}">
                        {{ old('la_write',isset($languages->la_write) ? $languages->la_write : 'Chọn') }}
                      </option>
                      <option value="Tốt">Tốt</option>
                      <option value="Khá">Khá</option>
                      <option value="Trung bình">Trung bình</option>
                      <option value="Kém">Kém</option>
                    </select>
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="formrow">
                    <label>Word</label>
                    <select class="form-control" name="la_word">
                      <option value="{{ old('la_word',isset($languages->la_word) ? $languages->la_word : '') }}">
                        {{ old('la_word',isset($languages->la_word) ? $languages->la_word : 'Chọn') }}
                      </option>
                      <option value="Tốt">Tốt</option>
                      <option value="Khá">Khá</option>
                      <option value="Trung bình">Trung bình</option>
                      <option value="Kém">Kém</option>
                    </select>
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="formrow">
                    <label>Powerpoint</label>
                    <select class="form-control" name="la_powerpoint">
                      <option value="{{ old('la_powerpoint',isset($languages->la_powerpoint) ? $languages->la_powerpoint : '') }}">
                        {{ old('la_powerpoint',isset($languages->la_powerpoint) ? $languages->la_powerpoint : 'Chọn') }}
                      </option>
                      <option value="Tốt">Tốt</option>
                      <option value="Khá">Khá</option>
                      <option value="Trung bình">Trung bình</option>
                      <option value="Kém">Kém</option>
                    </select>
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="formrow">
                    <label>Excel</label>
                    <select class="form-control" name="la_excel">
                      <option value="{{ old('la_excel',isset($languages->la_excel) ? $languages->la_excel : '') }}">
                        {{ old('la_excel',isset($languages->la_excel) ? $languages->la_excel : 'Chọn') }}
                      </option>
                      <option value="Tốt">Tốt</option>
                      <option value="Khá">Khá</option>
                      <option value="Trung bình">Trung bình</option>
                      <option value="Kém">Kém</option>
                    </select>
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="formrow">
                    <label>Outlook</label>
                    <select class="form-control" name="la_outlook">
                      <option value="{{ old('la_outlook',isset($languages->la_outlook) ? $languages->la_outlook : '') }}">
                        {{ old('la_outlook',isset($languages->la_outlook) ? $languages->la_outlook : 'Chọn') }}
                      </option>
                      <option value="Tốt">Tốt</option>
                      <option value="Khá">Khá</option>
                      <option value="Trung bình">Trung bình</option>
                      <option value="Kém">Kém</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="formrow">
                    <label>Các phần mềm khác</label>
                    <textarea class="form-control" name="la_other_skill" placeholder="About Degree"></textarea>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="formrow">
                    <label>Các thành tích học tập nổi bật khác</label>
                    <textarea class="form-control" name="la_special_achieve" placeholder="About Degree"></textarea>
                  </div>
                </div>
              </div>
              <hr>



              <!-- Kỹ năng -->
              <h5>Kỹ năng & sở trường <span class="bat-buoc">(không bắt buộc)</h5>
              <div class="row">

                <div class="col-md-4">
                  <div class="formrow">
                    <label>Kĩ năng 1</label>
                    <input type="text" class="form-control" name="sk_skill_1" placeholder="Skill 1" value="{{ old('sk_skill_1',isset($skills->sk_skill_1) ? $skills->sk_skill_1 : '') }}">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="formrow">
                    <label>% đạt được</label>
                    <select class="form-control" name="sk_percent_1">
                      <option value="{{ old('sk_percent_1',isset($skills->sk_percent_1) ? $skills->sk_percent_1 : '') }}">
                        {{ old('sk_percent_1',isset($skills->sk_percent_1) ? $skills->sk_percent_1 : 'Chọn') }} %
                      </option>
                      <option value="100">100 %</option>
                      <option value="90">90 %</option>
                      <option value="80">80 %</option>
                      <option value="70">70 %</option>
                      <option value="60">60 %</option>
                      <option value="50">50 %</option>
                      <option value="40">40 %</option>
                      <option value="30">30 %</option>
                      <option value="20">20 %</option>
                      <option value="10">10 %</option>
                      <option value="0">0 %</option>
                      <option value="">Không chọn</option>
                    </select>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="formrow">
                    <label>Kĩ năng 2</label>
                    <input type="text" class="form-control" name="sk_skill_2" placeholder="Skill 2" value="{{ old('sk_skill_2',isset($skills->sk_skill_2) ? $skills->sk_skill_2 : '') }}">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="formrow">
                    <label>% đạt được</label>
                    <select class="form-control" name="sk_percent_2">
                      <option value="{{ old('sk_percent_2',isset($skills->sk_percent_2) ? $skills->sk_percent_2 : '') }}">
                        {{ old('sk_percent_2',isset($skills->sk_percent_2) ? $skills->sk_percent_2 : 'Chọn') }} %
                      </option>
                      <option value="100">100 %</option>
                      <option value="90">90 %</option>
                      <option value="80">80 %</option>
                      <option value="70">70 %</option>
                      <option value="60">60 %</option>
                      <option value="50">50 %</option>
                      <option value="40">40 %</option>
                      <option value="30">30 %</option>
                      <option value="20">20 %</option>
                      <option value="10">10 %</option>
                      <option value="0">0 %</option>
                      <option value="">Không chọn</option>
                    </select>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="formrow">
                    <label>Kĩ năng 3</label>
                    <input type="text" class="form-control" name="sk_skill_3" placeholder="Skill 3" value="{{ old('sk_skill_3',isset($skills->sk_skill_3) ? $skills->sk_skill_3 : '') }}">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="formrow">
                    <label>% đạt được</label>
                    <select class="form-control" name="sk_percent_3">
                      <option value="{{ old('sk_percent_3',isset($skills->sk_percent_3) ? $skills->sk_percent_3 : '') }}">
                        {{ old('sk_percent_3',isset($skills->sk_percent_3) ? $skills->sk_percent_3 : 'Chọn') }} %
                      </option>
                      <option value="100">100 %</option>
                      <option value="90">90 %</option>
                      <option value="80">80 %</option>
                      <option value="70">70 %</option>
                      <option value="60">60 %</option>
                      <option value="50">50 %</option>
                      <option value="40">40 %</option>
                      <option value="30">30 %</option>
                      <option value="20">20 %</option>
                      <option value="10">10 %</option>
                      <option value="0">0 %</option>
                      <option value="">Không chọn</option>
                    </select>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="formrow">
                    <label>Kĩ năng 4</label>
                    <input type="text" class="form-control" name="sk_skill_4" placeholder="Skill 4" value="{{ old('sk_skill_4',isset($skills->sk_skill_4) ? $skills->sk_skill_4 : '') }}">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="formrow">
                    <label>% đạt được</label>
                    <select class="form-control" name="sk_percent_4">
                      <option value="{{ old('sk_percent_4',isset($skills->sk_percent_4) ? $skills->sk_percent_4 : '') }}">
                        {{ old('sk_percent_4',isset($skills->sk_percent_4) ? $skills->sk_percent_4 : 'Chọn') }} %
                      </option>
                      <option value="100">100 %</option>
                      <option value="90">90 %</option>
                      <option value="80">80 %</option>
                      <option value="70">70 %</option>
                      <option value="60">60 %</option>
                      <option value="50">50 %</option>
                      <option value="40">40 %</option>
                      <option value="30">30 %</option>
                      <option value="20">20 %</option>
                      <option value="10">10 %</option>
                      <option value="0">0 %</option>
                      <option value="">Không chọn</option>
                    </select>
                  </div>
                </div>


                <div class="col-md-12">
                  <div class="formrow">
                    <label>Sở thích</label>
                    <input type="text" class="form-control" name="sk_interesting" placeholder="Skill 4" value="{{ old('sk_interesting',isset($skills->sk_interesting) ? $skills->sk_interesting : '') }}">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="formrow">
                    <label>Kĩ năng đặc biệt/ Tài lẻ</label>
                    <input type="text" class="form-control" name="sk_speial_skill" placeholder="Skill 4" value="{{ old('sk_speial_skill',isset($skills->sk_speial_skill) ? $skills->sk_speial_skill : '') }}">
                  </div>
                </div>
              </div>
              <hr>

              <br>
              <input type="submit" name="submit" class="btn" value="Lưu hồ sơ">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>

@section('script')
  <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
  <script>
    CKEDITOR.replace('ge_career');
    CKEDITOR.replace('ex_description');
    CKEDITOR.replace('ex_achieve');
  </script>
@stop