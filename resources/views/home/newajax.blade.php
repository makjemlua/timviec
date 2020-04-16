<!-- title start -->
        <div class="titleTop">
          <h3>Việc làm <span>mới</span></h3>
        </div>
        <!-- title end -->

        <!--Featured Job start-->
        <ul class="jobslist row">

          @foreach($profileNew as $new)

            <li class="col-md-6">
              <div class="jobint">
                <div class="row">
                  <div class="col-md-2 col-sm-2"><img src="{{ old('em_avatar',(isset($new->employer->em_avatar)) ? asset(pare_url_file($new->employer->em_avatar)) : asset('images/default.png') ) }}" alt="Job Name" width="60px" height="60px"></div>
                  <div class="col-md-7 col-sm-7">
                    <h4><a class="content-1" href="{{ route('employer.thongtin.profile', [$new->pr_slug, $new->id]) }}" title="{{ $new->pr_title }}">{{ $new->pr_title }}</a></h4>
                    <div class="company"><a href="{{ route('employer.thongtin.profile', [$new->pr_slug, $new->id]) }}">{{ $new->employer->em_company }}</a></div>
                    <div class="jobloc"><label class="partTime">{{ $new->pr_salary }}</label>   - <span>{{ $new->pr_provinces }}</span></div>
                  </div>
                </div>
              </div>
            </li>


          @endforeach

        </ul>
        <!--Featured Job end-->

        <!--button start-->

        <div class="viewallbtn">
          {!! $profileNew->render() !!}
        </div>
        <!--button end-->