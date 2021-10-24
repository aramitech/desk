<template>
    <div class="pd-20 card-box mb-30">
        <div class="clearfix mb-20">
            <div class="pull-left">
                <h4 class="text-blue h4">User</h4>
            </div>
            <div class="pull-right">
                <!-- refresh data button -->
                <button @click.prevent="getUsers(page = 1)" class="btn btn-sm btn-round btn-outline-info" :disabled="isDisabled">
                    <div v-if="busy"><i class="fa fa-refresh fa-spin fa-fw"></i> </div>
                    <div v-else><i class="fa fa-refresh"></i> </div>
                </button>
            </div>
        </div>
        <!-- data table -->
        <div class="table-responsive">
            <div v-if="users.total == 0" class="p-3 border border-light text-center">
                Sorry! No User has been added yet.
            </div>
            <table v-else class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">payouts</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">payouts</th>

                    </tr>
                </tfoot>
                <div v-if="busy" class="text-center">Please wait. Loading...<i class="micon fa fa-refresh fa-spin fa-fw"></i></div>
                <tbody v-else>
                    <tr v-for="data in users.data" :key="data.company_id">
                        <td>{{ data.company_id }}</td>
                        <td>{{ data.license_no }}</td>
                       <td>{{ data.license_no }}</td>
                        <td>
                            <button @click="setEditValue(data.company_id,data.license_no,data.sales,data.payouts)" class="btn btn-sm btn-round btn-outline-* btn-info text-white" title="Edit User Detail" data-toggle="modal" :data-target="'#edit'+data.company_id"><i class="icon-copy fa fa-edit"></i></button>
                            <button @click.prevent="deleteItem('deleteuserpath',data.company_id)" class="btn btn-sm btn-round btn-outline-* btn-danger" title="Delete"><i class="icon-copy fa fa-trash-o"></i></button>
                        </td>
                        <!-- edit modal -->
                        <div class="modal fade" :id="'edit'+data.company_id" tabindex="-1" role="dialog" aria-labelledby="myMediumModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myMediumModalLabel">Edit User Details[ {{ data.name }}]</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    </div>
                                    <form method="POST" @submit.prevent="formSubmit"  enctype="multipart/form-data">
                                        <div class="modal-body row">
                                            <div class="form-group col-md-12">
                                            <label> Name</label>
                                            <input class="form-control" name="name" v-model="fields.name" type="text" placeholder="Enter Name" required>
                                            <div v-if="errors && errors.name" class="text-danger">{{ errors.name[0] }}</div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label> Email</label>
                                            <input class="form-control" name="email" v-model="fields.email" type="text" placeholder="Enter email" required>
                                            <div v-if="errors && errors.email" class="text-danger">{{ errors.email[0] }}</div>
                                        </div>
                                        
                                        <div class="form-group col-md-12">
                                            <label> payouts</label>
                                            <input class="form-control" name="payouts" v-model="fields.payouts" type="text" placeholder="Enter payouts" required>
                                            <div v-if="errors && errors.payouts" class="text-danger">{{ errors.payouts[0] }}</div>
                                        </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit"  @click="beforeSubmit('/users/update','User updated succesfully')" class="btn btn-primary" :disabled="isDisabled">
                                                <div v-if="busyWriting"><i class="fa fa-refresh fa-spin fa-fw"></i> Saving</div>
                                                <div v-else> Save</div>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- ./end edit modal -->
                    </tr>
                </tbody>
            </table>
            <!-- data pagination -->
              <pagination :data="users" @pagination-change-page="getUser" :limit=3 align="right">
                <span slot="prev-nav">&lt; Previous</span>
                <span slot="next-nav">Next &gt;</span>
            </pagination>
        </div>
        </div>
        <!-- ./end data table -->
        
        <!-- add modal -->

</template>

<script>
    export default {

        data() {
           return {
            action: '',
            text: '',
            users: [],
            busy: false,
            busy1: false,
            busyWriting:false,
            showModal: false,
            fields: {
                company_id:'',
                license_no:'',
                sales:'',
                payouts:'',
            }
            }
        },

    watch:{
                completed:	function (value) { 
                        this.getUsers();
                        this.completed = false;
                    }
            },
        
        computed: {
            isDisabled(){
                return this.busy || this.busy1 || this.busyWriting;
            },
        },




        methods: {
            getUser(page=1){
                
                this.busy=true;
                axios.get('/desk/public/publicgaminglist?page='+page)
                     .then((response)=>{
                            this.busy=false;
                       this.users = response.data
                 
                     })
                      
            },
            deleteUser() {
                axios.post('/deleteuser/'+this.deleteItems)
                     .then((response) => {
                        this.getUser()
                        this.deleteItems = []
                        this.all_select == true ? 
                             this.all_select = false : this.all_select = true;
                     })
            },
            select_all_via_check_box(){
                if(this.all_select == false){
                    this.all_select = true
                    this.users.forEach(user => {
                      this.deleteItems.push(user.company_id)
                    });
                }else{
                    this.all_select = false
                    this.deleteItems = []
                }
            }
        },
        created() {
            this.getUser()
        }
    }
</script> 