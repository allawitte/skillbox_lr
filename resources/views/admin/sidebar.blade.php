<div class="scrollbar-sidebar">
    <div class="app-sidebar__inner">
        <ul class="vertical-nav-menu">
            <li class="{{ Request::routeIs('/admin/users') ? 'active' : '' }}">
                <a href="/admin/users">
                    <i class="metismenu-icon pe-7s-users"></i>
                    Пользователи
                </a>
            </li>
            <li class="{{ Request::routeIs('/admin/posts') ? 'active' : '' }}">
                <a href="/admin/posts">
                    <i class="metismenu-icon pe-7s-news-paper"></i>
                    Статьи
                </a>
            </li>
            <li class="{{ Request::routeIs('/admin/subscriptions') ? 'active' : '' }}">
                <a href="/admin/subscriptions">
                    <i class="metismenu-icon pe-7s-mail-open-file"></i>
                    Подписки
                </a>
            </li>
            <li class="{{ Request::routeIs('/admin/comments') ? 'active' : '' }}">
                <a href="/admin/comments">
                    <i class="metismenu-icon pe-7s-comment"></i>
                    Комментарии
                </a>
            </li>
            <li class="{{ Request::routeIs('/admin/pages') ? 'active' : '' }}">
                <a href="/admin/pages">
                    <i class="metismenu-icon pe-7s-albums"></i>
                    Статичные страницы
                </a>
            </li>
            <li class="{{ Request::routeIs('/admin/settings') ? 'active' : '' }}">
                <a href="/admin/settings">
                    <i class="metismenu-icon pe-7s-tools"></i>
                    Настройки
                </a>
            </li>
        </ul>
    </div>
</div>