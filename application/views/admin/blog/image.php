<div class="content-wrapper">
        <section class="content-header">
           <h1>
        Blog
          </h1>
          <ol class="breadcrumb">
           <li><a href="<?php echo base_url() ?>dcadmin/Home"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo base_url() ?>admin/college"><i class="fa fa-dashboard"></i> All Blogs </a></li>
            <li class="active">View Detail College</li>
          </ol>
        </section>
		<section class="content">
		<div class="row">
       <div class="col-lg-12">
				   <a class="btn custom_btn" href="<?php echo base_url() ?>admin/home/blog" role="button" style="margin-bottom:12px;">Back</a>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-money fa-fw"></i>Blog</h3>
                            </div>
                               <div class="panel panel-default">
                           
                            <div class="panel-body">
                                <div class="">
                                    <table class="table table-bordered table-hover table-striped" id="userTable">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Image</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php $i=1; foreach($image as $data) { ?>
                                            <tr>
                                               <td><? echo $i; ?></td>
											   <td><img class="img-responsive" src="<? echo base_url().$data; ?>" alt="image"></td>
                                            </tr>
										<?   } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        </div>

                    </div>
                    </div>
        </section>
      </div>
	  
	
<style>
label{
	margin:5px;
}
</style>
<!-- <script type="text/javascript" src="<?php echo base_url() ?>assets/slider/ajaxupload.3.5.js"></script>	  
<script type="text/javascript" src="<?php echo base_url() ?>assets/slider/rs.js"></script>	  -->
	  