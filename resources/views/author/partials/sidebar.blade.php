<div class="card mt-2 bg-light-green d-none d-lg-block">
  <div class="card-header pb-0 pt-2">
      <h4>Quick Access</h4>
  </div>
  <div class="card-body p-1 bg-body-green">
        <a href="{{ route('member.sent-message.index') }}" class="nav-link pb-1 form-label {{Request::is('member/sent-message*') ? 'bg-white border':''}}">
            <p><i class="nav-icon fas fa-paper-plane"></i> 
                Sent Message 
                <span class="badge border">
                    {{ \App\Models\Admin\PrivateMessages::where('from_id', 3)->count() }}
                </span>
            </p>
        </a>
        <a href="{{ route('member.receive-message.index') }}" class="nav-link pt-1 form-label {{Request::is('member/receive-message*') ? 'bg-white border':''}}">
            <p><i class="nav-icon far fa-comments"></i> 
                Receive Message
                <span class="badge border">
                    {{ \App\Models\Admin\PrivateMessages::where('to_id', 3)->count() }}
                </span>
            </p>
        </a>
        <hr class="m-0 p-0">
        <a href="{{ route('member.image-access.index') }}" class="nav-link pb-1 form-label {{Request::is('member/image-access*') ? 'bg-white border':''}}">
            <p><i class="nav-icon fas fa-images"></i> 
                Sent Image Request
                <span class="badge border">
                    {{ \App\Models\Admin\ImageAccess::where('img_req_from_user', 3)->count() }}
                </span>
            </p>
        </a>
        <a href="{{ route('member.image-request-receive.index') }}" class="nav-link pt-1 form-label {{Request::is('member/image-request-receive*') ? 'bg-white border':''}}">
            <p><i class="nav-icon fas fa-images"></i> 
                Received Image Request
                <span class="badge border">
                    {{ \App\Models\Admin\ImageAccess::where('img_req_to_user', 3)->count() }}
                </span>
            </p>
        </a>
        <hr class="m-0 p-0">
        <a href="{{ route('member.sent-proposal.index') }}" class="nav-link pb-1 form-label {{Request::is('member/sent-proposal*') ? 'bg-white border':''}}">
            <p><i class="nav-icon fa fa-ring"></i> 
                Sent Proposal
                <span class="badge border">
                    {{ \App\Models\Admin\Proposal::where('sent_proposal_user', 3)->count() }}
                </span>
            </p>
        </a>
        <a href="{{ route('member.receive-proposal.index') }}" class="nav-link pt-1 form-label {{Request::is('member/receive-proposal*') ? 'bg-white border':''}}">
            <p><i class="nav-icon fa fa-ring"></i> 
                Received Proposal
                <span class="badge border">
                   {{ \App\Models\Admin\Proposal::where('receive_proposal_user', 3)->count() }}
                </span>
            </p>
        </a>
  </div>
</div>

<div class="card mt-2 mb-2 bg-light-green d-none d-lg-block">
  <div class="card-header pb-0 pt-2">
      <h4>Profile  (<a href="{{ route('member.my_biodata',3 ) }}">My Biodata</a>)</h4>
  </div>
  <div class="card-body p-1 bg-body-green">
        <a href="{{ route('member.basic-info.index') }}" class="nav-link form-label {{Request::is('member/basic-info*') ? 'bg-white border':''}}">
            <p><i class="nav-icon fas fa-user"></i> Basic Information</p>
        </a>
        <a href="{{ route('member.personal-info.index') }}" class="nav-link form-label {{Request::is('member/personal-info*') ? 'bg-white border':''}}">
            <p><i class="nav-icon fas fa-edit"></i> Personal Information</p>
        </a>
        <a href="{{ route('member.images.index') }}" class="nav-link form-label {{Request::is('member/images*') ? 'bg-white border':''}}">
            <p><i class="nav-icon fas fa-images"></i> Set Images</p>
        </a>
        <a href="{{ route('member.preference.index') }}" class="nav-link form-label {{Request::is('member/preference*') ? 'bg-white border':''}}">
            <p><i class="nav-icon fas fa-heart"></i> Preference</p>
        </a>
  </div>
</div>


<!-- <div class="mt-2 p-2 bg-light-green">
    
    <p class="nav-header">Quick Access</p>
    <a href="{{ route('member.sent-message.index') }}" class="nav-link {{Request::is('member/sent-message*') ? 'bg-white border':''}}">
        <p><i class="nav-icon fas fa-paper-plane"></i> Sent Message</p>
    </a>
    <a href="{{ route('member.receive-message.index') }}" class="nav-link {{Request::is('member/receive-message*') ? 'bg-white border':''}}">
        <p><i class="nav-icon far fa-comments"></i> Recieved Message</p>
    </a>

    <p class="nav-header">Profile</p>
    <a href="{{ route('member.basic-info.index') }}" class="nav-link {{Request::is('member/basic-info*') ? 'bg-white border':''}}">
        <p><i class="nav-icon fas fa-user"></i> Basic Information</p>
    </a>
    <a href="{{ route('member.personal-info.index') }}" class="nav-link {{Request::is('member/personal-info*') ? 'bg-white border':''}}">
        <p><i class="nav-icon fas fa-edit"></i> Personal Information</p>
    </a>
    <a href="{{ route('member.images.index') }}" class="nav-link {{Request::is('member/images*') ? 'bg-white border':''}}">
        <p><i class="nav-icon fas fa-images"></i> Set Images</p>
    </a>
    <a href="{{ route('member.preference.index') }}" class="nav-link {{Request::is('member/preference*') ? 'bg-white border':''}}">
        <p><i class="nav-icon fas fa-heart"></i> Preference</p>
    </a>
</div> -->


<aside class="sidebar d-lg-none">
    <div class="side-inner">
        <div class="counter_">
            <div class="card mt-2 bg-light-green">
            <div class="card-header pb-0 pt-2">
                <h4>Quick Access</h4>
            </div>
            <div class="card-body p-1 bg-body-green">
                    <a href="{{ route('member.sent-message.index') }}" class="nav-link pb-1 form-label {{Request::is('member/sent-message*') ? 'bg-white border':''}}">
                        <p><i class="nav-icon fas fa-paper-plane"></i> 
                            Sent Message 
                            <span class="badge border">
                                {{ \App\Models\Admin\PrivateMessages::where('from_id', 3)->count() }}
                            </span>
                        </p>
                    </a>
                    <a href="{{ route('member.receive-message.index') }}" class="nav-link pt-1 form-label {{Request::is('member/receive-message*') ? 'bg-white border':''}}">
                        <p><i class="nav-icon far fa-comments"></i> 
                            Receive Message
                            <span class="badge border">
                                {{ \App\Models\Admin\PrivateMessages::where('to_id', 3)->count() }}
                            </span>
                        </p>
                    </a>
                    <hr class="m-0 p-0">
                    <a href="{{ route('member.image-access.index') }}" class="nav-link pb-1 form-label {{Request::is('member/image-access*') ? 'bg-white border':''}}">
                        <p><i class="nav-icon fas fa-images"></i> 
                            Sent Image Request
                            <span class="badge border">
                                {{ \App\Models\Admin\ImageAccess::where('img_req_from_user', 3)->count() }}
                            </span>
                        </p>
                    </a>
                    <a href="{{ route('member.image-request-receive.index') }}" class="nav-link pt-1 form-label {{Request::is('member/image-request-receive*') ? 'bg-white border':''}}">
                        <p><i class="nav-icon fas fa-images"></i> 
                            Received Image Request
                            <span class="badge border">
                                {{ \App\Models\Admin\ImageAccess::where('img_req_to_user', 3)->count() }}
                            </span>
                        </p>
                    </a>
                    <hr class="m-0 p-0">
                    <a href="{{ route('member.sent-proposal.index') }}" class="nav-link pb-1 form-label {{Request::is('member/sent-proposal*') ? 'bg-white border':''}}">
                        <p><i class="nav-icon fa fa-ring"></i> 
                            Sent Proposal
                            <span class="badge border">
                                {{ \App\Models\Admin\Proposal::where('sent_proposal_user', 3)->count() }}
                            </span>
                        </p>
                    </a>
                    <a href="{{ route('member.receive-proposal.index') }}" class="nav-link pt-1 form-label {{Request::is('member/receive-proposal*') ? 'bg-white border':''}}">
                        <p><i class="nav-icon fa fa-ring"></i> 
                            Received Proposal
                            <span class="badge border">
                            {{ \App\Models\Admin\Proposal::where('receive_proposal_user', 3)->count() }}
                            </span>
                        </p>
                    </a>
            </div>
            </div>

            <div class="card mt-2 mb-2 bg-light-green">
            <div class="card-header pb-0 pt-2">
                <h4>Profile</h4>
            </div>
            <div class="card-body p-1 bg-body-green">
                    <a href="{{ route('member.basic-info.index') }}" class="nav-link form-label {{Request::is('member/basic-info*') ? 'bg-white border':''}}">
                        <p><i class="nav-icon fas fa-user"></i> Basic Information</p>
                    </a>
                    <a href="{{ route('member.personal-info.index') }}" class="nav-link form-label {{Request::is('member/personal-info*') ? 'bg-white border':''}}">
                        <p><i class="nav-icon fas fa-edit"></i> Personal Information</p>
                    </a>
                    <a href="{{ route('member.images.index') }}" class="nav-link form-label {{Request::is('member/images*') ? 'bg-white border':''}}">
                        <p><i class="nav-icon fas fa-images"></i> Set Images</p>
                    </a>
                    <a href="{{ route('member.preference.index') }}" class="nav-link form-label {{Request::is('member/preference*') ? 'bg-white border':''}}">
                        <p><i class="nav-icon fas fa-heart"></i> Preference</p>
                    </a>
            </div>
            </div>
        </div>
    </div>
</aside>