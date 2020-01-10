<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:61:"F:\journal\public/../application/index\view\author\index.html";i:1578635642;}*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>投稿系统</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="http://www.journal.com/static/index/author/img/favicon.png" rel="icon">
  <link href="http://www.journal.com/static/index/author/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic|Raleway:400,300,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="http://www.journal.com/static/index/author/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="http://www.journal.com/static/index/author/css/style.css" rel="stylesheet">

  <!-- icheck-bootstrap.css -->
        <link rel="stylesheet" href=" http://www.journal.com/static/index/css/icheck-bootstrap.css">


  <!-- =======================================================
    Template Name: Pratt
    Template URL: https://templatemag.com/pratt-app-landing-page-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>

<body data-spy="scroll" data-offset="0" data-target="#navigation">

  <!-- Fixed navbar -->
  <div id="navigation" class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand smothscroll" href="#home"><b>重庆工商大学派斯学院在线投稿系统</b></a>
      </div>
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li class="active"><a href="#home" class="smothscroll">主页</a></li>
          <li><a href="#tougao" class="smothscroll">在线投稿</a></li>
          <li><a href="#draft" class="smothscroll">稿件管理</a></li>
          <li><a href="#message" class="smothscroll">个人信息修改</a></li>
        </ul>
      </div>
      <!--/.nav-collapse -->
    </div>
  </div>

  <section id="home" name="home">
    <div id="headerwrap">
      <div class="container">
        <div class="row centered">
          <div class="col-lg-12">
            <h3>欢迎 <b>作者</b></h3>
            <br>
          </div>

          <div class="col-lg-2"></div>
          <div class="col-lg-8">
            <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">基本信息</div>
            <!-- Table -->
            <table class="table">
              <tbody>
                <tr>
                  <td scope="row">作者：张三</td>
                  <td scope="row">电话：888888</td></tr>
                  <td scope="row">邮箱：123@qq.com</td>
                  <td scope="row">专业：计算机</td>
                </tr>
                <tr>
                  <td scope="row">已投稿件&nbsp;&nbsp;<span class="badge badge-primary">10</span></td>
                  <td scope="row">未审核稿件&nbsp;&nbsp;<span class="badge badge-warning">3</span></td></tr>
                  <td scope="row">已通过稿件&nbsp;&nbsp;<span class="badge badge-success">4</span></td>
                  <td scope="row">未通过稿件&nbsp;&nbsp;<span class="badge badge-danger">3</span></td>
                </tr>
                <tr>
                  <td><a href="">返回网站主页</a></td>
                  <td><a href="">注销账号</a></td>
                </tr>
              </tbody>
            </table>
          </div>
          </div>
          <div class="col-lg-2"></div>
        </div>
      </div>
      <!--/ .container -->
    </div>
    <!--/ #headerwrap -->
  </section>


  <section id="tougao" name="tougao">
    <!-- INTRO WRAP -->
    <div id="intro">
      <div class="container">
        <div class="row centered">
          <h1>在线投稿</h1>
          <form action="">
          <br>
          <div class="col-lg-4">
            <img class="tougao"  src="http://www.journal.com/static/index/author/img/intro01.png" alt="">
            <h3>选择稿件</h3>
            <p><div class="input-group">
               <input id='location' class="form-control" onclick="$('#i-file').click();" style="width: 360px;">
              <input type="file" name="file" id='i-file'  accept=".xls, .xlsx" onchange="$('#location').val($('#i-file').val());" style="display: none">
               </div></p>
          </div>
          <div class="col-lg-4">
            <img class="tougao" src="http://www.journal.com/static/index/author/img/intro02.png" alt="">
            <h3>选择附件</h3>
            <p><div class="input-group">
               <input id='location2' class="form-control" onclick="$('#i-file2').click();" style="width: 360px;">
              <input type="file" name="file" id='i-file2'  accept=".xls, .xlsx" onchange="$('#location2').val($('#i-file2').val());" style="display: none">
               </div></p>
          </div>
          <div class="col-lg-4">
            <p><input type="text" placeholder="请输入标题"></p>
            <p><input type="text" placeholder="请输入作者"></p>
            <p><select name="" id="" style="width: 100%;height: 34px;">
              <option value="">请选择类型</option>
              <option value="">文学</option>
              <option value="">物理</option>
              <option value="">生物</option>
              <option value="">数学</option>
            </select></p>
                <p><input type="submit" class="form-control" style="width: 100%;background-color: #43CD80;margin-top:100px;" ></p>
          </div>
          </br>
          </form>
        </div>
      </div>
      <!--/ .container -->
    </div>
    <!--/ #introwrap -->
  </section>


  <section id="draft" name="draft">
    <div id="showcase">
      <div class="container">
        <div class="row centered">
        <h1>稿件管理</h1>
          <div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" class="collapsed" aria-expanded="false">
      <h4 class="panel-title">已通过稿件&nbsp;&nbsp;<span class="badge badge-primary">10</span></h4>
    </a>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in" aria-expanded="false">
      <table class="table">
        <tbody>
        <tr>
            <td>标题111111</td>
            <td><span class="badge badge-success">通过</span></td>
            <td>所属类型</td>
            <td><!-- 审改意见 -->
            <!-- Button trigger modal -->
              <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">
                摘要
              </button>

              <!-- Modal -->
              <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="myModalLabel">摘要</h4>
                    </div>
                    <div class="modal-body">
                      这里是内容
                    </div>
                  </div>
                </div>
              </div>

    <!-- 审改意见end --></td>
            <td><span class="badge badge-success">已支付</span></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" class="collapsed" aria-expanded="false">
      <h4 class="panel-title">待审核稿件&nbsp;&nbsp;<span class="badge badge-success">4</h4>
    </a>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse in" aria-expanded="false">
      <table class="table">
        <tbody>
        <form action=""></form>
          <tr>
            <td>标题222222222</td>
            <td><span class="badge badge-warning">待审</span></td>
            <td>所属类型</td>
            <td><div class="input-group">
               <input id="location3" class="form-control" onclick="$('#i-file3').click();"  placeholder="修改稿件">
              <input type="file" name="file" id="i-file3" accept=".xls, .xlsx" onchange="$('#location3').val($('#i-file3').val());" style="display: none">
               </div></td>
               <td><div class="input-group">
               <input id="location4" class="form-control" onclick="$('#i-file4').click();"  placeholder="修改附件">
              <input type="file" name="file" id="i-file4" accept=".xls, .xlsx" onchange="$('#location4').val($('#i-file4').val());" style="display: none">
               </div></td>
            <td><input type="submit" class="form-control btn btn-success btn-sm" style="width:46px;height: 30px;"></td>
            <td><button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal">删除</button></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" class="" aria-expanded="true">
      <h4 class="panel-title">未通过稿件&nbsp;&nbsp;<span class="badge badge-danger">3</h4>
    </a>
    </div>
    <div id="collapseThree" class="panel-collapse collapse in" aria-expanded="true" style="">
      <table class="table">
        <tbody>
          <tr>
            <td>标题3333333</td>
            <td><span class="badge badge-danger">未通过</span></td>
            <td>所属类型</td>
            <td>
    <!-- 审改意见 -->
            <!-- Button trigger modal -->
              <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal2">
                审改意见
              </button>

              <!-- Modal -->
              <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="myModalLabel">审改意见</h4>
                    </div>
                    <div class="modal-body">
                      这里是审改意见
                    </div>
                  </div>
                </div>
              </div>

    <!-- 审改意见end -->

              </td>
            <td><button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal">
                删除
              </button></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
        </div>
        <br>
        <br>
        <br>
      </div>
      <!-- /container -->
    </div>
  </section>


  <section id="message" name="message">
    <div id="footerwrap">
      <div class="container">
      <div class="row ">
      <div class="col-lg-2"></div>
        <div class="col-lg-8">
          <h3 class="centered">修改信息</h3>
          <div class="signin-form">
          <form action="">
                  <div class="form-col">
                    <div class="form-group">
                        <label for="signin_form">用户名</label>
                        <input type="text" class="form-control" id="signin_form" placeholder="请输入用户名">
                    </div><!--/.form-group -->
                  </div><!--/.form-col -->
                  <div class="form-col1">
                    <div class="form-group">
                      <label for="signin_form">真实姓名</label>
                        <input type="text" class="form-control" id="signin_form" placeholder="请输入真实姓名">
                    </div><!--/.form-group -->
                  </div><!--/.form-col1 -->
                <div class="form-col">
                  <div class="form-group">
                    <label for="signin_form">密码</label>
                      <input type="password" class="form-control" id="signin_form" placeholder="请输入密码">
                  </div><!--/.form-group -->
                </div><!--/.form-group -->
                <div class="form-col1">
                  <div class="form-group">
                    <label for="signin_form"> 确认密码</label>
                      <input type="password" class="form-control" id="signin_form" placeholder="请确认密码">
                  </div><!--/.form-group -->
                </div><!--/.form-col1 -->

                <div class="form-col">
                  <div class="form-group">
                    <label for="signin_form">性别</label>
                    <div class="form-control" id="signin_form" style="border:0;">
                      <div class="radio icheck-primary" style="float: left;">
                    <input type="radio" id="men" name="sex" checked="">
                    <label for="men">男</label>
                    </div>
                      <div class="radio icheck-primary" style="float: left;margin-left: 20px;">
                    <input type="radio"  id="women" name="sex">
                    <label for="women">女</label>
                    </div>
                    </div>
                  </div><!--/.form-group -->
                </div><!--/.form-group -->
                <div class="form-col1">
                  <div class="form-group">
                    <label for="signin_form">年龄</label>
                      <input type="text" class="form-control" id="signin_form" placeholder="请输入年龄">
                  </div><!--/.form-group -->
                </div><!--/.form-col1 -->

                <div class="form-col">
                  <div class="form-group">
                    <label for="signin_form">Email</label>
                      <input type="email" class="form-control" id="signin_form" placeholder="请输入邮箱">
                  </div><!--/.form-group -->
                </div><!--/.form-group -->
                <div class="form-col1">
                  <div class="form-group">
                    <label for="signin_form"> 电话</label>
                      <input type="text" class="form-control" id="signin_form" placeholder="请输入电话号">
                  </div><!--/.form-group -->
                </div><!--/.form-col1 -->

                <div class="form-col">
                  <div class="form-group">
                    <label for="signin_form">身份证号</label>
                      <input type="text" class="form-control" id="signin_form" placeholder="请输入身份证号">
                  </div><!--/.form-group -->
                </div><!--/.form-group -->
                <div class="form-col1">
                  <div class="form-group">
                    <label for="signin_form">籍贯</label>
                      <input type="text" class="form-control" id="signin_form" placeholder="请输入籍贯">
                  </div><!--/.form-group -->
                </div><!--/.form-col1 -->

                <div class="form-col">
                  <div class="form-group">
                    <label for="signin_form">现住址</label>
                      <input type="text" class="form-control" id="signin_form" placeholder="请输入现住址">
                  </div><!--/.form-group -->
                </div><!--/.form-group -->
                <div class="form-col1">
                  <div class="form-group">
                    <label for="signin_form">学历</label>
                      <input type="text" class="form-control" id="signin_form" placeholder="请输入学历">
                  </div><!--/.form-group -->
                </div><!--/.form-col1 -->

                <div class="form-col">
                  <div class="form-group">
                    <label for="signin_form">专业</label>
                      <input type="text" class="form-control" id="signin_form" placeholder="请输入专业">
                  </div><!--/.form-group -->
                </div><!--/.form-group -->
                <div class="form-col1">
                  <div class="form-group">
                    <label for="signin_form">工作单位</label>
                      <input type="text" class="form-control" id="signin_form" placeholder="请输入工作单位">
                  </div><!--/.form-group -->
                </div><!--/.form-col1 -->

                <div class="form-col">
                  <div class="form-group">
                    <label for="signin_form">职称</label>
                      <input type="text" class="form-control" id="signin_form" placeholder="请输入职称">
                  </div><!--/.form-group -->
                </div><!--/.form-group -->
                <div class="form-col1">
                  <div class="form-group">
                    <label for="signin_form">研究方向</label>
                      <input type="text" class="form-control" id="signin_form" placeholder="请输入研究方向">
                  </div><!--/.form-group -->
                </div><!--/.form-col1 -->
                <input type="submit" class="form-control" style="width: 50%;background-color: #43CD80;margin:0 auto;" value="保存修改">
                </form><!--/form -->
          </div>
        </div>
        <div class="col-lg-2"></div>
        </div>
      </div>
    </div>
  </section>
  <div id="copyrights">
    <div class="container">
      <p>
        &copy; 重庆工商大学派斯学院 <strong>学报</strong>作者在线投稿系统
      </p>
      <div class="credits">
        <!--
          You are NOT allowed to delete the credit link to TemplateMag with free version.
          You can delete the credit link only if you bought the pro version.
          Buy the pro version with working PHP/AJAX contact form: https://templatemag.com/pratt-app-landing-page-template/
          Licensing information: https://templatemag.com/license/
        -->
        Chongqing Institute of Technology<a href="#">Author Online Submission System</a>
      </div>
    </div>
  </div>

  <!-- JavaScript Libraries -->
  <script src="http://www.journal.com/static/index/author/lib/jquery/jquery.min.js"></script>
  <script src="http://www.journal.com/static/index/author/lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="http://www.journal.com/static/index/author/lib/php-mail-form/validate.js"></script>
  <script src="http://www.journal.com/static/index/author/lib/easing/easing.min.js"></script>

  <!-- Template Main Javascript File -->
  <script src="http://www.journal.com/static/index/author/js/main.js"></script>

</body>
</html>
