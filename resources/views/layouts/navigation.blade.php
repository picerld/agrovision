<nav class="fixed top-0 left-0 right-0 z-50 flex gap-4 shadow navbar bg-base-100">
    <div class="flex items-center flex-1">
        <a class="text-xl font-semibold no-underline link text-base-content/90 link-neutral" href="#">
            FlyonUI
        </a>
    </div>
    <div class="flex items-center gap-4 navbar-end">
        <!-- Notification Dropdown -->
        <div class="dropdown relative inline-flex [--auto-close:inside] [--offset:8] [--placement:bottom-end]">
            <button id="notification-dropdown" type="button"
                class="dropdown-toggle btn btn-text btn-circle dropdown-open:bg-base-content/10 size-10"
                aria-haspopup="menu" aria-expanded="false" aria-label="Notification Dropdown">
                <div class="indicator">
                    <span class="rounded-full indicator-item bg-error size-2"></span>
                    <span class="icon-[tabler--bell] text-base-content size-[1.375rem]"></span>
                </div>
            </button>
            <!-- Notifications Dropdown Content -->
            <div class="hidden dropdown-menu dropdown-open:opacity-100 z-[60]" role="menu"
                aria-orientation="vertical" aria-labelledby="notification-dropdown">
                <!-- Notification content goes here -->
            </div>
        </div>

        <!-- Profile Dropdown -->
        <div class="dropdown relative inline-flex [--auto-close:inside] [--offset:8] [--placement:bottom-end]">
            <button id="profile-dropdown" type="button" class="flex items-center dropdown-toggle" aria-haspopup="menu"
                aria-expanded="false" aria-label="Profile Dropdown">
                <div class="avatar">
                    <div class="size-9.5 rounded-full">
                        <img src="https://cdn.flyonui.com/fy-assets/avatar/avatar-1.png" alt="User avatar" />
                    </div>
                </div>
            </button>
            <!-- Profile Dropdown Content -->
            <ul class="hidden dropdown-menu dropdown-open:opacity-100 min-w-60 z-[60]" role="menu"
                aria-orientation="vertical" aria-labelledby="profile-dropdown">
                <!-- Profile content goes here -->
            </ul>
        </div>
    </div>
</nav>
