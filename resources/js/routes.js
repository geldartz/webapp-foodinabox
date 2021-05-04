export default [
    { path: '/dashboard', component: require('./components/Dashboard.vue').default },
    { path: '/developer', component: require('./components/Developer.vue').default },
    { path: '/users', component: require('./components/Users.vue').default },
    { path: '/maintenance', component: require('./components/Admin/Maintenance.vue').default },
    { path: '/products', component: require('./components/Admin/Product/Products.vue').default },
    { path: '/product-package', component: require('./components/Admin/Product/Package.vue').default },
    { path: '/product-maintenance', component: require('./components/Admin/Product/Maintenance.vue').default },
    { path: '/online-payments', component: require('./components/Admin/Payments/Online.vue').default },
    { path: '/website-orders', component: require('./components/Admin/Orders/Website.vue').default },
    { path: '/in-store-orders', component: require('./components/Admin/Orders/Store.vue').default },
    { path: '/sales-report', component: require('./components/Admin/Reports/Sales.vue').default },
    { path: '/delivery-sales-report', component: require('./components/Admin/Reports/Delivery.vue').default },
    
    

    { path: '*', component: require('./components/NotFound.vue').default }
];
