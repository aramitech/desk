


<template>
    <div class="modal fade" id="adduser" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Add User</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <form method="POST" @submit.prevent="formSubmit" class="form-group row"  enctype="multipart/form-data">
                    <div class="modal-body">
             <div class="trf">          
  <div class="form-group row">
					<div class="col-md-6">
							<label>Name</label>
							<input class="form-control" name="name" v-model="fields.name" type="text" placeholder="John Doe" required>
                            <div v-if="errors && errors.name" class="text-danger">{{ errors.name[0] }}</div>
						</div>
										<div class="col-md-6">

							<label>Email</label>
							<input class="form-control" name="email" v-model="fields.email" value="" type="email" placeholder="me@example.com" required>
                            <div v-if="errors && errors.email" class="text-danger">{{ errors.email[0] }}</div>
						</div></div>

             <div class="form-group row">
					<div class="col-md-6">
							<label>Personal File No</label>
							<input class="form-control" name="perspnal_file_no" v-model="fields.perspnal_file_no" value="" type="text" placeholder="Personal File No" >
                            <div v-if="errors && errors.perspnal_file_no" class="text-danger">{{ errors.perspnal_file_no[0] }}</div>
						</div>

                        							<div class="col-md-6">

							<label>Department</label>
  <multiselect  name="departments_id" v-model="fields.departments_id"   label="department_name" placeholder="Select Department" :options="department_names"  :allow-empty="true" :multiple="false" :hide-selected="true" :max-height="150" @input="onChange">
              
            </multiselect>                            <div v-if="errors && errors.departments_id" class="text-danger">{{ errors.departments_id[0] }}</div>
						</div></div>
    <div class="form-group row">
					<div class="col-md-4">
							<label>Phone</label>
							<input class="form-control" name="phone" v-model="fields.phone" value="" type="text" placeholder="0712516957" autocomplete="off" required>
                            <div v-if="errors && errors.phone" class="text-danger">{{ errors.phone[0] }}</div>
						</div>
                        	<div class="col-md-4">

							<label>Section</label>
							<input class="form-control" name="section" v-model="fields.section" value="" type="text" placeholder="Section" >
                            <div v-if="errors && errors.section" class="text-danger">{{ errors.section[0] }}</div>
						</div>
                        
                        	<div class="col-md-4">

							<label>User Type</label>
  <multiselect  name="user_types_id" v-model="fields.user_types_id"   label="user_types" placeholder="Select User Types" :options="user_type_names"  :allow-empty="true" :multiple="false" :hide-selected="true" :max-height="150" @input="onChange">
              
            </multiselect>                            <div v-if="errors && errors.user_types_id" class="text-danger">{{ errors.user_types_id[0] }}</div>
						</div>
                        
                        </div></div>
  <div class="trf">   
                  <div class="form-group row">
                  	<div class="col-md-4">
							  <label>Image:[Should be Less than 2MBs]</label>
        <input class="form-control" name="file" v-on:change="onFileChange" type="file" required>
         <div v-if="errors && errors.file" class="text-danger">{{ errors.file[0] }}</div>
						</div>
					<div class="col-md-4">
							<label>Password</label>
							<input class="form-control"  name="password" v-model="fields.password" value="" type="password" placeholder="********" required>
                            <div v-if="errors && errors.password" class="text-danger">{{ errors.password[0] }}</div>
						</div>
                       <div class="col-md-4">
							<label>Confirm Password</label>
							<input class="form-control"  name="password_confirmation" v-model="fields.password_confirmation" value="" type="password" placeholder="********" required>
                            <div v-if="errors && errors.password_confirmation" class="text-danger">{{ errors.password_confirmation[0] }}</div>
						</div></div></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import FormMixin from '../shared/FormMixin2';
import Multiselect from 'vue-multiselect';

// register globally
Vue.component('multiselect', Multiselect)
export default {
  mixins: [ FormMixin ],
    components: { Multiselect },
data() {
    return {
        department_names: [],
        user_type_names: [],
        action3: '/desk/public/users/add', //save action
        text: 'Added Succesfully',
        redirect: '',
        //redirect: '/desk/public/users',
        }
    },

methods: {
     getdepartment_names: function(){
        axios.get('/desk/public/department_names/get')
        .then(function(response){
          this.department_names = response.data;   
        }.bind(this));
      },
          getuser_type_names: function(){
        axios.get('/desk/public/user_type_names/get')
        .then(function(response){
          this.user_type_names = response.data;   
        }.bind(this));
      },
    },
        created: function(){  
   this.getuser_type_names();
     this.getdepartment_names() ; 
    },
}
</script>
