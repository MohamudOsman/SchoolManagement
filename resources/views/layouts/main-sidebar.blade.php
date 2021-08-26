<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg" >
         <ul class="nav navbar-nav side-menu" id="sidebarnav">
        <li class="nav-item h2 text-center text-white mt-3 mb-5 border-bottom pb-3 ">

            Admin
        </li>

        <li class="nav-item border-bottom pb-2 pt-2">

          <a type="button" href="{{route('Levels.index')}}" class="btn btn-primary btn-block ">
            Levels
        </a>

        </li>


        <li class="nav-item border-bottom pb-2 pt-2">

          <a type="button" href="{{route('Class.index')}}" class="btn btn-primary btn-block ">
            Class
        </a>

        </li>

           <li class="nav-item border-bottom pb-2 pt-2">

          <a type="button" href="{{route('Section.index')}}" class="btn btn-primary btn-block ">
            Section
        </a>

        </li>


        <li class="nav-item border-bottom pb-2 pt-2">
     <a type="button" href="{{route('Subject.index')}}" class="btn btn-primary btn-block">
         Subject
         </a>
        </li>


        <li class="nav-item border-bottom pb-2 pt-2">
     <a type="button" href="{{route('Session.index')}}" class="btn btn-primary btn-block">
         schedules
         </a>
        </li>

        <li class="nav-item border-bottom pb-2 pt-2">
     <a type="button" href="{{route('Teacher.index')}}" class="btn btn-primary btn-block">
         Teacher
         </a>
        </li>
    <!-- <li class="nav-item border-bottom pb-2 pt-2">
          <div class="dropdown">
            <button type="button" class="btn btn-primary btn-block dropdown-toggle" data-toggle="dropdown">
             Teacher
            </button>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="{{route('Teacher.index')}} " style="color:black">view teachers record  <i class="fa fa-user-plus ml-2"></i> </a>
            <a class="dropdown-item" href="{{url('assigning')}}" style="color:black">assigning  teachers to classes  <i class="fa fa-user-plus ml-2"></i> </a>
            </div>
          </div>
        </li>-->


        <li class="nav-item border-bottom pb-2 pt-2">
          <div class="dropdown">
            <button type="button" class="btn btn-primary btn-block dropdown-toggle" data-toggle="dropdown">
            Staff
            </button>
            <div class="dropdown-menu">
                   <a class="dropdown-item" href="{{route('Staff.index')}} " style="color:black">view staffs record  <i class="fa fa-user-plus ml-2"></i> </a>
            </div>
          </div>
        </li>

        <li class="nav-item border-bottom pb-2 pt-2">
          <div class="dropdown">
            <button type="button" class="btn btn-primary btn-block dropdown-toggle" data-toggle="dropdown">
                Student
            </button>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="{{route('Student.index')}}" style="color:black">view students record<i class="fa fa-user-plus ml-2"></i> </a>
            </div>
          </div>
        </li>


        <li class="nav-item border-bottom pb-2 pt-2">

          <a type="button" href="{{route('Exam.index')}}" class="btn btn-primary btn-block ">
            Exams
        </a>

        </li>


        <li class="nav-item border-bottom pb-2 pt-2">

          <a type="button" href="{{route('Message.index')}}" class="btn btn-primary btn-block ">
            Message
        </a>

        </li>
      </ul>
        </div>
    </div>
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
