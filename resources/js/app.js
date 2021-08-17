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

Vue.component('add-publiclottery-component', require('./components/company/AddLotteryCompanyComponent.vue').default);
Vue.component('add-bookmarkerscompany-component', require('./components/company/AddBookmarkersCompanyComponent.vue').default);
Vue.component('add-publicgamingcompany-component', require('./components/company/AddPublicgamingsCompanyComponent.vue').default);



Vue.component('add-userbookmarker-component', require('./components/bookmarker/AddUserBookmarkerComponent.vue').default);

Vue.component('add-bookmarker-component', require('./components/bookmarker/AddBookmarkerComponent.vue').default);
Vue.component('upload-bookmarker-component', require('./components/bookmarker/UploadBookmarkerComponent.vue').default);


Vue.component('add-userpubliclotteryrecord-component', require('./components/publiclottery/UserAddPublicLotteryComponent.vue').default);

Vue.component('add-publiclotteryrecord-component', require('./components/publiclottery/AddPublicLotteryComponent.vue').default);
Vue.component('add-publicgaming-component', require('./components/publicgaming/AddpublicgamingComponent.vue').default);
Vue.component('upload-publicgaming-component', require('./components/publicgaming/UploadpublicgamingComponent.vue').default);
Vue.component('add-userpublicgaming-component', require('./components/publicgaming/UserAddpublicgamingComponent.vue').default);


Vue.component('add-adminuser-component', require('./components/adminuser/AddAdminuserComponent.vue').default);


Vue.component('edit-publicgaming-component', require('./components/publicgaming/EditpublicgamingComponent.vue').default);
Vue.component('view-publicgaming-component', require('./components/publicgaming/ViewpublicgamingComponent.vue').default);

 Vue.component('edit-bookmarker-component', require('./components/bookmarker/EditBookmarkerComponent.vue').default);
 Vue.component('edit-publiclottery-component', require('./components/publiclottery/EditPubliclotteryComponent.vue').default);
 Vue.component('view-publiclottery-component', require('./components/publiclottery/ViewPubliclotteryComponent.vue').default);
 Vue.component('upload-publiclottery-component', require('./components/publiclottery/UploadPubliclotteryComponent.vue').default);


 Vue.component('view-bookmarker-component', require('./components/bookmarker/ViewBookmarkerComponent.vue').default);
 Vue.component('add-categorytype-component', require('./components/categorytypes/AddCategoryTypeComponent.vue').default);
 Vue.component('edit-bookmarkercompany-component', require('./components/company/EditBookmarkercompanyComponent.vue').default);
 Vue.component('view-bookmarkercompany-component', require('./components/company/ViewBookmarkercompanyComponent.vue').default);

 Vue.component('change_password-user-component', require('./components/user/ChangePasswordComponent.vue').default);

 Vue.component('bookmarkers_good_table_component', require('./components/bookmarker/VueTableBookmarkers.vue').default);

 Vue.component('edit-bookmarkers-component', require('./components/bookmarker/EditBookmarkerComponent.vue').default);

 Vue.component('publiclottery_good_table_component', require('./components/publiclottery/VueTablePublicLottery.vue').default);
 Vue.component('publicgaming_good_table_component', require('./components/publicgaming/VueTableGamings.vue').default);

 Vue.component('shop_good_table_component', require('./components/shop/VueTableShop.vue').default);

 Vue.component('add-shop-component', require('./components/shop/AddShopComponent.vue').default);
 Vue.component('edit-shop-component', require('./components/shop/EditshopComponent.vue').default);
 Vue.component('view-shop-component', require('./components/shop/ViewShopComponent.vue').default);
 
 Vue.component('add-publiclotteryshop-component', require('./components/shoppubliclottery/AddPubliclotteryShopComponent.vue').default);
 Vue.component('edit-publiclotteryshop-component', require('./components/shoppubliclottery/EditshopComponent.vue').default);
 Vue.component('view-publiclotteryshop-component', require('./components/shoppubliclottery/ViewShopComponent.vue').default);
 
 Vue.component('add-publicgamingshop-component', require('./components/shoppublicgaming/AddPublicGamingShopComponent.vue').default);
 Vue.component('edit-publicgamingshop-component', require('./components/shoppublicgaming/EditPublicGamingShopComponent.vue').default);
 Vue.component('view-publicgamingshop-component', require('./components/shoppublicgaming/ViewPublicGamingShopComponent.vue').default);
 

Vue.component('add-sendsms-component', require('./components/sendsms/SendSms.vue').default);
Vue.component('add-sendsms-tocontact-component', require('./components/sendsms/SendSmsToContact.vue').default);
Vue.component('add-send-bulk-sms-component', require('./components/sendsms/SendBulkSms.vue').default);

Vue.component('add-lotteryshop-component', require('./components/publiclottery/AddLotteryShopComponent.vue').default);


Vue.component('accounts_good_table_component', require('./components/accounts/Accounts_Good_Table_Component.vue').default);
Vue.component('add-accounts-component', require('./components/accounts/AddAccountsComponent.vue').default);
Vue.component('edit-accounts-component', require('./components/accounts/EditAccountsComponent.vue').default);
Vue.component('view-accounts-component', require('./components/accounts/ViewAccountsComponent.vue').default);
Vue.component('add-user-accounts-component', require('./components/accounts/Add_User_AccountsComponent.vue').default);

Vue.component('confirm-task-component', require('./components/Task/ReplyTaskComponent.vue').default);

Vue.component('add-registry-component', require('./components/Registry/RegistryComponent.vue').default);

Vue.component('add-filing-registry-component', require('./components/Registry/FilingRegistryComponent.vue').default);
Vue.component('add-assign-registry-component', require('./components/Registry/AssignRegistryComponent.vue').default);



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


import VueGoodTablePlugin from 'vue-good-table';

// import the styles
import 'vue-good-table/dist/vue-good-table.css'

Vue.use(VueGoodTablePlugin);
