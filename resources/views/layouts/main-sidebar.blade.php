<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg" >
         <ul class="nav navbar-nav side-menu" id="sidebarnav">
        <li class="nav-item h2 text-center text-white mt-3 mb-5 border-bottom pb-3 ">
            User Id
        </li>

        <li class="nav-item border-bottom pb-2">

          <a type="button" href="{{route('Levels.index')}}" class="btn btn-primary btn-block ">
            Levels
        </a>

        </li>


        <li class="nav-item border-bottom pb-2">

          <a type="button" href="{{route('Class.index')}}" class="btn btn-primary btn-block ">
            Class
        </a>

        </li>

           <li class="nav-item border-bottom pb-2">

          <a type="button" href="{{route('Section.index')}}" class="btn btn-primary btn-block ">
            Section
        </a>

        </li>


        <li class="nav-item border-bottom pb-2">
     <a type="button" href="{{route('Subject.index')}}" class="btn btn-primary btn-block">
         Subject
     </a>
        </li>

        <li class="nav-item border-bottom pb-2 pt-2">
          <div class="dropdown">
            <button type="button" class="btn btn-primary btn-block dropdown-toggle" data-toggle="dropdown">
             Teacher
            </button>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="{{route('Teacher.index')}}">view teachers record  <i class="fa fa-user-plus ml-2"></i> </a>
            <a class="dropdown-item" href="{{route('Teacher.create')}}">assigning  teachers to classes  <i class="fa fa-user-plus ml-2"></i> </a>

            </div>
          </div>
        </li>

        <li class="nav-item border-bottom pb-2 pt-2">
          <div class="dropdown">
            <button type="button" class="btn btn-primary btn-block dropdown-toggle" data-toggle="dropdown">
                Student
            </button>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="{{route('Student.index')}}">view students record<i class="fa fa-user-plus ml-2"></i> </a>
            </div>
          </div>
        </li>

        <li class="nav-item border-bottom pb-2 pt-2">
          <div class="dropdown">
            <button type="button" class="btn btn-primary btn-block dropdown-toggle" data-toggle="dropdown">
            Staff
            </button>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="#add_staff">add staff   <i class="fa fa-user-plus ml-2"></i> </a>
              <a class="dropdown-item" href="#delete_staff"> delete staff  <i class="fa fa-user-minus ml-2"></i> </a>
              <a class="dropdown-item" href="#">  view all staff <i class="fa fa-eye ml-2"></i> </a>
            </div>
          </div>
        </li>

        <li class="nav-item pb-2 pt-2 border-bottom">
          <div class="dropdown">
            <button type="button" class="btn btn-primary btn-block dropdown-toggle" data-toggle="dropdown">
              الاعلانات
            </button>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="#">اعلان لجميع الطلاب  </a>
              <a class="dropdown-item" href="#">اعلان لطالب معين  </a>
              <a class="dropdown-item" href="#">اعلانات للعامة وحفلات تكريم الطلاب </a>
              <a class="dropdown-item" href="#">اعلان الى مدرس معين  </a>
              <a class="dropdown-item" href="#">اعلان الى جميع المدرسين   </a>
            </div>
          </div>
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
