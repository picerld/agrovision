<nav
    class="fixed top-0 left-0 right-0 z-40 navbar bg-base-100 max-sm:rounded-box max-sm:shadow sm:border-b border-base-content/25">
    <button type="button" class="btn btn-text max-sm:btn-square sm:hidden me-2" aria-haspopup="dialog"
        aria-expanded="false" aria-controls="sidebar" data-overlay="#sidebar">
        <span class="icon-[tabler--menu-2] size-5"></span>
    </button>
    <div class="flex items-center flex-1">
        <a class="text-xl font-semibold no-underline link text-base-content/90 link-neutral" href="#">
            Agrovision Technology
        </a>
    </div>
    <div class="flex items-center gap-4 navbar-end">
        <div class="dropdown relative inline-flex [--auto-close:inside] [--offset:8] [--placement:bottom-end]">
            <button id="dropdown-scrollable" type="button"
                class="dropdown-toggle btn btn-text btn-circle dropdown-open:bg-base-content/10 size-10"
                aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                <div class="indicator">
                    <span class="rounded-full indicator-item bg-error size-2"></span>
                    <span class="icon-[tabler--bell] text-base-content size-[1.375rem]"></span>
                </div>
            </button>
            <div class="hidden dropdown-menu dropdown-open:opacity-100" role="menu" aria-orientation="vertical"
                aria-labelledby="dropdown-scrollable">
                <div class="justify-center dropdown-header">
                    <h6 class="text-base text-base-content/90">Notifications</h6>
                </div>
                <div
                    class="overflow-auto vertical-scrollbar horizontal-scrollbar rounded-scrollbar text-base-content/80 max-h-56 max-md:max-w-60">
                    <div class="dropdown-item">
                        <div class="avatar away-bottom">
                            <div class="w-10 rounded-full">
                                <img src="https://cdn.flyonui.com/fy-assets/avatar/avatar-1.png" alt="avatar 1" />
                            </div>
                        </div>
                        <div class="w-60">
                            <h6 class="text-base truncate">Charles Franklin</h6>
                            <small class="truncate text-base-content/50">Accepted your connection</small>
                        </div>
                    </div>
                </div>
                <a href="#" class="justify-center gap-1 dropdown-footer">
                    <span class="icon-[tabler--eye] size-4"></span>
                    View all
                </a>
            </div>
        </div>
        <div class="dropdown relative inline-flex [--auto-close:inside] [--offset:8] [--placement:bottom-end]">
            <button id="dropdown-scrollable" type="button" class="flex items-center dropdown-toggle"
                aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                <div class="avatar">
                    <div class="size-9.5 rounded-full">
                        <img src="https://cdn.flyonui.com/fy-assets/avatar/avatar-1.png" alt="avatar 1" />
                    </div>
                </div>
            </button>
            <ul class="hidden dropdown-menu dropdown-open:opacity-100 min-w-60" role="menu"
                aria-orientation="vertical" aria-labelledby="dropdown-avatar">
                <li class="gap-2 dropdown-header">
                    <div class="avatar">
                        <div class="w-10 rounded-full">
                            <img src="https://cdn.flyonui.com/fy-assets/avatar/avatar-1.png" alt="avatar" />
                        </div>
                    </div>
                    <div>
                        <h6 class="text-base font-semibold text-base-content/90">{{ Auth::user()->name }}</h6>
                        <small class="text-base-content/50">{{ Auth::user()->username }}</small>
                    </div>
                </li>
                <li>
                    <a class="dropdown-item" href="#">
                        <span class="icon-[tabler--user]"></span>
                        My Profile
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="#">
                        <span class="icon-[tabler--settings]"></span>
                        Settings
                    </a>
                </li>
                <li class="gap-2 dropdown-footer">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-error btn-soft btn-block">
                            <span class="icon-[tabler--logout]"></span>
                            Sign out
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
