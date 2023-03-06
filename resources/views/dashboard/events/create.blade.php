
<div id="mmn-new" class="modal fade"
     data-backdrop="true">
    <div class="modal-dialog" id="animate">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="material-icons">&#xe02e;</i> {{ __('backend.newEvent') }}
                </h5>
            </div>
            {{Form::open(['route'=>['calendarStore'],'method'=>'POST'])}}
            <div class="modal-body p-lg">
                <div class="p-a">
                    <div class="form-group row">
                        <label for="type"
                               class="col-md-3 form-control-label">{!!  __('backend.eventType') !!}</label>
                        <div class="col-md-9">
                            <div class="radio">
                                <label class="ui-check ui-check-md text-danger" id="type2l">
                                    {!! Form::radio('type','2',true, array('id' => 'type2','class'=>'has-value')) !!}
                                    <i class="dark-white"></i>
                                    <strong>{!!  __('backend.eventEvent') !!}</strong>
                                </label>
                                &nbsp;
                                <label class="ui-check ui-check-md text-success" id="type1l">
                                    {!! Form::radio('type','1',false, array('id' => 'type1','class'=>'has-value')) !!}
                                    <i class="dark-white"></i>
                                    <strong>{!!  __('backend.eventMeeting') !!}</strong>
                                </label>
                                &nbsp;
                                <label class="ui-check ui-check-md" id="type0l">
                                    {!! Form::radio('type','0',false, array('id' => 'type0','class'=>'has-value')) !!}
                                    <i class="dark-white"></i>
                                    <strong>{!!  __('backend.eventNote') !!}</strong>
                                </label>
                                &nbsp;
                                <label class="ui-check ui-check-md text-info" id="type3l">
                                    {!! Form::radio('type','3',false, array('id' => 'type3','class'=>'has-value')) !!}
                                    <i class="dark-white"></i>
                                    <strong>{!!  __('backend.eventTask') !!}</strong>
                                </label>

                            </div>
                        </div>
                    </div>


                    <div id="date" class="form-group row displayNone">
                        <label for="title"
                               class="col-md-3 form-control-label">{!!  __('backend.topicDate') !!}
                        </label>
                        <div class="col-md-9">
                            <div>
                                <div class="input-group date">
                                    {!! Form::date('date',Helper::formatDate(), array('placeholder' => '','class' => 'form-control','id'=>'date')) !!}
                                </div>
                            </div>
                        </div>
                    </div>


                    <div id="date_at" class="form-group row displayNone">
                        <label for="date_at"
                               class="col-md-3 form-control-label">{!!  __('backend.eventAt') !!}
                        </label>
                        <div class="col-md-9">
                            <div>
                                <div class="input-group date">
                                    {!! Form::input('dateTime-local', 'date_at', Helper::formatDateTime(), ['id' => 'date_at', 'class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="from_to_time">

                        <div class="form-group row">
                            <label for="time_start"
                                   class="col-md-3 form-control-label">{!!  __('backend.eventStart') !!}
                            </label>
                            <div class="col-md-9">
                                <div>
                                    <div class="input-group date">
                                        {!! Form::input('dateTime-local', 'time_start', Helper::formatDateTime(), ['id' => 'time_start', 'class' => 'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="time_end"
                                   class="col-md-3 form-control-label">{!!  __('backend.eventEnd') !!}
                            </label>
                            <div class="col-md-9">
                                <div>
                                    <div class="input-group date">
                                        {!! Form::input('dateTime-local', 'time_end', Helper::formatDateTime(), ['id' => 'time_end', 'class' => 'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="from_to_date" class="displayNone">

                        <div class="form-group row">
                            <label for="date_start"
                                   class="col-md-3 form-control-label">{!!  __('backend.eventStart2') !!}
                            </label>
                            <div class="col-md-9">
                                <div>
                                    <div class="input-group date">
                                        {!! Form::date('date_start',Helper::formatDate(), array('placeholder' => '','class' => 'form-control','id'=>'date_start')) !!}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="date_end"
                                   class="col-md-3 form-control-label">{!!  __('backend.eventEnd2') !!}
                            </label>
                            <div class="col-md-9">
                                <div>
                                    <div class="input-group date">
                                        {!! Form::date('date_end',Helper::formatDate(), array('placeholder' => '','class' => 'form-control','id'=>'date_end')) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="title"
                               class="col-md-3 form-control-label">{!!  __('backend.eventTitle') !!}
                        </label>
                        <div class="col-md-9">
                            {!! Form::text('title','', array('placeholder' => '','class' => 'form-control','id'=>'title','required'=>'')) !!}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="details"
                               class="col-md-3 form-control-label">{!!  __('backend.eventDetails') !!}
                        </label>
                        <div class="col-md-9">
                            {!! Form::textarea('details','', array('placeholder' => '','class' => 'form-control','id'=>'details','rows'=>'3')) !!}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="title"
                               class="col-md-3 form-control-label">{!!  __('backend.eventAddress') !!}
                        </label>
                        <div class="col-md-9">
                            {!! Form::text('address','', array('placeholder' => '','class' => 'form-control','id'=>'address')) !!}
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button"
                        class="btn dark-white p-x-md"
                        data-dismiss="modal">{{ __('backend.cancel') }}</button>
                <button type="submit"
                        class="btn btn-primary p-x-md">{!! __('backend.add') !!}</button>
            </div>
            {{Form::close()}}
        </div><!-- /.modal-content -->
    </div>
</div>
