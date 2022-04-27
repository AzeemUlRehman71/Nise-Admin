<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="header-body">
            <!-- Card stats -->
            <div class="row">
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-xl-4 mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Total Users</h5>
                                    <span class="h2 font-weight-bold mb-0">{{$user->count()}}</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                        <i class="fas fa-users"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @foreach($setting as $set)
                    <div class="col-xl-3 col-lg-6">
                        <div class="card card-stats mb-xl-4 mb-4 mb-xl-0">
                            <div class="card-body">
                                <div class="row">
                                 
                                    @php
                                    $name =str_replace('_',' ',ucfirst($set['name']));
                                    $value = str_replace(', ',' - ',ucfirst($set['value']));
                                    @endphp

                                    @if($set['name'] =='BONUS_CREDIT' )
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">{{$name}}</h5>
                                            <span class="h2 font-weight-bold mb-0">{{$value}}</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                                                <i class="fas fa-chart-pie"></i>
                                            </div>
                                        </div>
                                        @elseif($set['name'] =='CHECK_IN_CREDIT')
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">{{$name}}</h5>
                                            <span class="h2 font-weight-bold mb-0">{{ $checkin['checkInStart'].'-'.$checkin['checkInEnd']  }}</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                                                <i class="fas fa-drafting-compass"></i>
                                            </div>
                                        </div>
                                        @elseif($set['name'] =='REFERRAL_CREDIT')
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">{{$name}}</h5>
                                            <span class="h2 font-weight-bold mb-0">{{ $friends['inviteFriendsStart'].'-'.$friends['inviteFriendsEnd']  }}</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                                                <i class="fas fa-user-tag"></i>
                                            </div>
                                        </div>
                                      

                                        @elseif($set['name'] =='STARTING_CREDIT')
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">{{$name}}</h5>
                                            <span class="h2 font-weight-bold mb-0">{{$value}}</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                                                <i class="fas fa-hourglass-start"></i>
                                            </div>
                                        </div>
                                        
                                        @elseif($set['name'] =='WATCH_VIDEOS_CREDIT')
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">{{$name}}</h5>
                                            <span class="h2 font-weight-bold mb-0">{{ $videoad['videoAdStart'].'-'.$videoad['videoAdEnd']  }}</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                                                <i class="fas fa-play-circle"></i>
                                            </div>
                                        </div>
                                        

                                    @endif

                            
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</div>
