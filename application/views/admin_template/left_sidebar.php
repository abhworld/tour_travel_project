<div class="sidebar-topbar text-center">
    <a href="dashboard" style="line-height: 54px;font-size: 18px;">Admin Panel</a>
<!--    <i class="fa fa-plane"></i><span class="text">Star Travels</span>-->
</div> <!-- End sidebar-topbar -->
<!-- End sidebar-topbar -->

<div class="side-menu">
    <ul class="navbar-nav">
        <li class="nav-item" id="dashboard-link">
            <a href="dashboard" class="items-list first active">
                <span><i class="fa fa-home link-icon" data-toggle="tooltip" data-html="true" title="Dashboard"></i></span>
                <span class="items-list-text">Dashboard</span>
            </a>
        </li>
        
        <li class="nav-item">
            <a href="#booking" class="items-list" data-toggle="collapse" aria-expanded="false">
                <span><i class="fas fa-suitcase-rolling" data-toggle="tooltip" data-html="true"
                         title="Bookings"></i></span>
                <span class="items-list-text">Booking</span>
                <span><i class="fa fa-chevron-down arrow"></i></span>
            </a>
            <div class="collapse sub-menu" id="booking">
                <a class="items-list1" href="booking-list">All</a>
            </div>
        </li>
        
        <li class="nav-item">
            <a href="#request" class="items-list" data-toggle="collapse" aria-expanded="false">
                <span><i class="fas fa-suitcase-rolling" data-toggle="tooltip" data-html="true"
                         title="Requests"></i></span>
                <span class="items-list-text">Request</span>
                <span><i class="fa fa-chevron-down arrow"></i></span>
            </a>
            <div class="collapse sub-menu" id="request">
                <a class="items-list1" href="request-list">All</a>
            </div>
        </li>
        
        <?php if(has_permission_by_permission_type($this->type, ['Hotel'])) {?>
        
        <li class="nav-item">
            <a href="#Hotel-Listing" class="items-list" data-toggle="collapse" aria-expanded="false">
                <span>
                    <i class="fas fa-hotel" data-toggle="tooltip" data-html="true" title="Hotel"></i>
                </span>
                <span class="items-list-text">Hotel Listing</span>
                <span><i class="fa fa-chevron-down arrow"></i></span>
            </a>
            <div class="collapse sub-menu" id="Hotel-Listing">
                <?php if(has_permission($this->type, 'add-hotel')) {?>
                <a class="items-list3" href="add-hotel">Create</a>
                <?php }?>
                <?php if(has_permission($this->type, 'list-hotel')) {?>
                <a class="items-list3" href="list-hotel">All Hotel</a>
                <?php }?>
            </div><!-- End sub-menu -->
        </li>
        <?php }?>
        
        <?php if(has_permission_by_permission_type($this->type, ['Tour'])) {?>
        <li class="nav-item">
            <a href="#Tour-Listing" class="items-list" data-toggle="collapse" aria-expanded="false">
                <span>
                    <i class="fas fa-torii-gate" data-toggle="tooltip" data-html="true" title="Tour"></i>
                </span>
                <span class="items-list-text">Tour Listing</span>
                <span><i class="fa fa-chevron-down arrow"></i></span>
            </a>
            <div class="collapse sub-menu" id="Tour-Listing">
                <?php if(has_permission($this->type, 'add-tour')) {?>
                <a class="items-list3" href="add-tour">Create</a>
                <?php }?>
                <?php if(has_permission($this->type, 'list-tour')) {?>
                <a class="items-list3" href="list-tour">All Tour</a>
                <?php }?>
            </div><!-- End sub-menu -->
        </li>
        <?php }?>
        
        <li class="nav-item">
            <a href="#Flight-Listing" class="items-list" data-toggle="collapse" aria-expanded="false">
                <span>
                    <i class="fas fa-torii-gate" data-toggle="tooltip" data-html="true" title="Tour"></i>
                </span>
                <span class="items-list-text">Flight Listing</span>
                <span><i class="fa fa-chevron-down arrow"></i></span>
            </a>
            <div class="collapse sub-menu" id="Flight-Listing">
                <a class="items-list3" href="all-airport">All Airport</a>
<!--                <a class="items-list3" href="add-tour">Create</a>
                <a class="items-list3" href="list-tour">All Tour</a>-->
            </div><!-- End sub-menu -->
        </li>
        
        <?php if(has_permission_by_permission_type($this->type, ['Umra'])) {?>
        <li class="nav-item">
            <a href="#Umrah-Listing" class="items-list" data-toggle="collapse" aria-expanded="false">
                <span>
                    <i class="fas fa-torii-gate" data-toggle="tooltip" data-html="true" title="Umrah"></i>
                </span>
                <span class="items-list-text">Umrah Listing</span>
                <span><i class="fa fa-chevron-down arrow"></i></span>
            </a>
            <div class="collapse sub-menu" id="Umrah-Listing">
                <?php if(has_permission($this->type, 'add-umra')) {?>
                <a class="items-list3" href="add-umra">Create</a>
                <?php }?>
                <?php if(has_permission($this->type, 'list-umra')) {?>
                <a class="items-list3" href="list-umra">All Umrah</a>
                <?php }?>
            </div><!-- End sub-menu -->
        </li>
        <?php }?>
        
        <?php if(has_permission_by_permission_type($this->type, ['Hajj'])) {?>
        <li class="nav-item">
            <a href="#Hajj-Listing" class="items-list" data-toggle="collapse" aria-expanded="false">
                <span>
                    <i class="fas fa-torii-gate" data-toggle="tooltip" data-html="true" title="Hajj"></i>
                </span>
                <span class="items-list-text">Hajj Listing</span>
                <span><i class="fa fa-chevron-down arrow"></i></span>
            </a>
            <div class="collapse sub-menu" id="Hajj-Listing">
                <?php if(has_permission($this->type, 'add-hajj')) {?>
                <a class="items-list3" href="add-hajj">Create</a>
                <?php }?>
                <?php if(has_permission($this->type, 'list-hajj')) {?>
                <a class="items-list3" href="list-hajj">All Hajj</a>
                <?php }?>
            </div><!-- End sub-menu -->
        </li>
        <?php }?>
        
        <?php if(has_permission_by_permission_type($this->type, ['Visa'])) {?>
        <li class="nav-item">
            <a href="#Visa-Listing" class="items-list" data-toggle="collapse" aria-expanded="false">
                <span>
                    <i class="fas fa-torii-gate" data-toggle="tooltip" data-html="true" title="Visa"></i>
                </span>
                <span class="items-list-text">Visa Listing</span>
                <span><i class="fa fa-chevron-down arrow"></i></span>
            </a>
            <div class="collapse sub-menu" id="Visa-Listing">
                <?php if(has_permission($this->type, 'add-visa')) {?>
                <a class="items-list3" href="add-visa">Create</a>
                <?php }?>
                <?php if(has_permission($this->type, 'list-visa')) {?>
                <a class="items-list3" href="list-visa">All Visa</a>
                <?php }?>
            </div><!-- End sub-menu -->
        </li>
        <?php }?>
        
        <?php if(has_permission_by_permission_type($this->type, ['Air Ticketing'])) {?>
<!--        <li class="nav-item">
            <a href="#Air-Ticketing-Listing" class="items-list" data-toggle="collapse" aria-expanded="false">
                <span>
                    <i class="fas fa-torii-gate" data-toggle="tooltip" data-html="true" title="Visa"></i>
                </span>
                <span class="items-list-text">Air Ticketing</span>
                <span><i class="fa fa-chevron-down arrow"></i></span>
            </a>
            <div class="collapse sub-menu" id="Air-Ticketing-Listing">
                <?php if(has_permission($this->type, 'add-air-ticket')) {?>
                <a class="items-list3" href="add-air-ticket">Create</a>
                <?php }?>
                <?php if(has_permission($this->type, 'list-air-ticket')) {?>
                <a class="items-list3" href="list-air-ticket">All Air Ticketing</a>
                <?php }?>
            </div>
        </li>-->
        <?php }?>
        
<!--        <li class="nav-item" id="dashboard-link">
            <a href="admin/study-in-abroad" class="items-list first">
                <span><i class="fa fa-graduation-cap link-icon" data-toggle="tooltip" data-html="true" title="Study In Abroad"></i></span>
                <span class="items-list-text">Study In Abroad</span>
            </a>
        </li>
        
        <li class="nav-item" id="dashboard-link">
            <a href="admin/international-job" class="items-list first">
                <span><i class="fa fa-tasks link-icon" data-toggle="tooltip" data-html="true" title="Study In Abroad"></i></span>
                <span class="items-list-text">International Job</span>
            </a>
        </li>-->
        
        <?php if($this->type == 1 || $this->type == 2) {?>
<!--        <li class="nav-item">
            <a href="#slider" class="items-list" data-toggle="collapse" aria-expanded="false">
                <span>
                    <i class="fas fa-user-tie" data-toggle="tooltip" data-html="true" title="Users"></i>
                </span>
                <span class="items-list-text">Slider</span>
                <span><i class="fa fa-chevron-down arrow"></i></span>
            </a>
            <div class="collapse sub-menu" id="slider">
                <a class="items-list1" href="add-slider">Add Slider</a>
                <a class="items-list1" href="slider-list">Slider List</a>
            </div>
        </li>-->
        <?php }?>
        
        
        <?php if($this->type == 1 || $this->type == 2) {?>
        <li class="nav-item">
            <a href="#pages" class="items-list" data-toggle="collapse" aria-expanded="false">
                <span>
                    <i class="fas fa-paragraph" data-toggle="tooltip" data-html="true" title="Users"></i>
                </span>
                <span class="items-list-text">Pages</span>
                <span><i class="fa fa-chevron-down arrow"></i></span>
            </a>
            <div class="collapse sub-menu" id="pages">
                <a class="items-list1" href="admin/home-page">Home</a>
            </div>
            <div class="collapse sub-menu" id="pages">
                <a class="items-list1" href="admin/about-us">About Us</a>
            </div>
            <div class="collapse sub-menu" id="pages">
                <a class="items-list1" href="admin/hotel-content">Hotel</a>
            </div>
            <div class="collapse sub-menu" id="pages">
                <a class="items-list1" href="admin/tour-content">Tour</a>
            </div>
            <div class="collapse sub-menu" id="pages">
                <a class="items-list1" href="admin/visa-content">Visa</a>
            </div>
            <div class="collapse sub-menu" id="pages">
                <a class="items-list1" href="admin/hajj-content">Hajj</a>
            </div>
            <div class="collapse sub-menu" id="pages">
                <a class="items-list1" href="admin/umrah-content">Umrah</a>
            </div>
            <div class="collapse sub-menu" id="pages">
                <a class="items-list1" href="admin/contact-us">Contact Us</a>
            </div>
        </li>
        <?php }?>
        
        <?php if($this->type == 1 || $this->type == 2) {?>
        <li class="nav-item" id="dashboard-link">
            <a href="countries-list" class="items-list first">
                <span><i class="fa fa-flag link-icon" title="Cities"></i></span>
                <span class="items-list-text">Countries</span>
            </a>
        </li>
        
        <li class="nav-item" id="dashboard-link">
            <a href="cities-list" class="items-list first">
                <span><i class="fa fa-building link-icon" title="Countries"></i></span>
                <span class="items-list-text">Cities</span>
            </a>
        </li>
        <?php }?>
<!--        <li class="nav-item">
            <a href="reviews.html" class="items-list">
                <span><i class="fas fa-sync-alt" data-toggle="tooltip" data-html="true"
                         title="Reviews"></i></span>
                <span class="items-list-text">Reviews</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="bookmarks.html" class="items-list">
                <span><i class="far fa-bookmark" data-toggle="tooltip" data-html="true"
                         title="Messages"></i></span>
                <span class="items-list-text">Bookmarks</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="#messages" class="items-list" data-toggle="collapse" aria-expanded="false">
                <span><i class="far fa-envelope" data-toggle="tooltip" data-html="true"
                         title="Messages"></i></span>
                <span class="items-list-text">Messages</span>
                <span><i class="fa fa-chevron-down arrow"></i></span>
            </a>
            <div class="collapse sub-menu" id="messages">
                <a class="items-list1" href="messages-inbox.html">Inbox</a>
                <a class="items-list1" href="messages-compose.html">Compose</a>
                <a class="items-list1" href="messages-details.html">Details</a>
                <a class="items-list1" href="messages-starred.html">Starred</a>
                <a class="items-list1" href="messages-important.html">Important</a>
                <a class="items-list1" href="messages-sent.html">Sent</a>
                <a class="items-list1" href="messages-drafts.html">Drafts</a>
                <a class="items-list1" href="messages-trash.html">Trash</a>
            </div> End sub-menu 
        </li>-->
        <li class="nav-item">
            <a href="#profile" class="items-list" data-toggle="collapse" aria-expanded="false">
                <span><i class="fas fa-building" data-toggle="tooltip" data-html="true"
                         title="Profile"></i></span>
                <span class="items-list-text">Profile</span>
                <span><i class="fa fa-chevron-down arrow"></i></span>
            </a>
            <div class="collapse sub-menu" id="profile">
                <!--<a class="items-list1" href="profile-view-profile.html">View Profile</a>-->
                <!--<a class="items-list1" href="edit-profile">Edit Profile</a>-->
                <?php if($this->type == 1 || $this->type == 2) {?>
                <a class="items-list1" href="edit-company-info">Edit Company Info</a>
                <?php }?>
<!--                <a class="items-list1" href="profile-change-password.html">Change Password

                </a>-->
            </div>
        </li>
    </ul>
</div><!-- End side-menu -->
<!--<div class="side-bar-bottom">
    <ul class="list-unstyled">
        <li class="list-inline-item" data-toggle="tooltip" data-html="true" title="Edit Profile"><a
                href="profile-edit-profile.html"><i class="fas fa-cog"></i></a></li>
        <li class="list-inline-item" data-toggle="tooltip" data-html="true" title="Change Password"><a
                href="profile-change-password.html"><i class="fas fa-key"></i></li>
        <li class="list-inline-item" data-toggle="tooltip" data-html="true" title="Lockscreen">
            <a href="#"><i class="fas fa-unlock"></i></a>
        </li>
        <li class="list-inline-item" data-toggle="tooltip" data-html="true" title="Logout">
            <a href="logout"><i class="fas fa-power-off"></i></a>
        </li>
    </ul>
</div> End side-bar-bottom -->