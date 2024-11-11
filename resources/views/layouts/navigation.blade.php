<nav class="fixed top-0 left-0 right-0 z-50 flex gap-4 shadow navbar bg-base-100">
    <div class="flex items-center flex-1">
        <a class="text-xl font-semibold no-underline link text-base-content/90 link-neutral" href="#">
            FlyonUI
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
                    class="overflow-auto vertical-scrollbar horizontal-scroll rounded-scrollbar text-base-content/80 max-h-56 max-sm:max-w-60">
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
                    <div class="dropdown-item">
                        <div class="avatar">
                            <div class="w-10 rounded-full">
                                <img src="https://cdn.flyonui.com/fy-assets/avatar/avatar-2.png" alt="avatar 2" />
                            </div>
                        </div>
                        <div class="w-60">
                            <h6 class="text-base truncate">Martian added moved Charts & Maps task to the done board.
                            </h6>
                            <small class="truncate text-base-content/50">Today 10:00 AM</small>
                        </div>
                    </div>
                    <div class="dropdown-item">
                        <div class="avatar online-bottom">
                            <div class="w-10 rounded-full">
                                <img src="https://cdn.flyonui.com/fy-assets/avatar/avatar-8.png" alt="avatar 8" />
                            </div>
                        </div>
                        <div class="w-60">
                            <h6 class="text-base truncate">New Message</h6>
                            <small class="truncate text-base-content/50">You have new message from Natalie</small>
                        </div>
                    </div>
                    <div class="dropdown-item">
                        <div class="avatar placeholder">
                            <div class="w-10 p-2 rounded-full bg-neutral text-neutral-content">
                                <span class="icon-[tabler--user] size-full"></span>
                            </div>
                        </div>
                        <div class="w-60">
                            <h6 class="text-base truncate">Application has been approved 🚀</h6>
                            <small class="text-base-content/50 text-wrap">Your ABC project application has been
                                approved.</small>
                        </div>
                    </div>
                    <div class="dropdown-item">
                        <div class="avatar">
                            <div class="w-10 rounded-full">
                                <img src="https://cdn.flyonui.com/fy-assets/avatar/avatar-10.png" alt="avatar 10" />
                            </div>
                        </div>
                        <div class="w-60">
                            <h6 class="text-base truncate">New message from Jane</h6>
                            <small class="text-base-content/50 text-wrap">Your have new message from Jane</small>
                        </div>
                    </div>
                    <div class="dropdown-item">
                        <div class="avatar">
                            <div class="w-10 rounded-full">
                                <img src="https://cdn.flyonui.com/fy-assets/avatar/avatar-3.png" alt="avatar 3" />
                            </div>
                        </div>
                        <div class="w-60">
                            <h6 class="text-base truncate">Barry Commented on App review task.</h6>
                            <small class="truncate text-base-content/50">Today 8:32 AM</small>
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
                        <small class="text-base-content/50">Admin</small>
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
                <li>
                    <a class="dropdown-item" href="#">
                        <span class="icon-[tabler--receipt-rupee]"></span>
                        Billing
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="#">
                        <span class="icon-[tabler--help-triangle]"></span>
                        FAQs
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
