<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <li class="nav-item">
        <router-link to="/dashboard" class="nav-link">
          <i class="nav-icon fas fa-tachometer-alt blue"></i>
          <p>
            Dashboard
          </p>
        </router-link>
      </li>
      @can('isAdmin')
        <li class="nav-item">
          <router-link to="/users" class="nav-link">
            <i class="fa fa-user nav-icon custom-color-2 "></i>
            <p>Accounts</p>
          </router-link>
        </li>
      @endcan

      @can('isAdmin')
      <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
          <i class="nav-icon fa fa-cubes green"></i>
          <p>
            Products
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <router-link to="/products" class="nav-link">
              <i class="nav-icon fas fa-list-ol green"></i>
              <p>
                  All Products
              </p>
            </router-link>
          </li>
          <li class="nav-item">
            <router-link to="/product-package" class="nav-link">
              <i class="nav-icon fas fa-list-ol green"></i>
              <p>
                Package
              </p>
            </router-link>
          </li>
          <li class="nav-item">
            <router-link to="/product-maintenance" class="nav-link">
              <i class="nav-icon fas fa-list-ol green"></i>
              <p>
                  Maintenance
              </p>
            </router-link>
          </li>
        </ul>
      </li>
      <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
          <i class="nav-icon fa fa-credit-card yellow"></i>
          <p>
            Payments
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <router-link to="/online-payments" class="nav-link">
              <i class="nav-icon fas fa-list-ol yellow"></i>
              <p>
                 Online Payments
              </p>
            </router-link>
          </li>
        </ul>
      </li>
      <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
          <i class="nav-icon fa fa-cubes custom-color-1"></i>
          <p>
            Orders
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <router-link to="/website-orders" class="nav-link">
              <i class="nav-icon fas fa-list-ol custom-color-1"></i>
              <p>
                 Website Orders
              </p>
            </router-link>
          </li>
          <li class="nav-item">
            <router-link to="/in-store-orders" class="nav-link">
              <i class="nav-icon fas fa-list-ol custom-color-1"></i>
              <p>
                 In Store Orders
              </p>
            </router-link>
          </li>
        </ul>
      </li>
      <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
          <i class="nav-icon fa fa-book orange"></i>
          <p>
            Report
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">

          <li class="nav-item">
            <router-link to="/sales-report" class="nav-link">
              <i class="nav-icon fa fa-bookmark orange"></i>
              <p>
                Sales Report
              </p>
            </router-link>
          </li>
          <li class="nav-item">
            <router-link to="/delivery-sales-report" class="nav-link">
              <i class="nav-icon fa fa-bookmark orange"></i>
              <p>
                Delivery Sales Report
              </p>
            </router-link>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <router-link to="/settings" class="nav-link">
          <i class="nav-icon fa fa-cogs red"></i>
          <p>
              Maintenance
          </p>
        </router-link>
      </li>
     

      @endcan
      
    </ul>
  </nav>