@extends('admin.admin_master')
@section('admin')

<!-- Content Wrapper. Contains page content -->

    <div class="container-full">
      <!-- Content Header (Page header) -->


      <!-- Main content -->
      <section class="content">
        <div class="row">



          

          
          
          <div class="col-4">

            <div class="box">
               <div class="box-header with-border">
                 <h3 class="box-title">Search By Date</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <div class="table-responsive">

                    <form action="{{ route('search_by_date') }}" method="POST"  >
                        @csrf


                                    <div class="form-group">
                                        <h5>Select Date <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="date" name="date" class="form-control">
                                            @error('date')
                                        <span class="text-danger">{{ $message }}</span>

                                        @enderror
                                        </div>

                                    </div>

                                   

                                   


                           <div class="text-xs-right">
                               <input type="submit" value="Search" class="btn btn-rounded btn-primary mb-5" >
                           </div>
                       </form>


                   </div>
               </div>
               <!-- /.box-body -->
             </div>

           </div>
           <!-- /.col -->

            <div class="col-4">

            <div class="box">
               <div class="box-header with-border">
                 <h3 class="box-title">Search By Month</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <div class="table-responsive">

                    <form action="{{ route('search_by_month') }}" method="POST">
                        @csrf


                                    <div class="form-group">
                                        <h5>Select Month <span class="text-danger">*</span></h5>
                                        <div class="controls">

                                            <select name="month" class="form-control">
                                                <option label="Choose Month"></option>
                                                <option label="January">January</option>
                                                <option label="February">February</option>
                                                <option label="March">March</option>
                                                <option label="April">April</option>
                                                <option label="May">May</option>
                                                <option label="June">June</option>
                                                <option label="July">July</option>
                                                <option label="August">August</option>
                                                <option label="September">September</option>
                                                <option label="October">October</option>
                                                <option label="November">November</option>
                                                <option label="December">December</option>
                                            </select>


                                            @error('month')
                                        <span class="text-danger">{{ $message }}</span>

                                        @enderror
                                        </div>

                                    </div>




                                    <div class="form-group">
                                        <h5>Select Year <span class="text-danger">*</span></h5>
                                        <div class="controls">

                                            <select name="year_name" class="form-control">
                                                <option label="Choose Year"></option>     
                                                <option label="2020">2020</option>
                                                <option label="2021">2021</option>
                                                <option label="2022">2022</option>
                                                <option label="2023">2023</option>
                                                <option label="2024">2024</option>
                                                <option label="2025">2025</option>
                                                <option label="2026">2026</option>   
                                            </select>


                                            @error('year_name')
                                        <span class="text-danger">{{ $message }}</span>

                                        @enderror
                                        </div>

                                    </div>


                           <div class="text-xs-right">
                               <input type="submit" value="Search" class="btn btn-rounded btn-primary mb-5" >
                           </div>
                       </form>


                   </div>
               </div>
               <!-- /.box-body -->
             </div>

           </div>
           <!-- /.col -->

            <div class="col-4">

            <div class="box">
               <div class="box-header with-border">
                 <h3 class="box-title">Select Year</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <div class="table-responsive">

                    <form action="{{ route('search_by_year') }}" method="POST" enctype="multipart/form-data" >
                        @csrf


                                    <div class="form-group">
                                        <h5>Select Year <span class="text-danger">*</span></h5>
                                        <div class="controls">

                                            <select name="year" class="form-control">
                                                <option label="Choose Year"></option>     
                                                <option label="2020">2020</option>
                                                <option label="2021">2021</option>
                                                <option label="2022">2022</option>
                                                <option label="2023">2023</option>
                                                <option label="2024">2024</option>
                                                <option label="2025">2025</option>
                                                <option label="2026">2026</option>   
                                            </select>


                                            @error('year')
                                        <span class="text-danger">{{ $message }}</span>

                                        @enderror
                                        </div>

                                    </div>


            
                           <div class="text-xs-right">
                               <input type="submit" value="Search" class="btn btn-rounded btn-primary mb-5" >
                           </div>
                       </form>


                   </div>
               </div>
               <!-- /.box-body -->
             </div>

           </div>
           <!-- /.col -->








        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->

    </div>

<!-- /.content-wrapper -->


@endsection
