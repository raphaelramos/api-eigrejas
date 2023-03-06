<div class="tab-pane {{  ( Session::get('active_tab') == 'nomenclaturesSettingsTab') ? 'active' : '' }}"
    id="tab-13">
    <div class="p-a-md"><h5>{!!  __('backend.nomenclaturesSettings') !!}</h5></div>

    <div class="p-a-md col-lg-12">
        <div class="col-lg-6">

            <div class="form-group">
                <label>{!!  __('backend.groupName') !!}</label>
                {!! Form::text('group_name',$WebmasterSetting->group_name, array('id' => 'group_name','class' => 'form-control', 'dir'=>trans('backLang.ltr'))) !!}
            </div>

            <div class="form-group">
                <label>{!!  __('backend.groupsName') !!}</label>
                {!! Form::text('groups_name',$WebmasterSetting->groups_name, array('id' => 'groups_name','class' => 'form-control', 'dir'=>trans('backLang.ltr'))) !!}
            </div>

        </div>
    </div>
</div>
