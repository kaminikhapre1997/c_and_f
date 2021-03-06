@extends('admin.main')



@section('AdminMainContent')



@include('admin.include.header')



@include('admin.include.navbar')



@include('admin.include.sidebar')


<style type="text/css">


.stepwizard-step p {
    margin-top: 10px;
}

.stepwizard-row {
    display: table-row;
}

.stepwizard {
    display: table;
    width: 100%;
    position: relative;
}

.stepwizard-step button[disabled] {
    opacity: 1 !important;
    filter: alpha(opacity=100) !important;
}

.stepwizard-row:before {
    top: 14px;
    bottom: 0;
    position: absolute;
    content: " ";
    width: 100%;
    height: 1px;
    background-color: #ccc;
    z-order: 0;

}

.stepwizard-step {
    display: table-cell;
    text-align: center;
    position: relative;
}

.btn-circle {
  width: 30px;
  height: 30px;
  text-align: center;
  padding: 6px 0;
  font-size: 12px;
  line-height: 1.428571429;
  border-radius: 15px;
}
.setwidthsel{
  width: 100px;
}


</style>



<div class="content-wrapper">

        <!-- Content Header (Page header) -->

        <section class="content-header">

          <h1>

            Master Tran Tax

            <small>Add Details</small>

          </h1>

          <ol class="breadcrumb">

            <li><a href="{{ URL('/dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>

            <li><a href="{{ URL('/dashboard')}}">Master</a></li>

            <li class="Active"><a href="{{ URL('/form-fleet-truck-wheel')}}">Master Tran Tax  </a></li>

            <li class="Active"><a href="{{ URL('/form-fleet-truck-wheel')}}">Add Tran Tax </a></li>

          </ol>

        </section>

  <section class="content">

    <div class="row">

      <div class="col-sm-12">

        <div class="box box-primary Custom-Box">

            <div class="box-header with-border" style="text-align: center;">

              <h2 class="box-title animated bounceInLeft PageTitle" style="font-weight: 800;color: #5696bb;">Add Tran Tax</h2>

            </div><!-- /.box-header -->

             @if(Session::has('alert-success'))



              <div class="alert alert-success alert-dismissible" style="width: 96%;margin-left: 2%;">

                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

                <h4>

                  <i class="icon fa fa-check"></i>

                  Success...!

                </h4>

                 {!! session('alert-success') !!}

              </div>

            @endif

             @if(Session::has('alert-error'))

              <div class="alert alert-danger alert-dismissible" style="width: 96%;margin-left: 2%;">

                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

                <h4>

                  <i class="icon fa fa-ban"></i>

                  Error...!

                </h4>

                {!! session('alert-error') !!}

              </div>

            @endif


            <div class="box-body">


              <div class="stepwizard">
                  <div class="stepwizard-row setup-panel">
                      <div class="stepwizard-step">
                          <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
                          <p>Basic Details</p>
                      </div>
                      <div class="stepwizard-step">
                          <a href="#step-2" type="button" class="btn btn-default btn-circle">2</a>
                          <p>Amount Field</p>
                      </div>
                      <div class="stepwizard-step">
                          <a href="#step-3" type="button" class="btn btn-default btn-circle">3</a>
                          <p>Non Accounting Field</p>
                      </div>
                  </div>
              </div>
                  <div class="row setup-content" id="step-1">
                      <div class="col-xs-12">
                          <div class="col-md-12">
                              <form action="{{ url('finance/update-first-transtax') }}" method="POST" id="InwardTrnas">
                             @csrf
                              <div class="row">
                                <div class="col-md-6">

                                  <div class="form-group">

                                    <label>

                                      Tax Code: 

                                      <span class="required-field"></span>

                                    </label>

                                      <div class="input-group">

                                        <span class="input-group-addon"><i class="fa fa-sort-numeric-asc" aria-hidden="true"></i></span>
                                        <input type="hidden" name="trntaxid" value="{{ $tran_tax_data->id }}">
                                        <input list="taxList"  id="tax_code" name="tax_code" class="form-control  pull-left" value="{{ $tran_tax_data->tax_code }}" placeholder="Select Tax Code" >
                                      
                                       <datalist id="taxList">
                                          
                                          
                                           @foreach($tax_list as $row)

                                            <option value='{{ $row->tax_code }}' data-xyz ="{{ $row->tax_name }}"<?php if($tran_tax_data->tax_code==$row->tax_code) { echo 'selected'; } else { echo '';}?>>{{ $row->tax_code }} = {{ $row->tax_name }} </option>

                                           @endforeach
                                         
                                      </datalist>
                                      </div>
                                      <small>  

                                       <div class="pull-left showSeletedName" id="taxText"></div>

                                      </small>

                                        <small id="emailHelp" class="form-text text-muted">

                                          {!! $errors->first('tax_code', '<p class="help-block" style="color:red;">:message</p>') !!}

                                        </small>



                                  </div>

                    <!-- /.form-group -->
                                </div>
                                <div class="col-md-6">

                                  <div class="form-group">

                                    <label>

                                      Trans Code: 

                                      <span class="required-field"></span>

                                    </label>

                                      <div class="input-group">

                                        <span class="input-group-addon"><i class="fa fa-sort-numeric-asc" aria-hidden="true"></i></span>

                                      <input list="transList"  id="trans_code" name="trans_code" class="form-control  pull-left" value="{{ $tran_tax_data->tran_code }}" placeholder="Select Trans Code" >

                                      <datalist id="transList">    
                                        
                                         
                                         @foreach($trans_list as $c)

                                          <option value='{{ $c->tran_code }}' data-xyz ="{{ $c->tran_head }}"<?php if($tran_tax_data->tran_code==$c->tran_code) { echo 'selected'; } else { echo '';}?>>{{ $c->tran_code }} = {{ $c->tran_head }} </option>

                                         @endforeach
                                        
                                      </datalist>

                                      </div>
                                      <small>  

                                      <div class="pull-left showSeletedName" id="transText"></div>

                                      </small>

                                        <small id="emailHelp" class="form-text text-muted">

                                          {!! $errors->first('trans_code', '<p class="help-block" style="color:red;">:message</p>') !!}

                                        </small>



                                  </div>

                                  <!-- /.form-group -->

                                </div>
                              </div>
                              <div class="row">
                  <div class="col-md-6">

                    <div class="form-group">

                      <label>

                        Series: 

                        <span class="required-field"></span>

                      </label>

                      <div class="input-group">

                          <span class="input-group-addon"><i class="fa fa-building-o"></i></span>

                          <input list="seriesList"  id="series_code" name="series_code" class="form-control  pull-left" value="{{ $tran_tax_data->series_code }}" placeholder="Select Series Code" >

                        <datalist id="seriesList">

                         
                          
                           @foreach($config_list as $row)

                            <option value='{{ $row->series_code }}' data-xyz ="{{ $row->series_name }}" <?php if($tran_tax_data->series_code==$row->series_code) { echo 'selected'; } else { echo '';}?>>{{ $row->series_code }} = {{ $row->series_name }} </option>

                           @endforeach
                          

                        </datalist>

                      </div>
                      
                      <small>  

                        <div class="pull-left showSeletedName" id="seriesText"></div>

                      </small>

                      <small id="emailHelp" class="form-text text-muted">

                        {!! $errors->first('series_code', '<p class="help-block" style="color:red;">:message</p>') !!}

                      </small>

                    </div>

                    <!-- /.form-group -->

                  </div>

                 

                  <div class="col-md-6">

                    <div class="form-group">

                      <label>

                        GI Code : 

                        <span class="required-field"></span>

                      </label>

                      <div class="input-group">

                          <span class="input-group-addon"><i class="fa fa-building-o"></i></span>

                          <input list="giList"  id="gi_code" name="gi_code" class="form-control  pull-left" value="{{ $tran_tax_data->gl_code }}" placeholder="Select GI Code" >

                        <datalist id="giList">
                        
                        
                           
                            @foreach($gl_list as $key)
                            <option value="{{ $key->gl_code }}" data-xyz ="{{  $key->gl_name }}" <?php if($tran_tax_data->gl_code==$key->gl_code){ echo 'selected';} ?>> {{ $key->gl_code }} = {{ $key->gl_name }}</option>

                            @endforeach
                          

                        </datalist>

                      </div>

                    <small>  

                        <div class="pull-left showSeletedName" id="giText"></div>

                      </small>

                      <small id="emailHelp" class="form-text text-muted">

                        {!! $errors->first('gi_code', '<p class="help-block" style="color:red;">:message</p>') !!}

                      </small>

                    </div>

                    <!-- /.form-group -->

                  </div>

             </div>
                  
                              
                              <!-- <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button> -->

                               <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> &nbsp;&nbsp;Update</button>
                              </form>
                          </div>
                      </div>
                  </div>
                  <div class="row setup-content" id="step-2">
                      <div class="col-xs-12">
                          <div class="col-md-12" style="overflow-x: auto;">
                            <form action="{{ url('finance/update-third-transtax') }}" method="POST" id="InwardTrnas">
                             @csrf
                              <table class="table table-bordered">
                                
                                <tbody>
                                  <tr>
                                    <input type="hidden" name="thirdtrid" value="{{ $tran_tax_data->id }}">
                                    <td width="" class="trTitle" colspan="6" align="left">Amount Conditions</td>
                                  </tr>
                                  <tr align="center">
                                    <td width="20%" class="trTitle">Head</td>
                                    <td width="15%" class="trTitle">Rate</td>
                                    <td width="10%" class="trTitle">Index</td>
                                    <td width="15%" class="trTitle">Logic</td>
                                    <td width="15%" class="trTitle">GLCode</td>
                                    <td width="18%" class="trTitle">Static</td>
                                  </tr>
                                  <tr>
                                    <th scope="row">1&nbsp;&nbsp;<input type="text" name="amthead" id="amthead" value="{{ $tran_tax_data->amthead }}" size="8" class="textBox"></th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                  </tr>

                                  <tr>
                                    <th scope="row">2&nbsp;&nbsp;<input type="text" name="afhead2" id="afhead2" value="{{ $tran_tax_data->afhead2 }}" size="8" class="textBox"></th>

                                    <td><input type="text" name="afrate2" id="afrate2" value="{{ $tran_tax_data->afrate2 }}" size="10" class="textBox"></td>

                                    <td><select name="afratei2" class="setwidthsel">
                                      <option value="">---</option>
                                      <?php foreach ($rate_list as $key){ ?>
                                      <option value="{{$key->rt_value }}" <?php if($tran_tax_data->afratei2 ==  $key->rt_value){ echo "selected"; }else{ echo '';} ?>><?php echo $key->rt_value; ?></option>

                                    <?php } ?>
                                    </select></td>

                                    <td><input type="text" name="aflogic2" id="aflogic2" value="{{ $tran_tax_data->aflogic2 }}" size="10" class="textBox"></td>

                                    <td><input type="text" name="afgl_code2" id="afgl_code2" value="{{ $tran_tax_data->afgl_code2 }}" size="10" class="textBox"></td>

                                    <td>
                                      <input type="radio" name="statici2" value="1" <?php if($tran_tax_data->statici2=='1'){ echo 'checked';} else{ echo '';} ?>> Yes

                                      
                                      <input type="radio" name="statici2" value="0"<?php if($tran_tax_data->statici2=='0'){ echo 'checked';} else{ echo '';} ?>> No
                                      <input type="hidden" name="tdId2" id="tdId2" value="">
                                    </td>
                                  </tr>

                                  <tr>
                                     <th scope="row">3&nbsp;&nbsp;<input type="text" name="afhead3" id="afhead3" value="{{ $tran_tax_data->afhead3 }}" size="8" class="textBox"></th>

                                    <td><input type="text" name="afrate3" id="afrate3" value="{{ $tran_tax_data->afrate3 }}" size="10" class="textBox"></td>

                                    <td><select name="afratei3" class="setwidthsel">
                                      <option value="">---</option>
                                      <?php foreach ($rate_list as $key){ ?>
                                      <option value="{{ $key->rt_value }}" <?php if($tran_tax_data->afratei3 ==  $key->rt_value){ echo "selected"; }else{ echo '';} ?>><?php echo $key->rt_value; ?></option>

                                    <?php } ?>
                                    </select></td>

                                    <td><input type="text" name="aflogic3" id="aflogic3" value="{{ $tran_tax_data->aflogic3 }}" size="10" class="textBox"></td>

                                    <td><input type="text" name="afgl_code3" id="afgl_code3" value="{{ $tran_tax_data->afgl_code3 }}" size="10" class="textBox"></td>

                                    <td>
                                      <input type="radio" name="statici3" value="1" <?php if($tran_tax_data->statici3=='1'){ echo 'checked';} else{ echo '';} ?>> Yes
                                      <input type="radio" name="statici3" value="0" <?php if($tran_tax_data->statici3=='0'){ echo 'checked';} else{ echo '';} ?>> No
                                      <input type="hidden" name="tdId2" id="tdId2" value="">
                                    </td>
                                  </tr>

                                  <tr>
                                     <th scope="row">4&nbsp;&nbsp;<input type="text" name="afhead4" id="afhead4" value="{{ $tran_tax_data->afhead4 }}" size="8" class="textBox"></th>

                                    <td><input type="text" name="afrate4" id="afrate4" value="{{ $tran_tax_data->afrate4 }}" size="10" class="textBox"></td>

                                    <td><select name="afratei4" class="setwidthsel">
                                      <option value="">---</option>
                                      <?php foreach ($rate_list as $key){ ?>
                                      <option value="{{ $key->rt_value }}" <?php if($tran_tax_data->afratei4 ==  $key->rt_value){ echo "selected"; }else{ echo '';} ?>><?php echo $key->rt_value; ?></option>

                                    <?php } ?>
                                    </select></td>

                                    <td><input type="text" name="aflogic4" id="aflogic4" value="{{ $tran_tax_data->aflogic4 }}" size="10" class="textBox"></td>
                                    <td><input type="text" name="afgl_code4" id="afgl_code4" value="{{ $tran_tax_data->afgl_code4 }}" size="10" class="textBox"></td>
                                    <td>
                                      <input type="radio" name="statici4" value="1" <?php if($tran_tax_data->statici4=='1'){ echo 'checked';} else{ echo '';} ?>> Yes
                                      <input type="radio" name="statici4" value="0" <?php if($tran_tax_data->statici4=='0'){ echo 'checked';} else{ echo '';} ?>> No
                                      <input type="hidden" name="tdId2" id="tdId2" value="">
                                    </td>
                                  </tr>

                                  <tr>
                                     <th scope="row">5&nbsp;&nbsp;<input type="text" name="afhead5" id="afhead5" value="{{ $tran_tax_data->afhead5 }}" size="8" class="textBox"></th>

                                    <td><input type="text" name="afrate5" id="afrate5" value="{{ $tran_tax_data->afrate5 }}" size="10" class="textBox"></td>

                                    <td><select name="afratei5" class="setwidthsel">
                                      <option value="">---</option>
                                      <?php foreach ($rate_list as $key){ ?>
                                      <option value="{{ $key->rt_value }}" <?php if($tran_tax_data->afratei5 ==  $key->rt_value){ echo "selected"; }else{ echo '';} ?>><?php echo $key->rt_value; ?></option>

                                    <?php } ?>
                                    </select></td>

                                    <td><input type="text" name="aflogic5" id="aflogic5" value="{{ $tran_tax_data->aflogic5 }}" size="10" class="textBox"></td>

                                    <td><input type="text" name="afgl_code5" id="afgl_code5" value="{{ $tran_tax_data->afgl_code5 }}" size="10" class="textBox"></td>

                                    <td>
                                      <input type="radio" name="statici5" value="1" <?php if($tran_tax_data->statici5=='1'){ echo 'checked';} else{ echo '';} ?>> Yes
                                      <input type="radio" name="statici5" value="0" <?php if($tran_tax_data->statici5=='0'){ echo 'checked';} else{ echo '';} ?>> No
                                      <input type="hidden" name="tdId2" id="tdId2" value="">
                                    </td>
                                  </tr>

                                  <tr>
                                     <th scope="row">6&nbsp;&nbsp;<input type="text" name="afhead6" id="afhead6" value="{{ $tran_tax_data->afhead6 }}" size="8" class="textBox"></th>

                                    <td><input type="text" name="afrate6" id="afrate6" value="{{ $tran_tax_data->afrate6 }}" size="10" class="textBox"></td>

                                    <td><select name="afratei6" class="setwidthsel">
                                      <option value="">---</option>
                                      <?php foreach ($rate_list as $key){ ?>
                                      <option value="{{$key->rt_value}}" <?php if($tran_tax_data->afratei6 ==  $key->rt_value){ echo "selected"; }else{ echo '';} ?>><?php echo $key->rt_value; ?></option>

                                    <?php } ?>
                                    </select></td>

                                    <td><input type="text" name="aflogic6" id="aflogic6" value="{{ $tran_tax_data->aflogic6 }}" size="10" class="textBox"></td>

                                    <td><input type="text" name="afgl_code6" id="afgl_code6" value="{{ $tran_tax_data->afgl_code6 }}" size="10" class="textBox"></td>

                                    <td>
                                      <input type="radio" name="statici6" value="1" <?php if($tran_tax_data->statici6=='1'){ echo 'checked';} else{ echo '';} ?>> Yes
                                      <input type="radio" name="statici6" value="0" <?php if($tran_tax_data->statici6=='0'){ echo 'checked';} else{ echo '';} ?>> No
                                      <input type="hidden" name="tdId2" id="tdId2" value="">
                                    </td>
                                  </tr>

                                  <tr>
                                     <th scope="row">7&nbsp;&nbsp;<input type="text" name="afhead7" id="afhead7" value="{{ $tran_tax_data->afhead7 }}" size="8" class="textBox"></th>

                                    <td><input type="text" name="afrate7" id="afrate7" value="{{ $tran_tax_data->afrate7 }}" size="10" class="textBox"></td>

                                    <td><select name="afratei7" class="setwidthsel">
                                      <option value="">---</option>
                                      <?php foreach ($rate_list as $key){ ?>
                                      <option value="{{ $key->rt_value }}" <?php if($tran_tax_data->afratei7 ==  $key->rt_value){ echo "selected"; }else{ echo '';} ?>><?php echo $key->rt_value; ?></option>

                                    <?php } ?>
                                    </select></td>

                                    <td><input type="text" name="aflogic7" id="aflogic7" value="{{ $tran_tax_data->aflogic7 }}" size="10" class="textBox"></td>

                                    <td><input type="text" name="afgl_code7" id="afgl_code7" value="{{ $tran_tax_data->afgl_code7 }}" size="10" class="textBox"></td>

                                    <td>
                                      <input type="radio" name="statici7" value="1" <?php if($tran_tax_data->statici7=='1'){ echo 'checked';} else{ echo '';} ?>> Yes
                                      <input type="radio" name="statici7" value="0" <?php if($tran_tax_data->statici7=='0'){ echo 'checked';} else{ echo '';} ?>> No
                                      <input type="hidden" name="tdId2" id="tdId2" value="">
                                    </td>
                                  </tr>
                                  <tr>
                                    <th scope="row">8&nbsp;&nbsp;<input type="text" name="afhead8" id="afhead8" value="{{ $tran_tax_data->afhead8 }}" size="8" class="textBox"></th>

                                    <td><input type="text" name="afrate8" id="afrate8" value="{{ $tran_tax_data->afrate8 }}" size="10" class="textBox"></td>

                                    <td><select name="afratei8" class="setwidthsel">
                                      <option value="">---</option>
                                      <?php foreach ($rate_list as $key){ ?>
                                      <option value="{{ $key->rt_value }}" <?php if($tran_tax_data->afratei8 ==  $key->rt_value){ echo "selected"; }else{ echo '';} ?>><?php echo $key->rt_value; ?></option>

                                    <?php } ?>
                                    </select></td>

                                    <td><input type="text" name="aflogic8" id="aflogic8" value="{{ $tran_tax_data->aflogic8 }}" size="10" class="textBox"></td>

                                    <td><input type="text" name="afgl_code8" id="afgl_code8" value="{{ $tran_tax_data->afgl_code8 }}" size="10" class="textBox"></td>

                                    <td>
                                      <input type="radio" name="statici8" value="1" <?php if($tran_tax_data->statici8=='1'){ echo 'checked';} else{ echo '';} ?>> Yes
                                      <input type="radio" name="statici8" value="0" <?php if($tran_tax_data->statici8=='0'){ echo 'checked';} else{ echo '';} ?>> No
                                      <input type="hidden" name="tdId2" id="tdId2" value="">
                                    </td>
                                  </tr>
                                  <tr>
                                     <th scope="row">9&nbsp;&nbsp;<input type="text" name="afhead9" id="afhead9" value="{{ $tran_tax_data->afhead9 }}" size="8" class="textBox"></th>

                                    <td><input type="text" name="afrate9" id="afrate9" value="{{ $tran_tax_data->afrate9 }}" size="10" class="textBox"></td>

                                    <td><select name="afratei9" class="setwidthsel">
                                      <option value="">---</option>
                                      <?php foreach ($rate_list as $key){ ?>
                                      <option value="{{ $key->rt_value }}" <?php if($tran_tax_data->afratei9 ==  $key->rt_value){ echo "selected"; }else{ echo '';} ?>><?php echo $key->rt_value; ?></option>

                                    <?php } ?>
                                    </select></td>

                                    <td><input type="text" name="aflogic9" id="aflogic9" value="{{ $tran_tax_data->aflogic9 }}" size="10" class="textBox"></td>
                                    <td><input type="text" name="afgl_code9" id="afgl_code9" value="{{ $tran_tax_data->afgl_code9 }}" size="10" class="textBox"></td>
                                    <td>
                                      <input type="radio" name="statici9" value="1" <?php if($tran_tax_data->statici9=='1'){ echo 'checked';} else{ echo '';} ?>> Yes
                                      <input type="radio" name="statici9" value="0" <?php if($tran_tax_data->statici9=='0'){ echo 'checked';} else{ echo '';} ?>> No
                                      <input type="hidden" name="tdId2" id="tdId2" value="">
                                    </td>
                                  </tr>

                                  <tr>
                                     <th scope="row">10&nbsp;<input type="text" name="afhead10" id="afhead10" value="{{ $tran_tax_data->afhead10 }}" size="8" class="textBox"></th>
                                    <td><input type="text" name="afrate10" id="afrate10" value="{{ $tran_tax_data->afrate10 }}" size="10" class="textBox"></td>
                                    <td><select name="afratei10" class="setwidthsel">
                                      <option value="">---</option>
                                      <?php foreach ($rate_list as $key){ ?>
                                      <option value="{{ $key->rt_value }}" <?php if($tran_tax_data->afratei10 ==  $key->rt_value){ echo "selected"; }else{ echo '';} ?>><?php echo $key->rt_value; ?></option>

                                    <?php } ?>
                                    </select></td>
                                    <td><input type="text" name="aflogic10" id="aflogic10" value="{{ $tran_tax_data->aflogic10 }}" size="10" class="textBox"></td>
                                    <td><input type="text" name="afgl_code10" id="afgl_code10" value="{{ $tran_tax_data->afgl_code10 }}" size="10" class="textBox"></td>
                                    <td>
                                      <input type="radio" name="statici10" value="1" <?php if($tran_tax_data->statici10=='1'){ echo 'checked';} else{ echo '';} ?>> Yes
                                      <input type="radio" name="statici10" value="0" <?php if($tran_tax_data->statici10=='0'){ echo 'checked';} else{ echo '';} ?>> No
                                      <input type="hidden" name="tdId2" id="tdId2" value="">
                                    </td>
                                  </tr>
                                  <tr>
                                     <th scope="row">11&nbsp;<input type="text" name="afhead11" id="afhead11" value="{{ $tran_tax_data->afhead11 }}" size="8" class="textBox"></th>
                                    <td><input type="text" name="afrate11" id="afrate11" value="{{ $tran_tax_data->afrate11 }}" size="10" class="textBox"></td>
                                    <td><select name="afratei11" class="setwidthsel">
                                      <option value="">---</option>
                                      <?php foreach ($rate_list as $key){ ?>
                                      <option value="{{$key->rt_value}}" <?php if($tran_tax_data->afratei11 ==  $key->rt_value){ echo "selected"; }else{ echo '';} ?>><?php echo $key->rt_value; ?></option>

                                    <?php } ?>
                                    </select></td>
                                    <td><input type="text" name="aflogic11" id="aflogic11" value="{{ $tran_tax_data->aflogic11 }}" size="10" class="textBox"></td>
                                    <td><input type="text" name="afgl_code11" id="afgl_code11" value="{{ $tran_tax_data->afgl_code11 }}" size="10" class="textBox"></td>
                                    <td>
                                      <input type="radio" name="statici11" value="1" <?php if($tran_tax_data->statici11=='1'){ echo 'checked';} else{ echo '';} ?>> Yes
                                      <input type="radio" name="statici11" value="0" <?php if($tran_tax_data->statici11=='0'){ echo 'checked';} else{ echo '';} ?>> No
                                      <input type="hidden" name="tdId2" id="tdId2" value="">
                                    </td>
                                  </tr>
                                  <tr>
                                     <th scope="row">12&nbsp;<input type="text" name="afhead12" id="afhead12" value="{{ $tran_tax_data->afhead12 }}" size="8" class="textBox"></th>
                                    <td><input type="text" name="afrate12" id="afrate12" value="{{ $tran_tax_data->afrate12 }}" size="10" class="textBox"></td>
                                    <td><select name="afratei12" class="setwidthsel">
                                      <option value="">---</option>
                                      <?php foreach ($rate_list as $key){ ?>
                                      <option value="{{ $key->rt_value }}" <?php if($tran_tax_data->afratei12 ==  $key->rt_value){ echo "selected"; }else{ echo '';} ?>><?php echo $key->rt_value; ?></option>

                                    <?php } ?>
                                    </select></td>
                                    <td><input type="text" name="aflogic12" id="aflogic12" value="{{ $tran_tax_data->aflogic12 }}" size="10" class="textBox"></td>
                                    <td><input type="text" name="afgl_code12" id="afgl_code12" value="{{ $tran_tax_data->afgl_code12 }}" size="10" class="textBox"></td>
                                    <td>
                                      <input type="radio" name="statici12" value="1" <?php if($tran_tax_data->statici12=='1'){ echo 'checked';} else{ echo '';} ?> > Yes
                                      <input type="radio" name="statici12" value="0" <?php if($tran_tax_data->statici12=='0'){ echo 'checked';} else{ echo '';} ?>> No
                                      <input type="hidden" name="tdId2" id="tdId2" value="">
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                               <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> &nbsp;&nbsp;Update</button>
                            </form>
                          </div>
                      </div>
                  </div>
                  <div class="row setup-content" id="step-3">
                      <div class="col-xs-12">
                          <div class="col-md-12">
                            <form action="{{ url('finance/update-second-transtax') }}" method="POST" id="InwardTrnas">
                             @csrf
                              <table  class="table table-bordered">
                                <tbody>
                                  <tr>
                                    <input type="hidden" name="secondid" value="{{ $tran_tax_data->id }}">
                                    <td class="td_padding" width="30%">NafHead1</td>
                                    <td class="td_padding"><input type="text" name="nafhead1" value="{{ $tran_tax_data->nafhead1 }}" class="textBox"></td>
                                  </tr>
                                  <tr>
                                    <td class="td_padding">NafHead2</td>
                                    <td class="td_padding"><input type="text" name="nafhead2" value="{{ $tran_tax_data->nafhead2 }}" class="textBox"></td>
                                  </tr>
                                  <tr>
                                    <td class="td_padding">NafHead3</td>
                                    <td class="td_padding"><input type="text" name="nafhead3" value="{{ $tran_tax_data->nafhead3 }}" class="textBox"></td>
                                  </tr>
                                  <tr>
                                    <td class="td_padding">NafHead4</td>
                                    <td class="td_padding"><input type="text" name="nafhead4" value="{{ $tran_tax_data->nafhead4 }}" class="textBox"></td>
                                  </tr>
                                  <tr>
                                    <td class="td_padding">NafHead5</td>
                                    <td class="td_padding"><input type="text" name="nafhead5" value="{{ $tran_tax_data->nafhead5 }}" class="textBox"></td>
                                  </tr>
                                  <tr bgcolor="#F7F7F7">
                                    <!-- <td colspan="2" align="center"><input type="submit" name="cmdUpdate2" value="Update" class="button"> 
                                    <input type="button" name="cmdCancel" value="Cancel" class="button" onclick="javascript:redirectUrl('index.php?option=TranTaxMasterList');"></td> -->
                                  </tr>
                                </tbody>
                              </table>
                              <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> &nbsp;&nbsp;Update</button>
                            </form>
                          </div>
                      </div>
                  </div>

          </div>

      </div>

</div>


    </div>

     

  </section>

</div>







@include('admin.include.footer')



<script type="text/javascript">

    $(document).ready(function(){

        $("#trans_code").bind('change', function () {  

          var val = $(this).val();

          var xyz = $('#transList option').filter(function() {

          return this.value == val;

          }).data('xyz');

          var msg = xyz ?  xyz : 'No Match';

          //alert(msg+xyz);

          document.getElementById("transText").innerHTML = msg; 

        });

        $("#tax_code").bind('change', function () {  

          var val = $(this).val();

          var xyz = $('#taxList option').filter(function() {

          return this.value == val;

          }).data('xyz');

          var msg = xyz ?  xyz : 'No Match';

          //alert(msg+xyz);

          document.getElementById("taxText").innerHTML = msg; 

        });

    });
</script>

<script type="text/javascript">
$(document).ready(function () {

    var navListItems = $('div.setup-panel div a'),
            allWells = $('.setup-content'),
            allNextBtn = $('.nextBtn');

    allWells.hide();

    navListItems.click(function (e) {
        e.preventDefault();
        var $target = $($(this).attr('href')),
                $item = $(this);

        if (!$item.hasClass('disabled')) {
            navListItems.removeClass('btn-primary').addClass('btn-default');
            $item.addClass('btn-primary');
            allWells.hide();
            $target.show();
            $target.find('input:eq(0)').focus();
        }
    });

    allNextBtn.click(function(){
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
            curInputs = curStep.find("input[type='text'],input[type='url']"),
            isValid = true;

        $(".form-group").removeClass("has-error");
        for(var i=0; i<curInputs.length; i++){
            if (!curInputs[i].validity.valid){
                isValid = false;
                $(curInputs[i]).closest(".form-group").addClass("has-error");
            }
        }

        if (isValid)
            nextStepWizard.removeAttr('disabled').trigger('click');
    });

    $('div.setup-panel div a.btn-primary').trigger('click');
});

</script>

@endsection