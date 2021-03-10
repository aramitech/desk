/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('add-user-component', require('./components/user/AddUserComponent.vue').default);
Vue.component('edit-user-component', require('./components/user/EditUserComponent.vue').default);
Vue.component('assignrole-user-component', require('./components/user/AssignRoleComponent.vue').default);

Vue.component('add-company-component', require('./components/company/AddCompanyComponent.vue').default);
Vue.component('add-bookmarkerscompany-component', require('./components/company/AddBookmarkersCompanyComponent.vue').default);
Vue.component('add-publicgamingcompany-component', require('./components/company/AddPublicgamingsCompanyComponent.vue').default);

Vue.component('add-bookmarker-component', require('./components/bookmarker/AddBookmarkerComponent.vue').default);
Vue.component('add-publiclottery-component', require('./components/publiclottery/AddPublicLotteryComponent.vue').default);
Vue.component('add-publicgaming-component', require('./components/publicgaming/AddpublicgamingComponent.vue').default);
Vue.component('add-adminuser-component', require('./components/adminuser/AddAdminuserComponent.vue').default);


Vue.component('edit-publicgaming-component', require('./components/publicgaming/EditpublicgamingComponent.vue').default);
Vue.component('view-publicgaming-component', require('./components/publicgaming/ViewpublicgamingComponent.vue').default);

 Vue.component('edit-bookmarker-component', require('./components/bookmarker/EditBookmarkerComponent.vue').default);
 Vue.component('edit-publiclottery-component', require('./components/publiclottery/EditPubliclotteryComponent.vue').default);
 Vue.component('view-publiclottery-component', require('./components/publiclottery/ViewPubliclotteryComponent.vue').default);
 Vue.component('view-bookmarker-component', require('./components/bookmarker/ViewBookmarkerComponent.vue').default);
 Vue.component('add-categorytype-component', require('./components/categorytypes/AddCategoryTypeComponent.vue').default);
 Vue.component('edit-bookmarkercompany-component', require('./components/company/EditBookmarkercompanyComponent.vue').default);
 Vue.component('view-bookmarkercompany-component', require('./components/company/ViewBookmarkercompanyComponent.vue').default);

 Vue.component('change_password-user-component', require('./components/user/ChangePasswordComponent.vue').default);


 
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
import swal from 'sweetalert';
import DeleteMixin from './components/shared/DeleteMixin';
const app = new Vue({
    el: '#app',
    mixins: [ DeleteMixin ]    
});


