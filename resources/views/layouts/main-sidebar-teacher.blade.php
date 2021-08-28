

        <!-- Left Sidebar start-->
        <div class="col-md-3  pb-5 pt-3 " style='min-height: 100%;background: linear-gradient(to right, #343A40 10% ,#6C757D 100%); '>
            <div class="scrollbar side-menu-bg" >
         <ul class="nav navbar-nav side-menu" id="sidebarnav">
        <li class="nav-item h2 text-center text-white mt-3 mb-5 border-bottom pb-3 ">
         Teacher
        </li>
emad addaafad



        <li class="nav-item  pb-2 pt-2">
        <a type="button" href="{{route('Session.index')}}" class="btn btn-primary btn-block">
         schedules
         </a>
        </li>




     <li class="nav-item  pb-2 pt-2">
     <a type="button" href="{{route('Attendance.index')}}" class="btn btn-primary btn-block">
        Student
         </a>
        </li>

        <li class="nav-item  pb-2 pt-2">
        <a type="button" href="{{route('homework.index')}}" class="btn btn-primary btn-block  ">homework </a>
        </li>

        <li class="nav-item  pb-2 pt-2">

          <a type="button" href="{{route('Message.index')}}" class="btn btn-primary btn-block  ">
            Message
        </a>

        </li>


        <li class="nav-item border-bottom pb-2 pt-2">

          <a class="nav-link btn btn-danger btn-lg" href="#">Log out  <i class="fa fa-sign-out-alt"></i> </a>

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
