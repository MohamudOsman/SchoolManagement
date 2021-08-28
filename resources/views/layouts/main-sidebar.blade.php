

        <!-- Left Sidebar start-->
        <div class="col-md-3  pb-5 pt-3 border-right" style='min-height: 100%;background: linear-gradient(to right, #343A40 10% ,#6C757D 100%); '>
            <div class="scrollbar side-menu-bg" >
         <ul class="nav navbar-nav side-menu" id="sidebarnav">
        <li class="nav-item h2 text-center text-white mt-3 mb-5 border-bottom pb-3 ">

            Admin <i class='fa fa-wrench'></i>
        </li>

        <li class="nav-item  pt-2">

          <a type="button" href="{{route('Levels.index')}}" class="btn btn-primary btn-block ">
            Levels
        </a>

        </li>


        <li class="nav-item pt-2">

          <a type="button" href="{{route('Class.index')}}" class="btn btn-primary btn-block ">
            Class <i class='fa fa-chalkboard-teacher'></i>
        </a>

        </li>

           <li class="nav-item  pt-2">

          <a type="button" href="{{route('Section.index')}}" class="btn btn-primary btn-block ">
            Section
        </a>

        </li>


        <li class="nav-item pt-2">
     <a type="button" href="{{route('Subject.index')}}" class="btn btn-primary btn-block ">
         Subject
         </a>
        </li>


        <li class="nav-item  pt-2">
     <a type="button" href="{{route('Session.index')}}" class="btn btn-primary btn-block">
         schedules <i class='fa fa-reply-all'></i>
         </a>
        </li>


        <li class="nav-item pt-2">
          <div class="dropdown">
            <button type="button" class="btn btn-primary btn-block  dropdown-toggle " data-toggle="dropdown">
            Staff
            </button>
            <div class="dropdown-menu">
                   <a class="dropdown-item" href="{{route('Staff.index')}} " style="color:black">view staffs record  <i class="fa fa-eye ml-2"></i> </a>


            </div>
          </div>
        </li>







    <li class="nav-item border-bottom pb-2 pt-2">
        <li class="nav-item  pb-2 pt-2">
        <li class="nav-item pt-2">
          <div class="dropdown">
            <button type="button" class="btn btn-primary btn-block  dropdown-toggle " data-toggle="dropdown">
            Student
            </button>
            <div class="dropdown-menu">
                   <a class="dropdown-item"  href="{{route('Student.index')}}"  style="color:black">view students record<i class="fa fa-eye ml-2"></i> </a>
            </div>
          </div>
        </li>

        <li class="nav-item  pb-2 pt-2">
          <div class="dropdown">
            <button type="button" class="btn btn-primary btn-block dropdown-toggle " data-toggle="dropdown">
            Staff
            </button>
            <div class="dropdown-menu">
                   <a class="dropdown-item" href="{{route('Staff.index')}} " style="color:black">view staffs record  <i class="fa fa-user-plus ml-2"></i> </a>







        <li class="nav-item  pb-2 pt-2">
           <a type="button" href="{{route('Attendance.index')}}" class="btn btn-primary btn-block  "> Attendance </a>
              </li>


        <li class="nav-item  pb-2 pt-2">
        <a type="button" href="{{route('Exam.index')}}" class="btn btn-primary btn-block  ">Exams </a>
        </li>


























        <li class="nav-item  pt-2">



        <a type="button" href="{{route('Exam.index')}}" class="btn btn-primary btn-block  ">Exams <i class='fa fa-newspaper'></i> </a>
        </li>


        <li class="nav-item   pt-2">

          <a type="button" href="{{route('Message.index')}}" class="btn btn-primary btn-block ">
            Message <i class='fa fa-bell'></i>
        </a>

        </li>


        <li class="nav-item btn-block mb-4 mt-2 pt-1 border-top">
            <a class="nav-link btn btn-danger btn-lg" href="#">Log Out <i class="fa fa-sign-out-alt"></i> </a>
        </li>


      </ul>
        </div>
    </div>

<style>
  ::-webkit-scrollbar{
    width: 4px;

  }
  ::-webkit-scrollbar-track{
    background: white;


  }
  ::-webkit-scrollbar-thumb{
    background: linear-gradient(to bottom, rgba(0, 0, 0, 0.698) 0% ,grey 100%);
    border-radius: 10px;

  }
  ::-webkit-scrollbar-thumb:hover{

  }
</style>


</html>
<script>
    $('a').click(function(){

        $('form').css("display", "none");
        var t=($($(this).attr('href')));
        $(t).css("display", "block");

    })
</script>
