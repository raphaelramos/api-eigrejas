
<div class="tab-pane {{  ( Session::get('active_tab') == 'socialTab') ? 'active' : '' }}"
     id="tab-3">
    <div class="p-a-md"><h5><i class="material-icons">&#xe80d;</i>
            &nbsp; {!!  __('backend.siteSocialSettings') !!}</h5></div>
    <div class="p-a-md col-lg-12">

        <div class="form-group">
            <label><i class="fab fa-facebook"></i> &nbsp; {!!  __('backend.facebook') !!}</label>
            {!! Form::text('social_link1',$Setting->social_link1, array('placeholder' => __('backend.facebook'),'class' => 'form-control', 'dir'=>'ltr')) !!}
        </div>

        <div class="form-group">
            <label><i class="fab fa-twitter"></i> &nbsp; {!!  __('backend.twitter') !!}</label>
            {!! Form::text('social_link2',$Setting->social_link2, array('placeholder' => __('backend.twitter'),'class' => 'form-control', 'dir'=>'ltr')) !!}
        </div>

        <div class="form-group">
            <label><i class="fab fa-linkedin"></i> &nbsp; {!!  __('backend.linkedin') !!}</label>
            {!! Form::text('social_link4',$Setting->social_link4, array('placeholder' => __('backend.linkedin'),'class' => 'form-control', 'dir'=>'ltr')) !!}
        </div>

        <div class="form-group">
            <label><i class="fab fa-youtube"></i> &nbsp; {!!  __('backend.youtube') !!}
            </label>
            {!! Form::text('social_link5',$Setting->social_link5, array('placeholder' => __('backend.youtube'),'class' => 'form-control', 'dir'=>'ltr')) !!}
        </div>

        <div class="form-group">
            <label><i class="fab fa-instagram"></i> &nbsp; {!!  __('backend.instagram') !!}
            </label>
            {!! Form::text('social_link6',$Setting->social_link6, array('placeholder' => __('backend.instagram'),'class' => 'form-control', 'dir'=>'ltr')) !!}
        </div>

        <div class="form-group">
            <label><i class="fab fa-tiktok"></i> &nbsp; {!!  __('backend.tiktok') !!}
            </label>
            {!! Form::text('social_link7',$Setting->social_link7, array('placeholder' => __('backend.tiktok'),'class' => 'form-control', 'dir'=>'ltr')) !!}
        </div>

        <div class="form-group">
            <label><i class="fab fa-tumblr"></i> &nbsp; {!!  __('backend.tumblr') !!}</label>
            {!! Form::text('social_link8',$Setting->social_link8, array('placeholder' => __('backend.tumblr'),'class' => 'form-control', 'dir'=>'ltr')) !!}
        </div>

        <div class="form-group">
            <label><i class="fab fa-snapchat"></i> &nbsp; {!!  __('backend.snapchat') !!}</label>
            {!! Form::text('social_link9',$Setting->social_link9, array('placeholder' => __('backend.snapchat'),'class' => 'form-control', 'dir'=>'ltr')) !!}
        </div>

        <div class="form-group">
            <label><i class="fab fa-whatsapp"></i> &nbsp; {!!  __('backend.whatsapp') !!}</label>
            {!! Form::text('social_link10',$Setting->social_link10, array('placeholder' => __('backend.whatsapp'),'class' => 'form-control', 'dir'=>'ltr')) !!}
        </div>

        <div class="form-group">
            <label><i class="fab fa-telegram"></i> &nbsp; {!!  __('backend.telegram') !!}</label>
            {!! Form::text('social_link11',$Setting->social_link11, array('placeholder' => __('backend.telegram'),'class' => 'form-control', 'dir'=>'ltr')) !!}
        </div>

        <div class="form-group">
            <label><i class="fab fa-soundcloud"></i> &nbsp; {!!  __('backend.soundcloud') !!}</label>
            {!! Form::text('social_link12',$Setting->social_link12, array('placeholder' => __('backend.soundcloud'),'class' => 'form-control', 'dir'=>'ltr')) !!}
        </div>

        <div class="form-group">
            <label><i class="fab fa-spotify"></i> &nbsp; {!!  __('backend.spotify') !!}</label>
            {!! Form::text('social_link13',$Setting->social_link13, array('placeholder' => __('backend.spotify'),'class' => 'form-control', 'dir'=>'ltr')) !!}
        </div>

    </div>
</div>
