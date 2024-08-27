<div class="main-sidebar">
  <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
          <a href="{{ route('admin_dashboard') }}">Admin Panel</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
          <a href="{{ route('admin_dashboard') }}"></a>
      </div>

      <ul class="sidebar-menu">

          <li class="{{ Request::is('admin/dashboard') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_dashboard') }}" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Dashboard"><i class="fas fa-hand-point-right"></i> <span>Dashboard</span></a></li>

          <li class="nav-item dropdown {{ (Request::is('admin/home-page') || Request::is('admin/faq-page') || Request::is('admin/blog-page') || Request::is('admin/term-page') || Request::is('admin/privacy-page') || Request::is('admin/contact-page') || Request::is('admin/job-category-page') || Request::is('admin/pricing-page') || Request::is('admin/other-page'))  ? 'active' : '' }}">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-hand-point-right"></i><span>Page Settings</span></a>
              <ul class="dropdown-menu">
                  <li class="{{ Request::is('admin/home-page') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_home_page') }}"><i class="fas fa-angle-right"></i>Home</a></li>
                  <li class="{{ Request::is('admin/faq-page') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_faq_page') }}"><i class="fas fa-angle-right"></i>FAQ</a></li>
                  <li class="{{ Request::is('admin/blog-page') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_blog_page') }}"><i class="fas fa-angle-right"></i>Blog</a></li>
                  <li class="{{ Request::is('admin/term-page') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_term_page') }}"><i class="fas fa-angle-right"></i>Terms of Use</a></li>
                  <li class="{{ Request::is('admin/privacy-page') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_privacy_page') }}"><i class="fas fa-angle-right"></i>Privacy Policy</a></li>
                  <li class="{{ Request::is('admin/contact-page') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_contact_page') }}"><i class="fas fa-angle-right"></i>Contact</a></li>
                  <li class="{{ Request::is('admin/job-category-page') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_job_category_page') }}"><i class="fas fa-angle-right"></i>Job Category</a></li>
                  <li class="{{ Request::is('admin/pricing-page') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_pricing_page') }}"><i class="fas fa-angle-right"></i>Pricing</a></li>
                  <li class="{{ Request::is('admin/other-page') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_other_page') }}"><i class="fas fa-angle-right"></i>Others</a></li>
              </ul>
          </li>

          <li class="nav-item dropdown {{ Request::is('admin/job-category/*') || Request::is('admin/job-location/*') || Request::is('admin/job-type/*') || Request::is('admin/job-experience/*') ? 'active' : '' }}">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-hand-point-right"></i><span>Job Section</span></a>
            <ul class="dropdown-menu">
                <li class="{{ Request::is('admin/job-category/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_job_category') }}"><i class="fas fa-angle-right"></i>Job Category</a></li>
                <li class="{{ Request::is('admin/job-location/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_job_location') }}"><i class="fas fa-angle-right"></i>Job Location</a></li>
                <li class="{{ Request::is('admin/job-type/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_job_type') }}"><i class="fas fa-angle-right"></i>Job Type</a></li>
                <li class="{{ Request::is('admin/job-experience/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_job_experience') }}"><i class="fas fa-angle-right"></i>Job Experience</a></li>
            </ul>
        </li>

        {{-- Why Choose Us --}}
          <li class="{{ Request::is('admin/why-choose/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_why_choose') }}" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Why Choose Us"><i class="fas fa-hand-point-right"></i> <span>Why Choose Us</span></a></li>

          {{-- Testimonials --}}
          <li class="{{ Request::is('admin/testimonial/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_testimonial') }}" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Testimonials"><i class="fas fa-hand-point-right"></i> <span>Testimonials</span></a></li>

          {{-- Post --}}
          <li class="{{ Request::is('admin/post/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_post') }}" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Posts"><i class="fas fa-hand-point-right"></i> <span>Blog Posts</span></a></li>

          {{-- FAQ --}}
          <li class="{{ Request::is('admin/faq/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_faq') }}" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="FAQs"><i class="fas fa-hand-point-right"></i> <span>FAQs</span></a></li>

          {{-- Package --}}
          <li class="{{ Request::is('admin/package/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_package') }}" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Packages"><i class="fas fa-hand-point-right"></i> <span>Package</span></a></li>


      </ul>
  </aside>
</div>