@extends('admin.layout')
@section('content')
    @php
    $posts = 1; $users = 1; $subscribers = 1; $views = 1;
    @endphp
    <div class="app-main__inner">
        <div class="main-index">
            <div class="row">
                <div class="col-lg-6 col-xl-4">
                    <div class="card mb-3 widget-content bg-night-fade">
                        <div class="widget-content-wrapper text-white">
                            <div class="widget-content-left">
                                <div class="widget-heading">Всего постов</div>
                                <div class="widget-subheading">За весь период</div>
                            </div>
                            <div class="widget-content-right">
                                <div class="widget-numbers text-white"><span>{{ $posts }}</span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-4">
                    <div class="card mb-3 widget-content bg-arielle-smile">
                        <div class="widget-content-wrapper text-white">
                            <div class="widget-content-left">
                                <div class="widget-heading">Всего пользователей</div>
                                <div class="widget-subheading">Зарегистрированные пользователи</div>
                            </div>
                            <div class="widget-content-right">
                                <div class="widget-numbers text-white"><span>{{ $users }}</span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-4">
                    <div class="card mb-3 widget-content bg-premium-dark">
                        <div class="widget-content-wrapper text-white">
                            <div class="widget-content-left">
                                <div class="widget-heading">Всего подписчиков</div>
                                <div class="widget-subheading">Люди, получающие новости от нас</div>
                            </div>
                            <div class="widget-content-right">
                                <div class="widget-numbers text-warning"><span>{{ $subscribers }}</span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-4">
                    <div class="card mb-3 widget-content bg-happy-green">
                        <div class="widget-content-wrapper text-white">
                            <div class="widget-content-left">
                                <div class="widget-heading">Всего просмотров</div>
                                <div class="widget-subheading">Просмотры постов</div>
                            </div>
                            <div class="widget-content-right">
                                <div class="widget-numbers text-dark"><span>{{ $views }}</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="divider mt-0" style="margin-bottom: 30px;"></div>
        </div>
@endsection