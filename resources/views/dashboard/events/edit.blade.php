@if($EStatus=="edit")
    <div id="mmn-edit" class="modal fade"
         data-backdrop="true">
        <div class="modal-dialog" id="animate">
            <div class="modal-content">
                <div class="modal-header">

                    <h5 class="modal-title"><i class="material-icons">&#xe3c9;</i> {{ __('backend.edit') }}
                    </h5>
                </div>
                {{Form::open(['route'=>['calendarUpdate',$EditEvent->id],'method'=>'POST', 'files' => true])}}
                <div class="modal-body p-lg">
                    <div class="p-a">
                        <div class="form-group row">
                            <label for="type"
                                   class="col-md-3 form-control-label">{!!  __('backend.eventType') !!}</label>
                            <div class="col-md-9">
                                <div class="radio">
                                    <label class="ui-check ui-check-md text-danger" id="etype2l">
                                        {!! Form::radio('type','2',($EditEvent->type ==2) ? true : false, array('id' => 'edit_type2','class'=>'has-value')) !!}
                                        <i class="dark-white"></i>
                                        <strong>{!!  __('backend.eventEvent') !!}</strong>
                                    </label>
                                    &nbsp;
                                    <label class="ui-check ui-check-md text-success" id="etype1l">
                                        {!! Form::radio('type','1',($EditEvent->type ==1) ? true : false, array('id' => 'edit_type1','class'=>'has-value')) !!}
                                        <i class="dark-white"></i>
                                        <strong>{!!  __('backend.eventMeeting') !!}</strong>
                                    </label>
                                    &nbsp;
                                    <label class="ui-check ui-check-md" id="etype0l">
                                        {!! Form::radio('type','0',($EditEvent->type ==0) ? true : false, array('id' => 'edit_type0','class'=>'has-value')) !!}
                                        <i class="dark-white"></i>
                                        <strong>{!!  __('backend.eventNote') !!}</strong>
                                    </label>
                                    &nbsp;
                                    <label class="ui-check ui-check-md text-info" id="etype3l">
                                        {!! Form::radio('type','3',($EditEvent->type ==3) ? true : false, array('id' => 'edit_type3','class'=>'has-value')) !!}
                                        <i class="dark-white"></i>
                                        <strong>{!!  __('backend.eventTask') !!}</strong>
                                    </label>

                                </div>
                            </div>
                        </div>

                        <div id="e_date"
                             class="form-group row  {!! ($EditEvent->type !=0) ? "displayNone":"" !!}">
                            <label for="title"
                                   class="col-md-3 form-control-label">{!!  __('backend.topicDate') !!}
                            </label>
                            <div class="col-md-9">
                                <div>
                                    <div class="input-group date">
                                        {!! Form::date('date',Helper::formatDate($EditEvent->start_date), array('placeholder' => '','class' => 'form-control','id'=>'edit_date')) !!}
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div id="e_date_at"
                             class="form-group row {!! ($EditEvent->type !=1) ? "displayNone":"" !!}">
                            <label for="date_at"
                                   class="col-md-3 form-control-label">{!!  __('backend.eventAt') !!}
                            </label>
                            <div class="col-md-9">
                                <div>
                                    <div class="input-group date">
                                        {!! Form::input('dateTime-local', 'date_at', Helper::formatDateTime($EditEvent->start_date), ['id' => 'edit_date_at', 'class' => 'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="e_from_to_time" {!! ($EditEvent->type !=2) ? "class='displayNone'":"" !!}>

                            <div class="form-group row">
                                <label for="time_start"
                                       class="col-md-3 form-control-label">{!!  __('backend.eventStart') !!}
                                </label>
                                <div class="col-md-9">
                                    <div>
                                        <div class="input-group date">
                                            {!! Form::input('dateTime-local', 'time_start', Helper::formatDateTime($EditEvent->start_date), ['id' => 'edit_time_start', 'class' => 'form-control']) !!}
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
                                            {!! Form::input('dateTime-local', 'time_end', Helper::formatDateTime($EditEvent->end_date), ['id' => 'edit_time_end', 'class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="e_from_to_date" {!! ($EditEvent->type !=3) ? "class='displayNone'":"" !!}>

                            <div class="form-group row">
                                <label for="date_start"
                                       class="col-md-3 form-control-label">{!!  __('backend.eventStart2') !!}
                                </label>
                                <div class="col-md-9">
                                    <div>
                                        <div class="input-group date">
                                            {!! Form::date('date_start',Helper::formatDate($EditEvent->start_date), array('placeholder' => '','class' => 'form-control','id'=>'edit_date_start')) !!}
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
                                            {!! Form::date('date_end',Helper::formatDate($EditEvent->end_date), array('placeholder' => '','class' => 'form-control','id'=>'edit_date_end')) !!}
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
                                {!! Form::text('title',$EditEvent->title, array('placeholder' => '','class' => 'form-control','id'=>'edit_title','required'=>'')) !!}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="details"
                                   class="col-md-3 form-control-label">{!!  __('backend.eventDetails') !!}
                            </label>
                            <div class="col-md-9">
                                {!! Form::textarea('details',$EditEvent->details, array('placeholder' => '','class' => 'form-control','id'=>'edit_details','rows'=>'3')) !!}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="title"
                                class="col-md-3 form-control-label">{!!  __('backend.eventAddress') !!}
                            </label>
                            <div class="col-md-9">
                                {!! Form::text('address',$EditEvent->address, array('placeholder' => '','class' => 'form-control','id'=>'address')) !!}
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">

                    <button class="btn btn-sm warning float-left" data-toggle="modal"
                            data-target="#m-delete" ui-toggle-class="bounce"
                            ui-target="#animate" data-dismiss="modal">
                        <small><i class="material-icons">&#xe872;</i> {{ __('backend.eventDelete') }}
                        </small>
                    </button>

                    <button type="button"
                            class="btn dark-white p-x-md"
                            data-dismiss="modal">{{ __('backend.cancel') }}</button>
                    <button type="submit"
                            class="btn btn-primary p-x-md">{{ __('backend.save') }}</button>
                </div>
                {{Form::close()}}
            </div><!-- /.modal-content -->
        </div>
    </div>

    <!-- Delete modal -->
    <div id="m-delete" class="modal fade" data-backdrop="true">
        <div class="modal-dialog" id="animate">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('backend.confirmation') }}</h5>
                </div>
                <div class="modal-body text-center p-lg">
                    <p>
                        {{ __('backend.confirmationDeleteMsg') }}
                        <br>
                        <strong>[ {{ $EditEvent->title }} ]</strong>
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn dark-white p-x-md"
                            data-dismiss="modal" data-toggle="modal"
                            data-target="#mmn-edit" ui-toggle-class="bounce"
                            ui-target="#animate">{{ __('backend.no') }}</button>
                    <a href="{{ route("calendarDestroy",["id"=>$EditEvent->id]) }}"
                       class="btn danger p-x-md">{{ __('backend.yes') }}</a>
                </div>
            </div><!-- /.modal-content -->
        </div>
    </div>
    <!-- / .modal -->
@endif
